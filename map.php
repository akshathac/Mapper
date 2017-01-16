<?php
/**
 * Created by PhpStorm.
 * User: akshatha
 * Date: 1/14/2017
 * Time: 9:30 PM
 */
require("dbinfo.php");

$dbh = new PDO($dsn, $username, $password);
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    extract($_POST);
    $stmt = $dbh->prepare("insert into markers (name,address,lat,lng,type,source) values (:name,:address,:lat,:lng,:type,:source)");
    $stmt->bindParam(':name', $title);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':lat', $lat);
    $stmt->bindParam(':lng', $lng);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':source', $source);
    $stmt->execute();
}


$stmt = $dbh->prepare("select * from markers");
 $stmt->execute();
$result = $stmt->fetchAll();

echo json_encode($result);

?>