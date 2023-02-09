<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('../db.php');
include('../helpers.php');

$method = $_SERVER['REQUEST_METHOD'];

// create query
if($method === 'DELETE')
{
    parse_str(file_get_contents('php://input'), $_DELETE);
    $id = $_DELETE['id'];
    $query = "DELETE FROM product WHERE id=$id;";
}

// run $query
echo query($con, $query);

?>