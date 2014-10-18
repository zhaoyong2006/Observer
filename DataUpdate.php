<?php
/**
* DataUpdate.php
* 
* Developed by Simon.Zhao <zhaoyong@playcrab.com>
* Copyright (c) 2014 www.playcrab.com
* 
* Changelog:
* 2014-10-18 - created
* 
*/
include_once 'UniversalConnect.php';

class DataUpdate{
	private $tableMaster;
    private $hookup;
	private $sql;

	public function __construct(){
		$this->tableMaster = 'cms';
		$this->hookup = UniversalConnect::doConnect();

		if($_POST['dpUpdate']){
			$dpHeader = $this->hookup->real_escape_string($_POST['dpUpdate']);
		}
		if($_POST['newData']){
			$newData = $this->hookup->real_escape_string($_POST['newData']);
		}
		$changeField = 'textBlock';

		$this->sql = "UPDATE $this->tableMaster set $changeField = '$newData' where dpHeader = '$dpHeader'";

		if($this->hookup->query($this->sql)){
			printf("success");	
		}elseif(($result = $this->hookup->query($this->sql)) === false){
			printf("error");exit;
		}
		$this->hookup->close();
	}	
}
$worker = new DataUpdate();


	
