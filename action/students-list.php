<?php
session_start();
require '../mysql-connect.php';


if($_POST['search']){
    $where = " AND ( firstname LIKE '%".$_POST['search']."%'  OR lastname LIKE '%".$_POST['search']."%' OR id LIKE '%".$_POST['search']."%' )";
}else{
  $where="";
}

$sql = "SELECT * FROM accounts WHERE id != ".$_SESSION['user_id']." $where ORDER BY lastname";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
    <tr>
        <td scope="row"><?php echo $row['id']; ?></td>
        <td scope="row"><?php echo $row['lastname'].', '.$row['firstname'] ; ?></td>
        <td scope="row"><?php echo $row['email']; ?></td>
        <td scope="row">
          <a href="#" class="edit-student"  data-toggle="modal" data-target="#profileModal" data-fname="<?php echo $row['firstname'] ?>" 
          data-lname="<?php echo $row['lastname'] ?>" data-id="<?php echo $row['id'] ?>" data-email="<?php echo $row['email'] ?>" 
          data-username ="<?php echo $row['username'] ?>">EDIT</a> 
          <a href="#" class="delete-student" data-id="<?php echo $row['id']; ?>">DELETE</a> 
        </td>
    </tr>
    <?php
  }
} else {
  ?>
  <tr>
        <td scope="row" colspan="3">No Record Found.</td>
    </tr>
  <?php
}

$conn->close();