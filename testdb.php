<?php
$myServer = "172.16.100.58:1433";
$myUser = "nulcou";
$myPass = "nulcou123";
$myDB = "NULCougar";

$conn = mssql_connect($myServer,$myUser,$myPass);
if (!$conn)
{ 
  die('Not connected : ' . mssql_get_last_message());
} 
$db_selected = mssql_select_db($myDB, $conn);
if (!$db_selected) 
{
  die ('Can\'t use db : ' . mssql_get_last_message());
}