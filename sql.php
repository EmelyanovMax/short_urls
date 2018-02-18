<?php
/**
 * Created by PhpStorm.
 * User: maksimemelanov
 * Date: 15.02.2018
 * Time: 15:36
 */

//  Attach user's settings
include_once('settings.php');

//  Set default settings
$host = $host != '' ? $host : 'localhost';
$dbname = $dbname != '' ? $dbname : 'test';
$port = $port != '' ? $port : '3306';

//  Connect to database
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';port= ' . $port . '';

try {
	$pdo = new PDO($dsn,
		$username,
		$password,
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
	);
} catch (PDOException $ex) {
	die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}

//  Check table exists
$results = $pdo->query("SHOW TABLES LIKE 'short_urls'");

//	Create table if it does not exist
if ($results->rowCount() == 0) {
	include_once('install.php');
}
