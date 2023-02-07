<?php
header("Content-Type:application/json");
include('db.php');

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
			response(200, "No record found");
		}
	} else {
		response(400, "Invalid request");
	}
	mysqli_close($con);
} else {
	if (key($_GET) === 'delete') {
		$query = delete();
	} elseif (key($_GET) === 'insert') {
		$query = insert();
	}
	if (!empty($query)) {
		$result = mysqli_query($con, $query);
		if($result === true) {
			response(200, "Record modified succesfully");
		} else {
			response(400, "Error changing record: " . mysqli_error($conn));
		}
	} else {
		response(400, "Invalid request");
	}
	mysqli_close($con);
}


// response handling
function response($status_code, $status)
{
	$response['status_code'] = $status_code;
	$response['status'] = $status;
	
	$json_response = json_encode($response);
	echo $json_response;
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

// deleting row
function delete() 
{
	switch($_GET['delete']) {
		case 'product':
			$id = $_GET['id'];
			$query = "DELETE FROM product WHERE id=$id;";
			break;
		case 'attribute':
			$id = $_GET['id'];
			$query = "DELETE FROM attribute WHERE id=$id;";
			break;
		default:
			$query = '';
	}
	return $query;
}

// inserting row
function insert() 
{
	switch($_GET['insert']) {
		case 'product':
			$name = $_GET['name'];
			$price = $_GET['price'];
			$query = "INSERT INTO product (name, price) VALUES ('".$name."', $price);";
			break;
		case 'attribute':
			$name = $_GET['name'];
			$product_id = $_GET['product_id'];
			$query = "INSERT INTO attribute (name, product_id) VALUES ('".$name."', $product_id);";
			break;
		default:
			$query = '';
	}
	return $query;
}

?>