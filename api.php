<?php
header("Content-Type:application/json");
if (isset($_GET['product_id']) && $_GET['product_id']!="") {
	include('db.php');
	$product_id = $_GET['product_id'];
	$result = mysqli_query(
	$con,
	"SELECT * FROM `product` WHERE id=$product_id");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
    echo(json_encode($row));
	mysqli_close($con);
	} else {
		response(NULL, NULL, 200,"No Record Found");
	}
} else {
	response(NULL, NULL, 400,"Invalid Request");
}
?>