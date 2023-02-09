<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('../db.php');
include('../helpers.php');

$method = $_SERVER['REQUEST_METHOD'];

// create query
if($method === 'PUT')
{
    parse_str(file_get_contents('php://input'), $_PUT);
    $id = $_PUT['id'];
    $name = $_PUT['name'];
    $product_id = $_PUT['product_id'];
    if(isset($id)) {
        if(isset($name) & isset($product_id)) {
            $query = "UPDATE product SET name='".$name."', product_id=$product_id WHERE id=$id;";
        } elseif (isset($name)) {
            $query = "UPDATE product SET name='".$name."' WHERE id=$id;";
        } elseif (isset($product_id)) {
            $query = "UPDATE product SET product_id=$product_id WHERE id=$id;";
        }
    } else {
        $query = '';
    }
}

// run $query
echo query($con, $query);

?>
