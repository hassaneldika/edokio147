<?php
	class Service{
		public $dbh; 
		public function connect($host='213.171.200.100',$dbname='Edokio',$username='EdokioUser',$password='PagesUser@123'){
		// public function connect($host='localhost',$dbname='opl-exams',$username='root',$password=''){
			$this->dbh=new PDO('mysql:host='.$host.';dbname='.$dbname,$username,$password); 
			$this->dbh->exec("set names utf8");
		}


		
	}
?>

