<?php
session_start();
require '../mysql-connect.php';



if($_POST['username'] && $_POST['password']){

    $sql = "SELECT * FROM students WHERE username='".$_POST['username']."'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if($row = mysqli_fetch_assoc($result))
    {
       

        $verify = password_verify($_POST['password'], $row['password']);
  
        if ($verify) {
            $_SESSION['admin'] = $row['admin'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['fulname'] = $row['firstname'].' '.$row['lastname'];
            $response['message'] = 'Password Verified!';
        } else {
            $response['message'] = 'Incorrect Password!';
        }
      

    }else{
        $response['message'] = 'Invalid Username!';
    }

}else{
    $response['message'] = 'Username and Password are required.';
}

$conn->close();

$json_response = json_encode($response);
echo $json_response;
?>