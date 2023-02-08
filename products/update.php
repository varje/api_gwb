<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('../db.php');

$method = $_SERVER['REQUEST_METHOD'];


// Updating entry
if($method === 'PUT')
{
    parse_str(file_get_contents('php://input'), $_PUT);
    $id = $_PUT['id'];
    $name = $_PUT['name'];
    $price = $_PUT['price'];
    if(isset($id)) {
        if(isset($name) & isset($price)) {
            $query = "UPDATE product SET name='".$name."', price=$price WHERE id=$id;";
        } elseif (isset($name)) {
            $query = "UPDATE product SET name='".$name."' WHERE id=$id;";
        } elseif (isset($price)) {
            $query = "UPDATE product SET price=$price WHERE id=$id;";
        }
    } else {
        $query = '';
    }

    if (!empty($query)) {
        $result = mysqli_query($con, $query);
        
        if($result === true) {
            response(200, "Entry updated succesfully");
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