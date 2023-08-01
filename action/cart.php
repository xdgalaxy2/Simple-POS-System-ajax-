<?php 
session_start();

foreach ($_SESSION['orders'] as $key => $menu_id) {
    echo $menu_id.'<br>';
}
 ?>