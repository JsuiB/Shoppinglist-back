<?php
require_once "inc/functions.php";
require_once "inc/headers.php";


try {
$db = new PDO("mysql:host=localhost;dbname=shoppinglist;charset=utf8","root","");
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = "Select * from item";

$query = $db->query($sql);


header("HTTP/1.1 200 OK");
$results = $query->fetchAll(PDO::FETCH_ASSOC);
print json_encode($results);
} catch (PDOException $pdoex) {
header("HTTP/1.1 500 Internal Server Error");
$error = array("error" => $pdoex->getMessage());
print json_encode($error);
}