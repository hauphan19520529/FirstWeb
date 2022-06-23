<?php

$dbhost = "103.253.145.114";
$dbuser = "root";
$dbpass = "Khongco123@@";
$dbname = "ie105";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
