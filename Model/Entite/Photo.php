<?php
	class Photo
	{
		private $idphoto;
		private $img_url;
		
		
		public function __construct()
		{
			
		}
		
		


		/**
		 * Get the value of img_url
		 *
		 * @return string
		 */
		public function getImgUrl()
		{
				return $this->img_url;
		}

		/**
		 * Set the value of img_url
		 *
		 * @param string $img_url
		 *
		 * @return self
		 */
		public function setImgUrl( $img_url)
		{
				$this->img_url = $img_url;

				return $this;
		}

		/**
		 * Get the value of idphoto
		 *
		 * @return int
		 */
		public function getIdphoto()
		{
				return $this->idphoto;
		}

		public  function getPhotoArrayAsso()
		{
			return   array(
				"idphoto" => $this->idphoto,
				"img_url" => $this->img_url,
			);
			
		}
	}