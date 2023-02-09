<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('db.php');
include('helpers.php');


// request type
$method = $_SERVER['REQUEST_METHOD'];

// create  and run query
if (in_array(key($_GET), ['products', 'name', 'attribute'])) {
	$query = retrieve();
	if (!empty($query)) {
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result)>0) {
			while($row = $result->fetch_assoc()) {
				echo json_encode($row);
			}
		} else {
			echo response(200, "No record found");
		}
	} else {
		echo response(400, "Invalid request");
	}
	mysqli_close($con);
} else {
	echo response(400, "Invalid request");
}

// retrieving data
function retrieve()
{
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

	return $select;
}

?>
