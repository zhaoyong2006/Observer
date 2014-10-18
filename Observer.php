<?php
/**
* Observer.php
* 
* Developed by Simon.Zhao <yongzhao@meilishuo.com>
* Copyright (c) 2014 www.meilishuo.com
* 
* Changelog:
* 2014-10-18 - created
* 
*/
interface Observer{
	function update(Subject $subject);
}
