<?php
/**
* DataEntry.php
* 
* Developed by Simon.Zhao <zhaoyong@playcrab.com>
* Copyright (c) 2014 www.playcrab.com
* 
* Changelog:
* 2014-10-17 - created
* 
*/
include 'UniversalConnect.php';

class DataEntry{
	private $tableMaster;
    private $hookup;
	private $sql;

	public function __construct(){
		$this->tableMaster = 'cms';
		$this->hookup = UniversalConnect::doConnect();

		if($_POST['dpHeader']){
			$dpHeader = $this->hookup->real_escape_string($_POST['dpHeader']);
		}
		if($_POST['textBlock'])
			$textBlock = $this->hookup->real_escape_string($_POST['textBlock']);

		if($_POST['imageURL'])
			$imageURL = $this->hookup->real_escape_string($_POST['imageURL']);

		$this->sql = "INSERT INTO $this->tableMaster 
				(dpHeader,textBlock,imageURL) VALUES
				('$dpHeader','$textBlock','$imageURL')";
		if($this->hookup->query($this->sql)){
			printf("success");	
		}elseif(($result = $this->hookup->query($this->sql)) === false){
			printf("error");exit;
		}
		$this->hookup->close();
	}	
}
$worker = new DataEntry();
