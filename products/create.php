<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('../db.php');
include('../helpers.php');

$method = $_SERVER['REQUEST_METHOD'];

// create query
if($method === 'POST')
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $query = "INSERT INTO product (name, price) VALUES ('".$name."', $price);";
}

// run $query
echo query($con, $query);

?>
