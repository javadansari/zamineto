<?php
/**
 * Created by PhpStorm.
 * User: Javad Ansari
 * Date: 4/4/2019
 * Time: 3:39 PM
 */
include_once('ModelConnection.php');




function getUsers()
{

    try {
        $connect = connect();
        //    $query = "select * , 'not show' as password  from user order by id ";
        $query = "select *   from user order by id  desc ";
        $result = $connect->query($query);
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $item) {
            $AllResult[] = $item;
        }
        if ($result->rowCount() != 0)
            $setResult = array("status" => true, "count" => $result->rowCount(), "result" => $AllResult);

        else
            $setResult = array("status" => true, "count" => 0);
    } catch (PDOException $e) {
        $setResult = array("status" => false);
    }

    return $setResult;

}

function getAllUsers()
{

    try {
        echo "salam";
        $connect = connect();
        //    $query = "select * , 'not show' as password  from user order by id ";
        $query = "select *   from user order by id  desc ";
        $result = $connect->query($query);
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $item) {
            $AllResult[] = $item;
        }
        if ($result->rowCount() != 0)
            $setResult = array("status" => true, "count" => $result->rowCount(), "result" => $AllResult);

        else
            $setResult = array("status" => true, "count" => 0);
    } catch (PDOException $e) {
        $setResult = array("status" => false);
    }

    return $setResult;

}
function getUser($username, $password)
{

    try {
        $connect = connect();
        $result = $connect->prepare("select *, 'not show' as password  from user WHERE username = ? and password = ?");
        $bind = array($username, $password);
        $result->execute($bind);
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $item) {
            $AllResult[] = $item;
        }
        if ($result->rowCount() > 1)
            $setResult = array("status" => true, "count" => "more that tow account");

        elseif ($result->rowCount() == 1) {
            $setResult = array("status" => true, "count" => $result->rowCount(), "result" => $AllResult);
            updateUserToken($username);
        } else
            $setResult = array("status" => true, "count" => 0);
    } catch (PDOException $e) {
        $setResult = array("status" => false);
    }

    return $setResult;

}

function getUserFromPhone($phone, $password)
{

    try {
        $connect = connect();
        $result = $connect->prepare("select *, 'not show' as password  from user WHERE phone = ? and password = ?");
        $bind = array($phone, $password);
        $result->execute($bind);
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $item) {
            $AllResult[] = $item;
        }
        if ($result->rowCount() > 1)
            $setResult = array("status" => true, "count" => "more that tow account");

        elseif ($result->rowCount() == 1) {
            $setResult = array("status" => true, "count" => $result->rowCount(), "result" => $AllResult);
        } else
            $setResult = array("status" => true, "count" => 0);
    } catch (PDOException $e) {
        $setResult = array("status" => false);
    }

    return $setResult;

}

function checkUser($username)
{

    try {
        $connect = connect();
        $result = $connect->prepare("select * , 'not show' as password from user WHERE username = ? ");
        $bind = array($username);
        $result->execute($bind);
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $item) {
            $AllResult[] = $item;
        }
        if ($result->rowCount() == 1)
            $setResult = array("status" => true, "count" => $result->rowCount(), "result" => $AllResult);
        else
            $setResult = array("status" => true, "count" => 0);
    } catch (PDOException $e) {
        $setResult = array("status" => false);
    }

    return $setResult;

}

function setUser($username, $password, $type, $phone, $email, $sex, $pic, $name, $family)
{
    try {
        $connect = connect();
        $result = $connect->prepare('INSERT INTO user (username,password,type,phone,email,sex,pic,name,family) VALUES (?,?,?,?,?,?,?,?,?)');
        $bind = array($username, $password, $type, $phone, $email, $sex, $pic, $name, $family);
        $result->execute($bind);
        $setResult = array("status" => true);
    } catch (PDOException $e) {
        $setResult = array("status" => false);
    }

    return $setResult;

}

function deleteUser($id)
{
    try {
        $connect = connect();
        $result = $connect->prepare('DELETE FROM user WHERE ID = ?');
        $bind = array($id);
        $result->execute($bind);

        $setResult = array("status" => true);

        $result = $connect->prepare('DELETE FROM access WHERE userID = ?');
        $bind = array($id);
        $result->execute($bind);

    } catch (PDOException $e) {
        $setResult = array("status" => false);
    }

    return $setResult;

}

function updateUser($id, $phone, $email, $sex)
{

    try {

        $connect = connect();
        $result = $connect->prepare('UPDATE user SET phone = ? , email = ? , sex = ?  WHERE ID = ?');
        $bind = array($phone, $email, $sex, $id);
        $result->execute($bind);
        $setResult = array("status" => true);
    } catch (PDOException $e) {
        $setResult = array("status" => false);
    }

    return $setResult;

}

function updateUserPic($id, $pic)
{

    try {

        $connect = connect();
        $result = $connect->prepare('UPDATE user SET pic = ? WHERE ID = ?');
        $bind = array($pic, $id);
        $result->execute($bind);
        $setResult = array("status" => true);
    } catch (PDOException $e) {
        $setResult = array("status" => false);
    }

    return $setResult;

}

function updateUserPass($id, $password)
{

    try {

        $connect = connect();
        $result = $connect->prepare('UPDATE user SET password = ? WHERE phone = ?');
        $bind = array($password, $id);
        $result->execute($bind);
        $setResult = array("status" => true);
    } catch (PDOException $e) {
        $setResult = array("status" => false);
    }

    return $setResult;

}

function updateUserAtt($phone, $nameFamily, $saveDate, $age, $degree, $job, $mail, $what, $phoneNumber, $city, $buy, $how, $send,$level)
{

    try {

        $connect = connect();
        $result = $connect->prepare('UPDATE user SET nameFamily = ?, saveDate = ?, age = ? , degree = ?, job = ?, mail = ?, 
              what = ?, phoneNumber = ?, city = ? , buy = ?, how = ?, send = ?, level = ? WHERE phone = ?');
        $bind = array( $nameFamily, $saveDate, $age, $degree, $job, $mail, $what, $phoneNumber, $city, $buy, $how, $send,$level,$phone);
        $result->execute($bind);
        $setResult = array("status" => true);
    } catch (PDOException $e) {
        $setResult = array("status" => false);
    }
    return $setResult;

}


function updateUserToken($username)
{

    try {

        $connect = connect();
        $result = $connect->prepare('UPDATE user SET token = ? WHERE username = ?');
        $bind = array(gen_uuid(), $username);
        $result->execute($bind);
        $setResult = array("status" => true);
    } catch (PDOException $e) {
        $setResult = array("status" => false);
    }

    return $setResult;


}

function gen_uuid()
{
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),

        // 16 bits for "time_mid"
        mt_rand(0, 0xffff),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand(0, 0x0fff) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand(0, 0x3fff) | 0x8000,

        // 48 bits for "node"
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}