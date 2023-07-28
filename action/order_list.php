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
        <td scope="row"><?php echo $row[' delivery_date']; ?></td>
        <td scope="row"><?php echo $row[' delivery_time']; ?></td>
        <td scope="row"><?php echo $row[' delivery_address']; ?></td>
        <td scope="row"><?php echo $row[' contact_number']; ?></td>
        <td scope="row">
          
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