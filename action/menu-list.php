<?php
session_start();
error_reporting(0);
require '../mysql-connect.php'; // Ensure this file contains a proper database connection

if (isset($_POST['search'])) {
    $searchTerm = '%' . $_POST['search'] . '%';
    $stmt = $conn->prepare("SELECT * FROM menu WHERE description LIKE ? OR price LIKE ? OR id LIKE ?");
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM menu");
}

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td scope="row"><?php echo $row['id']; ?></td>
            <td scope="row"><?php echo $row['description']; ?></td>
            <td scope="row"><?php echo $row['price']; ?></td>
            <td scope="row">
              <?php if ($_SESSION['admin']==1) {?>
                <div class="dropdown">
                    <a class="text-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuLink">
                      
                        <a href="#" class="edit-menu dropdown-item text-primary small" data-bs-toggle="modal"
                            data-bs-target="#MenuModal" data-description="<?php echo $row['description'] ?>"
                            data-price="<?php echo $row['price'] ?>" data-id="<?php echo $row['id'] ?>">EDIT</a>
                        <a href="#" class="delete-menu dropdown-item text-danger small"
                            data-id="<?php echo $row['id']; ?>">DELETE</a>
                        
                    </div>
                </div>
                 <?php }else{ ?>
                            <a href="#" class="add-order text-primary small"
                            data-id="<?php echo $row['id']; ?>">ADD ORDER</a>

                <?php } ?>
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
?>
