<?php
session_start();
error_reporting(0);
require '../mysql-connect.php';

$response = array();

if (!empty($_POST["delivery_date"]) && !empty($_POST["delivery_time"]) && !empty($_POST["delivery_address"]) && !empty($_POST["contact_number"])) {
    
        

        // Prepare the insert query
        $stmt = $conn->prepare("INSERT INTO orders (delivery_date, delivery_time, delivery_address, contact_number) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_POST['delivery_date'], $_POST['delivery_time'], $_POST['delivery_address'], $_POST['contact_number'] );

        if ($stmt->execute()) {
            $stmt->close();

            $last_id = $conn->insert_id;
            
                    
                    

            foreach ($_SESSION['orders'] as $key => $menu_id) {
                $sql = "SELECT * FROM menu WHERE id =" . $menu_id;

                $result = $conn->query($sql);

                
                // output data of each row
                if ($row = $result->fetch_assoc()) {
                    $stmt2 = $conn->prepare("INSERT INTO order_details (order_id, menu_id, quantity, unit_price) VALUES ( ?, ?, ?, ?)");
                    $quantity=1;
                    $stmt2->bind_param("ssss", $last_id, $row['id'], $quantity, $row['price'] );

                    if ($stmt2->execute()) {
                        $response['status'] = "success";
                        $response['message'] = "Successfully submited order!";
                        unset($_SESSION['orders']);
                    } else {
                        $response['status'] = "error";
                        $response['message'] = "Insert error: " . $conn->error;
                    }
                    $stmt2  ->close();
                } 
            }
            
            
        } else {
            $response['status'] = "error";
            $response['message'] = "Insert error: " . $conn->error;
        }

        
    
} else {
    $response['status'] = "error";
    $response['message'] = "All fields are require!";
}

$conn->close();

$json_response = json_encode($response);
echo $json_response;
?>
