<?php

	class database{
		private $serverName = 'localhost';
		private $userName = 'root';
		private $password = '';
		private $myDB = 'quanly';

		public $__conn = null;

        public function __construct(){
			try{
				$this-> __conn = new PDO("mysql:host=$this->serverName;dbname=$this->myDB",$this->userName,$this->password);
				$this-> __conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch( PDOException $e){
				echo "Connection Failed". $e->getMessage();
			}
		}

        
	}
?>
