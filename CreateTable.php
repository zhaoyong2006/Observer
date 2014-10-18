<?php
/**
* CreateTable.php
* 
* Developed by Simon.Zhao <zhaoyong@playcrab.com>
* Copyright (c) 2014 www.playcrab.com
* 
* Changelog:
* 2014-10-17 - created
* 
*/
include_once 'UniversalConnect.php';

class CreateTable{
	private $tableMaster;
	private $hookup;

	public function __construct(){
		$this->tableMaster = "cms";
		$this->hookup = UniversalConnect::doConnect();

		$drop = "DROP TABLE IF EXISTS $this->tableMaster";

		if($this->hookup->query($drop) === true){
			printf("drop ok");
		}

		$sql = "CREATE TABLE $this->tableMaster(
				id			INT(8),
				dpHeader 	NVARCHAR(50),
				testBlock   TEXT,
				imageURL    NVARCHAR(60),
				PRIMARY KEY (id))";
		if($this->hookup->query($sql) === true){
			printf("table create ok");
		}
		$this->hookup->close();
	}
}
$worker = new CreateTable();
