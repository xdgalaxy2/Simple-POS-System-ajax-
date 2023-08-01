<?php
session_start();
require '../mysql-connect.php';

$response = array();

    if (!empty($_POST["Description"]) && !empty($_POST["Price"])){  

        if($_POST["profile-id"]){
            if($_POST["password"] && $_POST["confirm-password"]){
                if($_POST["password"] ==  $_POST["confirm-password"]){
                    $stmt = $conn->prepare("UPDATE accounts SET firstname = ?, lastname = ?, email = ?, password = ? WHERE id = '".$_POST[" "]."'");
                    $stmt->bind_param("ssss", $first_name, $last_name, $email, $password);
                    $first_name = $_POST["firstname"];
                    $last_name = $_POST["lastname"];
                    $email = $_POST["email"];
                    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                }else{
                    $response['message'] = "Password and Confirm Password don't match!";
                }
            }else{
                $stmt = $conn->prepare("UPDATE accounts SET firstname = ?, lastname = ?, email = ? WHERE id = '".$_POST["profile-id"]."'");
                $stmt->bind_param("sss", $first_name, $last_name, $email);
                $first_name = $_POST["firstname"];
                $last_name = $_POST["lastname"];
                $email = $_POST["email"];
            }
    
            if ($stmt->execute()) {
                $response['message'] = "Menu update successfully!";
            } else {
                $response['message'] = "Update error: " . $conn->error;
            }
        }
              
    
    }


$conn->close();

$json_response = json_encode($response);
echo $json_response;
?>