<?php
session_start();
error_reporting(0);
require '../mysql-connect.php';

$response = array();

if (!empty($_POST["description"]) && !empty($_POST["price"])) {
    // Check if the "menu_id" is provided to determine whether to update or insert
    if ($_POST["menu-id"]) {
        $menu_id = $_POST["menu-id"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        // Prepare the update query
        $stmt = $conn->prepare("UPDATE menu SET description = ?, price = ? WHERE id = ?");
        $stmt->bind_param("ssi", $description, $price, $menu_id);

        if ($stmt->execute()) {
            $response['status'] = "success";
            $response['message'] = "Menu updated successfully!";
        } else {
            $response['status'] = "error";
            $response['message'] = "Update error: " . $conn->error;
        }

        $stmt->close();
    } else {
        // If "menu_id" is not provided, it means it's a new menu item, so we insert it.
        $description = $_POST["description"];
        $price = $_POST["price"];

        // Prepare the insert query
        $stmt = $conn->prepare("INSERT INTO menu (description, price) VALUES (?, ?)");
        $stmt->bind_param("ss", $description, $price);

        if ($stmt->execute()) {
            $response['status'] = "success";
            $response['message'] = "Menu item created successfully!";
        } else {
            $response['status'] = "error";
            $response['message'] = "Insert error: " . $conn->error;
        }

        $stmt->close();
    }
} else {
    $response['status'] = "error";
    $response['message'] = "Description and Price cannot be empty!";
}

$conn->close();

$json_response = json_encode($response);
echo $json_response;
?>
