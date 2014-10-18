<?php
/**
* SniffClient.php
* 
* Developed by Simon.Zhao <zhaoyong@playcrab.com>
* Copyright (c) 2014 www.playcrab.com
* 
* Changelog:
* 2014-10-18 - created
* 
*/
function __autoload($class_name){
	include $class_name . '.php';
}
class SniffClient{
	private $userAgent;
	private $mobile = false;
	private $deviceObserver;
	private $dpNow;
	private $sub;

	public function __construct(){
		if(isset($_POST['dp'])){
			$this->dpNow = $_POST['dp'];
		}
		$this->sub = new ContreteSubject();
		$this->userAgent = $_SERVER['HTTP_USER_AGENT'];
		if(stripos($this->userAgent, 'android')){
			$this->mobile = true;
			$this->deviceObserver = new ContreteObserverPhone();
		}
		if(!$this->mobile){
			$this->deviceObserver = new ContreteObserverDT();
		}
		$this->sub->attachObser($this->deviceObserver);
		$this->sub->setState($this->dpNow);
		
	}
}
$worker = new SniffClient();
