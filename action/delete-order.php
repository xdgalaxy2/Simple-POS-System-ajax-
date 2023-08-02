<?php
session_start();
require '../mysql-connect.php';

// sql to delete a record
$sql = "DELETE FROM orders WHERE id=".$_POST['id'];

if ($conn->query($sql) === TRUE) {
    $response['message'] = "Order deleted successfully!";
} else {
    $response['message'] = "Error deleting order: " . $conn->error;
}

$conn->close();

$json_response = json_encode($response);
echo $json_response;

?>