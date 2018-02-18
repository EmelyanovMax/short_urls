<?php
/**
 * Created by PhpStorm.
 * User: maksimemelanov
 * Date: 15.02.2018
 * Time: 21:42
 */

//  Create the table
$sql = "CREATE table `short_urls` (`ID` INT( 11 ) AUTO_INCREMENT PRIMARY KEY, `url_primary` VARCHAR( 250 ) NOT NULL, `key_short` VARCHAR( 100 ) NOT NULL)";

try {
	$pdo->exec($sql);

} catch (PDOException  $e) {
	echo "Error: " . $e;
}

