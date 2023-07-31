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
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td scope="row" colspan="6">No Record Found.</td>
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

