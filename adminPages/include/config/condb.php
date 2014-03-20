<?php
require_once("include/interface/database_interface.php");

class  newcon  implements database_constants 
{
		public function GetDbConfig()
		{
			$this->DB_NAME=self::DB_NAME;
			$this->DB_HOST=self::DB_HOST;
			$this->DB_USERNAME=self::DB_USERNAME;
			$this->DB_PASSWORD=self::DB_PASSWORD;
	
		}
}


$Db=new newcon();
$Db->GetDbConfig();

$fp = mysql_connect($Db->DB_HOST,$Db->DB_USERNAME,$Db->DB_PASSWORD);

mysql_select_db($Db->DB_NAME, $fp) or die("cannot select DB");


?>