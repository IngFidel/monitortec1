﻿<?php
$db_host="localhost";
$db_user="root";
$db_password="12345";
$db_name="uaci";
$db_table_name="maestros";
   $db_connection = mysql_connect($db_host, $db_user, $db_password);

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}
$subs_name = utf8_decode($_POST['Nombre']);
$subs_last = utf8_decode($_POST['ApellidoPaterno']);
$subs_last2 = utf8_decode($_POST['ApellidoMaterno']);
$subs_email = utf8_decode($_POST['email']);

$resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE Email = '".$subs_email."'", $db_connection);

if (mysql_num_rows($resultado)>0)
{

header('Location: Fail.html');

} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`Nombre` , `ApellidoPaterno` ,`ApellidoMaterno` , `Email`) VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_last2 . '","' . $subs_email . '")';

mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);

if (!$retry_value) {
   die('Error: ' . mysql_error());
}
	
header('Location: Success.html');

}

mysql_close($db_connection);

		
?>