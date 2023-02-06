<?php
	class PropertyNotFoundException extends Exception
	{
		public function __construct($message = "Property Not has been found")
		{
			parent::__construct($message, "0001");
		}
	}