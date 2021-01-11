<?php
/**
 * Created by PhpStorm.
 * User: Javad Ansari
 * Date: 4/4/2019
 * Time: 4:07 PM
 */
include_once('../Model/ModelConnection.php');

$status = $_REQUEST['status'];

if ($status == 'gets') {
    echo json_encode(getUsers());
} elseif ($status == 'get') {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    echo json_encode(getUser($username,$password));
} elseif ($status == 'getUserFromPhone') {
$phone = $_REQUEST['phone'];
$password = $_REQUEST['password'];
echo json_encode(getUserFromPhone($phone,$password));
}elseif ($status == 'check') {
    $username = $_REQUEST['username'];
    echo json_encode(checkUser($username));
}elseif ($status == 'delete') {
    $id = $_REQUEST['id'];
    echo json_encode(deleteUser($id));
} elseif
($status == 'set') {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $type = $_REQUEST['type'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $family = $_REQUEST['family'];
    $sex = $_REQUEST['sex'];
    $pic = $_REQUEST['pic'];
    echo json_encode(setUser($username,$password,10,$phone,$email,$sex,$pic,$name,$family));
} elseif
($status == 'update') {
    $id = $_REQUEST['id'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $sex = $_REQUEST['sex'];
    $pic = $_REQUEST['pic'];
    //$password =  MD5(MD5(time() . rand(0, 9999)) . MD5(time() . rand(-100, -1)));
    echo json_encode(updateUser($id,$phone,$email,$sex,$pic));
}elseif
($status == 'updatePic') {
    $id = $_REQUEST['id'];
    $pic = $_REQUEST['pic'];
    //$password =  MD5(MD5(time() . rand(0, 9999)) . MD5(time() . rand(-100, -1)));
    echo json_encode(updateUserPic($id,$pic));
}elseif
($status == 'updatePassword') {
    $phone = $_REQUEST['phone'];
    $password = $_REQUEST['password'];
    //$password =  MD5(MD5(time() . rand(0, 9999)) . MD5(time() . rand(-100, -1)));
    echo json_encode(updateUserPass($phone,$password));
}elseif
($status == 'updateUserAtt') {
    $phone = $_REQUEST['phone'];
    $nameFamily = $_REQUEST['nameFamily'];
    $saveDate = $_REQUEST['saveDate'];
    $age = $_REQUEST['age'];
    $degree = $_REQUEST['degree'];
    $job = $_REQUEST['job'];
    $mail = $_REQUEST['mail'];
    $what = $_REQUEST['what'];
    $phoneNumber = $_REQUEST['phoneNumber'];
    $city = $_REQUEST['city'];
    $buy = $_REQUEST['buy'];
    $how = $_REQUEST['how'];
    $send = $_REQUEST['send'];
    $level = $_REQUEST['level'];

    echo json_encode(updateUserAtt( $phone,$nameFamily, $saveDate, $age, $degree, $job, $mail, $what, $phoneNumber, $city, $buy, $how, $send,$level));
}