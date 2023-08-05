<?php
session_start();
error_reporting(0);
require '../mysql-connect.php';

// Always use prepared statements to prevent SQL injection
// Make sure to sanitize the input data to avoid potential security issues
if (isset($_POST['search'])) {
    $search = '%' . $_POST['search'] . '%';
    $where = " WHERE (date_order LIKE ? OR delivery_address LIKE ? OR id LIKE ?)";
} else {
    $where = "";
}

$sql = "SELECT * FROM orders" . $where;

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind parameters to the prepared statement
    if (isset($_POST['search'])) {
        $stmt->bind_param("sss", $search, $search, $search);
    }

    // Execute the prepared statement
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td scope="row"><?php echo $row['id']; ?></td>
                <td scope="row"><?php echo $row['date_order']; ?></td>
                <td scope="row"><?php echo $row['delivery_date']; ?></td>
                <td scope="row"><?php echo $row['delivery_time']; ?></td>
                <td scope="row"><?php echo $row['delivery_address']; ?></td>
                <td scope="row"><?php echo $row['contact_number']; ?></td>
                <td scope="row">
                    <div class="dropdown">
                    <a class="text-secondary dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuLink">
                      
                        <a href="#" class="edit-menu dropdown-item text-primary small" data-bs-toggle="modal"
                            data-bs-target="#OrderModal" 
                            data-deliverydate="<?php echo $row['delivery_date'] ?>"
                            data-deliverytime="<?php echo $row['delivery_time'] ?>"
                            data-deliveryaddress="<?php echo $row['delivery_address'] ?>"
                            data-contactnumber="<?php echo $row['contact_number'] ?>"
                            data-id="<?php echo $row['id'] ?>"
                            >EDIT</a>
                        <a href="#" class="delete-order dropdown-item text-danger small"
                            data-id="<?php echo $row['id']; ?>">DELETE</a>
                        
                    </div>
                </div>
                </td>

            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td scope="row" colspan="7">No Record Found.</td>
        </tr>
        <?php
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error in the query.";
}

// Close the connection
$conn->close();

