<?php
/**
 * Created by PhpStorm.
 * User: maksimemelanov
 * Date: 15.02.2018
 * Time: 12:54
 */

//Connect the database
require_once ('sql.php');

$key = htmlspecialchars($_GET['key']);

if(!empty($_GET['key'])){
    $sql = "SELECT * FROM `short_urls` WHERE `key_short` ='" . $key . "'";

//Check short URL in database
    $select = $dbh->query($sql)->fetch();

//Redirect if short URL is found
    if($select){
        $result = [
            'url_primary' => $select['url_primary'],
            'key' => $select['key_short']
        ];
        header('location: ' . $result['url_primary']);
    }
}