<?php
session_start();
require '../mysql-connect.php';

$response = array();

    if (!empty($_POST["firstname"]) && !empty($_POST["lastname"])){  

        if($_POST["profile-id"]){
            if($_POST["password"] && $_POST["confirm-password"]){
                if($_POST["password"] ==  $_POST["confirm-password"]){
                    $stmt = $conn->prepare("UPDATE accounts SET firstname = ?, lastname = ?, email = ?, password = ? WHERE id = '".$_POST["profile-id"]."'");
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
                $response['message'] = "Record update successfully!";
            } else {
                $response['message'] = "Update error: " . $conn->error;
            }
        }else{
            if($_POST["password"] == $_POST["confirm-password"]){
                $stmt = $conn->prepare("INSERT INTO accounts (firstname, lastname,  username, email, password) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $first_name, $last_name, $username, $email, $password);
                $first_name = $_POST["firstname"];
                $last_name = $_POST["lastname"];
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                
            
                if ($stmt->execute()) {
                    $response['message'] = "Record add successfully!";
                } else {
                    $response['message'] = "Add error: " . $conn->error;
                }
            }else{
                $response['message'] = "Password and Confirm Password don't match!";
            }
        }
              
    
    }


$conn->close();

$json_response = json_encode($response);
echo $json_response;
?>