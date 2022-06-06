<?php
class DataToibangiay
{
	public static function executeQuery($sql)
	{
		include ('toibangiaydb.inc');
		//include_once('error.inc');
		// 1. Tao ket noi CSDL
		if (!($connection = mysqli_connect($hostName,$username,$password,$databaseName)))
			die ("couldn't connect to localhost");
		//2. Thiet lap font Unicode
		if (!(mysqli_set_charset($connection, 'UTF8')))
			showError();
		// Thuc thi cau truy van
		if (!($result = mysqli_query($connection,$sql)))
			//showError();
		// Dong ket noi CSDL
		if (!(mysqli_close($connection)))
			showError();
		return $result;
	}
}
?>