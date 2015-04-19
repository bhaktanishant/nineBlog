<?php

$database_name = "new";
$host = "localhost";
$user_name = "root";
$password = "";

if (!mysql_connect($host, $user_name, $password) or !mysql_select_db($database_name)) {
	echo "can't connect";
}

?>