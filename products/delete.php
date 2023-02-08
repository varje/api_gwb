<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('../db.php');

$method = $_SERVER['REQUEST_METHOD'];


// Creating entry
if($method === 'DELETE')
{
    parse_str(file_get_contents('php://input'), $_DELETE);
    $id = $_DELETE['id'];
    $query = "DELETE FROM product WHERE id=$id;";

    if (!empty($query)) {
        $result = mysqli_query($con, $query);
        
        if($result === true) {
            response(200, "Entry deleted succesfully");
        } else {
            response(400, "Error changing record: " . mysqli_error($conn));
        }
    } else {
        response(400, "Invalid request");
    }
    mysqli_close($con);
    
}

function response($status_code, $status)
{
    $response['status_code'] = $status_code;
    $response['status'] = $status;
    
    $json_response = json_encode($response);
    echo $json_response;
}

?>