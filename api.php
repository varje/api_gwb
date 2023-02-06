<?php
header("Content-Type:application/json");
include('db.php');

$select = "SELECT product.id, product.name, product.price FROM product";

switch(key($_GET)) {
	case 'products':
		break;
	case 'name':
		$name = $_GET['name'];
		$select .= " WHERE name='".$name."';";
		break;
	case 'attribute':
		$attr = $_GET['attribute'];
		$select .= " INNER JOIN attribute on product.id = attribute.product_id WHERE attribute.name='".$attr."';";
		break;
	default:
		$select = '';
}

if (!empty($select)) {
	$result = mysqli_query($con, $select);
	if(mysqli_num_rows($result)>0) {
		while($row = $result->fetch_assoc()) {
			echo json_encode($row);
		}
	mysqli_close($con);
	} else {
		response(200, "No record found");
	}
} else {
	response(400, "Invalid request");
}

function response($status_code, $status)
{
	$response['status_code'] = $status_code;
	$response['status'] = $status;
	
	$json_response = json_encode($response);
	echo $json_response;
}

?>