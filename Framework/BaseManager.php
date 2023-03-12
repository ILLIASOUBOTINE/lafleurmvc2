<?php
	class BaseManager
	{
		private $_table;
		protected $_object;
		protected $_bdd;
		
		public function __construct($table,$object)
		{
			$this->_table = $table;
			$this->_object = $object;
			$this->_bdd = BDD::getInstance();
		}
		
		public function getById($id)
		{
			$req = $this->_bdd->prepare('SELECT * FROM ' .$this->_table .' WHERE '.$this->_table.'.id'.$this->_table.' = :id');
			// $re = "SELECT * FROM  $this->_table WHERE {$this->_table}.id{$this->_table} = :id";
			// echo $re;
			// $req->execute(array($id));
			$req->bindValue(':id', $id, PDO::PARAM_INT);
			$req->execute();
			$req->setFetchMode(PDO::FETCH_CLASS,$this->_object);
			
			return $req->fetch();
		}
		
		public function getAll()
		{
			$req = $this->_bdd->prepare("SELECT * FROM " . $this->_table);
			$req->execute();
			$req->setFetchMode(PDO::FETCH_CLASS,$this->_object);
			return $req->fetchAll();
		}
		
		public function create($param,$values)
		{
			try {
				$paramNumber = count($param);
				$valueArray = array_fill(1,$paramNumber,"?");
				$valueString = implode(",", $valueArray);
				$sql = "INSERT INTO " . $this->_table . "(" . implode(",", $param) . ") VALUES(" . $valueString . ")";
				$req = $this->_bdd->prepare($sql);
				$boundParam = array();
				foreach($values as $value)
				{
					$boundParam[] = $value;	
				}
				$req->execute($boundParam);
				$insertedId = $this->_bdd->lastInsertId();
				return $insertedId;
			} catch (Throwable $er) {
				return $er;
				// var_dump($er->getMessage());
				// exit;
			}
			
		}
		
		public function update($id,$param,$values)
		{
			$sql = "UPDATE " . $this->_table . " SET ";
			for ($i = 0; $i < count($param); $i++) { 
				if ($i == count($param) - 1) {
					$sql = $sql . $param[$i] . " = ? ";
				} else {
					$sql = $sql . $param[$i] . " = ?, ";
				}
			}
			
			$sql = $sql . ' WHERE ' .$this->_table.'.id'.$this->_table.' = ? ';
			$req = $this->_bdd->prepare($sql);
			$boundParam = array();
			foreach($values as $value)
			{
				$boundParam[] = $value;	
			}
			$boundParam[] = $id;
			$req->execute($boundParam);
			
			
			
		}
		
		public function delete($obj)
		{
			if(property_exists($obj,"id"))
			{
				$req = $this->_bdd->prepare("DELETE FROM " . $this->_table . " WHERE id=?");
				return $req->execute(array($obj->id));
			}
			else
			{
				throw new PropertyNotFoundException($obj,"id");	
			}
		}
	}