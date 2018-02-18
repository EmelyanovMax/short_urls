<?php
/**
 * Created by PhpStorm.
 * User: maksimemelanov
 * Date: 15.02.2018
 * Time: 17:41
 */

include_once('sql.php');

$link = $_POST['url'];

if ($link != '') {
	$result = '';

//  Find URL in database
	$sqlSelect = "SELECT * FROM `short_urls` WHERE `url_primary` ='" . $link . "'";
	try {
		$query = $pdo->prepare($sqlSelect);
		$query->execute(array($link));
	} catch (PDOException  $e) {
		echo "Error: " . $e;
	}
	$select = $query->fetch();

//  Create if does not exist
	if (!$select) {
//		This is because later we add 'a' in the beginning of short url
		$letters = (int)($hash_length - 1);

		$hash = md5($link);
		$key = substr($hash, -$letters);

		$sqlInsert = "INSERT INTO `short_urls` (`id`, `url_primary`, `key_short`) VALUES (NULL, '" . $link . "', '" . $key . "') ";
		try {
			$q = $pdo->prepare($sqlInsert);
			$q->execute(array($link, $key));
		} catch (PDOException  $e) {
			echo "Error: " . $e;
		}

		try {
			$query->execute(array($link));
		} catch (PDOException  $e) {
			echo "Error: " . $e;
		}
		$select = $query->fetch();
	}

	$result = 'http://' . $_SERVER['HTTP_HOST'] . '/a' . $select['key_short'];
	print_r($result);
} else {
	print_r("ERROR: Please enter URL");
}