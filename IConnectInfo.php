<?php
/**
* IConnectInfo.php
* 
* Developed by Simon.Zhao <zhaoyong@playcrab.com>
* Copyright (c) 2014 www.playcrab.com
* 
* Changelog:
* 2014-10-17 - created
* 
*/
interface IConnectInfo{
	const HOST = "localhost";
	const UNAME = "root";
	const PW = "root";
	const DBNAME = "gcz_cms";

	public function doConnect();
}
