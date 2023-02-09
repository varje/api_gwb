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
    $product_id = $_POST['product_id'];
    $query = "INSERT INTO attribute (name, product_id) VALUES ('".$name."', $product_id);";
}

// run $query
echo query($con, $query);

?>