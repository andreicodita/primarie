<?php
//connection to database
$hostName = "sql7.freesqldatabase.com";
$userName = "sql7630250";
$password = "3JTL6yPxbd";
$databaseName = "sql7630250";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
 //encodes characters in utf8 to be able to read diacritics
 $conn->query("SET NAMES utf8"); 
 //tests the connection to the database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>