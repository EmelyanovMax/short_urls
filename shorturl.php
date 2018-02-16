<?php
/**
 * Created by PhpStorm.
 * User: maksimemelanov
 * Date: 15.02.2018
 * Time: 17:41
 */

include_once ('sql.php');

$link = $_POST['url'];

//Find URL in database
$sqlSelect = "SELECT * FROM `short_urls` WHERE `url_primary` ='" . $link . "'";
$select = $pdo->query($sqlSelect)->fetch();

//Create if does not exist
if (!$select) {
    $letters='qwertyuiopasdfghjklzxcvbnm1234567890';
    $count=strlen($letters);
    $intval=rand(0, time());
    $result='';

    for($i=0;$i<4;$i++) {
        $last=$intval%$count;
        $intval=($intval-$last)/$count;
        $result.=$letters[$last];
    }

    $sqlInsert = "INSERT INTO `short_urls` (`id`, `url_primary`, `key_short`) VALUES (NULL, '" . $link . "', '" . $result . $intval . "') ";
    $pdo->query($sqlInsert);

    $select = $pdo->query($sqlSelect)->fetch();

}

$result = 'http://'.$_SERVER['HTTP_HOST'].'/a'.$select['key_short'];
print_r ($result);