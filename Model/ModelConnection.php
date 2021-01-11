<?php
/**
 * Created by PhpStorm.
 * User: Javad Ansari
 * Date: 4/4/2019
 * Time: 3:20 PM
 */

include_once('ModelSession.php');
include_once('ModelUser.php');
include_once('ModelAccess.php');
include_once('ModelItems.php');
include_once('ModelType.php');
include_once('ModelChat.php');
include_once('ModelLevel.php');

function connect()
{
    $connection = new PDO("mysql:host=localhost;dbname=jazbplus_zamineto", 'jazbplus_zaminet', '1.*WgxSzLCxk');
   // $connection = new PDO("mysql:host=localhost;dbname=jazbplus_mob", 'root');
    $connection->exec('set names utf8');
    return $connection;
}



