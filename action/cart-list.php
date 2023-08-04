<?php 
session_start();
require '../mysql-connect.php';

$totalamount = 0;
if (isset($_SESSION['orders']) && is_array($_SESSION['orders'])) {
    foreach ($_SESSION['orders'] as $key => $menu_id) {
        $sql = "SELECT * FROM menu WHERE id =" . $menu_id;

        $result = $conn->query($sql);

        
        // output data of each row
        if ($row = $result->fetch_assoc()) {
            $quantity = 1;
            $total = $row['price'] * $quantity;
            $totalamount = $total + $totalamount;

        ?>

        <tr>
            <td scope="row"><?php echo $row['description']; ?></td>
            <td scope="row"><?php echo $row['price']; ?></td>
            <td scope="row"><?php echo $quantity; ?></td>
            <td scope="row"><?php echo number_format($total, 2); ?></td>
        </tr>

        <?php
                    }

            }
        ?>
        <tr>
            <td colspan ="3">Total Amount:</td>
            <td scope="row"><?php echo number_format($totalamount ,2); ?></td>
        </tr>
        <?php
        }
    
?>


                              