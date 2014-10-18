<?php
/**
* ConcreteSubject.php
* 
* Developed by Simon.Zhao <yongzhao@meilishuo.com>
* Copyright (c) 2014 www.meilishuo.com
* 
* Changelog:
* 2014-10-18 - created
* 
*/
class ConcreteSubject extends Subject{
	private $hookup;
	private $tableMaster;
	private $designPattern;
	private $stateset = array();

	public function setState($dpNow){
		$this->designPattern = strtolower($dpNow);
		$this->tableMaster = "cms";
		$this->hookup = UniversalConnect::doConnect();

		//创建查询语句
		$sql = "SELECT * FROM $this->tableMaster WHERE dpheader = '$this->designPattern'";
		if($result =  $this->hookup->query($sql)){
			while($row = $result->fetch_assoc()){
				$this->stateSet[0] = $row['dpHeader'];
				$this->stateSet[1] = $row['textBlock'];
				$this->stateSet[2] = $rpw['imageURL'];
			}
			$result->close();
		}
		$this->hookup->close();
		$this->nitify();
	}

	public function getState(){
		return $this->stateSet;
	}
}
