<?php
header("Content-Type:application/json");
include('db.php');

$select = "SELECT * FROM `product`";

switch(key($_GET)) {
	case 'products':
		break;
	case 'name':
		$name = $_GET['name'];
		$select .= " WHERE name='".$name."';";
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
		echo json_encode("No record found");
	}
} else {
	echo json_encode("Invalid request");
}

?>