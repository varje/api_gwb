<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('../db.php');

$method = $_SERVER['REQUEST_METHOD'];

// Creating entry
if($method === 'POST')
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $query = "INSERT INTO product (name, price) VALUES ('".$name."', $price);";
    
}

if (!empty($query)) {
    $result = mysqli_query($con, $query);
    
    if($result === true) {
        response(200, "Entry added succesfully");
    } else {
        response(400, "Error changing record: " . mysqli_error($conn));
    }
} else {
    response(400, "Invalid request");
}
mysqli_close($con);

function response($status_code, $status)
{
    $response['status_code'] = $status_code;
    $response['status'] = $status;
    
    $json_response = json_encode($response);
    echo $json_response;
}

?>