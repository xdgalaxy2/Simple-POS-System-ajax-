<?php 
session_start();
if ($_POST['id']){
	$_SESSION['orders'][]=$_POST['id'];
	$response['message'] = "Order added"; 
	$response['cart'] = count($_SESSION['orders']);
}


$json_response = json_encode($response);
echo $json_response;



 ?>