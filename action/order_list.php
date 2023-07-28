<?php
session_start();
error_reporting(0);
require '../mysql-connect.php';

  /*
  if($_POST['search']){
      $where = " AND ( firstname LIKE '%".$_POST['search']."%'  OR date_order LIKE '%".$_POST['search']."%' OR id LIKE '%".$_POST['search']."%' )";
  }else{
    $where="";
  }
  */

$sql = "SELECT * FROM orders WHERE id != ".$_SESSION['user_id']." $where ORDER BY date_order";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
    <tr>
        <td scope="row"><?php echo $row['id']; ?></td>
        <td scope="row"><?php echo $row['date_order']; ?></td>
        <td scope="row"><?php echo $row['email']; ?></td>
        <td scope="row">
          
          <div class="dropdown">
            <a class="text-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg>
            </a>
            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuLink">
            <a href="#" class="edit-user dropdown-item text-primary small"  data-toggle="modal" data-target="#profileModal" data-fname="<?php echo $row['firstname'] ?>" 
          data-lname="<?php echo $row['date_order'] ?>" data-id="<?php echo $row['id'] ?>" data-email="<?php echo $row['email'] ?>" 
          data-username ="<?php echo $row['username'] ?>">EDIT</a> 
          <a href="#" class="delete-user dropdown-item text-danger small" data-id="<?php echo $row['id']; ?>">DELETE</a> 

        </div>
        </div>
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