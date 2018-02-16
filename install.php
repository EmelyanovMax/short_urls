<?php
/**
 * Created by PhpStorm.
 * User: maksimemelanov
 * Date: 15.02.2018
 * Time: 21:42
 */

//Create the database
$dbname = "`".str_replace("`","``",$dbname)."`";
$pdo->query("CREATE DATABASE $dbname");
$pdo->query("use $dbname");

$pdo->query("CREATE table $table (`ID` INT( 11 ) AUTO_INCREMENT PRIMARY KEY, `url_primary` VARCHAR( 50 ) NOT NULL, `key_short` VARCHAR( 250 ) NOT NULL)");
