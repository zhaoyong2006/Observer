<?php
/**
* Subject.php
* 
* Developed by Simon.Zhao <yongzhao@meilishuo.com>
* Copyright (c) 2014 www.meilishuo.com
* 
* Changelog:
* 2014-10-18 - created
* 
*/
abstract class Subject{
	protected $observers = array();

	public function attachObser(Observer $obser){
		array_push($this->observers,$obser);
	}

	public function detachObser(Observer $obser){
		$position = 0;
		foreach($this->observers as $viewer){
			++$position;
			if($viewer == $obser){
				array_splice($this->observers,($position),1);
			}
		}
	}

	protected function notify(){
		foreach($this->observers as $viewer){
			$viewer->update($this);
		}
	}
}
