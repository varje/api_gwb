<?php

function response($status_code, $status)
{
    $response['status_code'] = $status_code;
    $response['status'] = $status;
    
    $json_response = json_encode($response);
    return $json_response;
}

function query($con, $query)
{
    if (!empty($query)) {
        $result = mysqli_query($con, $query);
        if($result === true) {
            return response(200, "Entry modified succesfully");
        } else {
            return response(400, "Error changing record: " . mysqli_error($con));
        }
    } else {
        echo response(400, "Invalid request");
    }
    mysqli_close($con);
}

?>