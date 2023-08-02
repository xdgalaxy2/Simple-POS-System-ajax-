<?php
session_start();
//error_reporting(0);
require '../mysql-connect.php';

$response = array();

if(!empty($_POST["delivery_date"]) && !empty($_POST["delivery_time"]) && !empty($_POST["delivery_address"]) && !empty($_POST["contact_number"])){

    $delivery_date = $_POST["delivery_date"];
    $delivery_time = $_POST["delivery_time"];
    $delivery_address = $_POST["delivery_address"];
    $contact_number = $_POST["contact_number"];


    if (!empty($_POST["order-id"])) {
        $order_id = $_POST["order-id"];
        
        
        $stmt = $conn->prepare("UPDATE orders SET delivery_date = ?, delivery_time = ?, delivery_address = ?, contact_number = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $delivery_date, $delivery_time, $delivery_address, $contact_number, $order_id);

        if ($stmt->execute()) {
            $response['message'] = "Order details updated successfully!";
        } else {
            $response['message'] = "Update error: " . $conn->error;
        }

    } else {

         $stmt = $conn->prepare("INSERT INTO orders (delivery_date, delivery_time,  delivery_address, contact_number) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $delivery_date, $delivery_time, $delivery_address, $contact_number);

        if ($stmt->execute()) {
            $response['message'] = "Order details added successfully!";
        } else {
            $response['message'] = "Add error: " . $conn->error;
        }

        
    }

}else{
    $response['message'] = "Please provide all required fields.";
}

    

$conn->close();

$json_response = json_encode($response);
echo $json_response;
?>
