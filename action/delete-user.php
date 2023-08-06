<?php
session_start();
require '../mysql-connect.php';

// sql to delete a record
$sql = "DELETE FROM accounts WHERE id=".$_POST['id'];

if ($conn->query($sql) === TRUE) {
    $response['message'] = "User profile deleted successfully!";
} else {
    $response['message'] = "Error deleting user profile: " . $conn->error;
}

$conn->close();

$json_response = json_encode($response);
echo $json_response;

?>