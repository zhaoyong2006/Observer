<?php
/**
* UniversalConnect.php
* 
* Developed by Simon.Zhao <zhaoyong@playcrab.com>
* Copyright (c) 2014 www.playcrab.com
* 
* Changelog:
* 2014-10-17 - created
* 
*/
include_once 'IConnectInfo.php';

class UniversalConnect implements IConnectInfo{
		private static $server = IConnectInfo::HOST;
		private static $currentDB = IConnectInfo::DBNAME;
		private static $user = IConnectInfo::UNAME;
		private static $pass = IConnectInfo::PW;
		private static $hookup;

		public function doConnect(){
			self::$hookup = mysqli_connect(self::$server, self::$user, self::$pass, self::$currentDB);

			if(self::$hookup){
				//调试
			}elseif(mysqli_connect_error(self::$hookup)){
				echo "error".mysqli_connect_error();
			}
			return self::$hookup;

		}
}
