<?php
session_start();
error_reporting(0);
require 'mysql-connect.php';

if(empty($_SESSION['user_id'])){
    header("Location: login.php", true, 301);
    exit();
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>jQuery, Ajax, PHP, MySQL</title>

         <!-- jQuery -->    
        <script src="lib/jquery.min.js"></script>
    
        <!-- bootstrap -->
        <!-- 
            https://getbootstrap.com/docs/5.0/getting-started/introduction/    
            icons:    
        -->
        <!--
        <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        -->
        <script src="lib/bootstrap/js/popper.min.js"></script>
        
        
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        
        

        <!-- Custom -->
        <script src="js/script.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css">

        <!-- Sweet Alert -->
        <!-- https://sweetalert2.github.io/#examples -->
        <script src="lib/sweet-alert/sweetalert2.min.js"></script>
        <link href="lib/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" <?php if($_GET['page']=='dashboard') echo 'active'; ?> href="?page=dashboard"><img src="assets/images/FU_logo.png" width="80"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link <?php if($_GET['page']=='dashboard') echo 'active'; ?>" aria-current="page" href="?page=dashboard">DASHBOARD</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link <?php if($_GET['page']=='menu') echo 'active'; ?>" aria-current="page" href="?page=menu">MENU</a>
                </li>
                <?php if($_SESSION['admin']){ ?>
                <li class="nav-item">
                  <a class="nav-link <?php if($_GET['page']=='profile') echo 'active'; ?>" href="?page=profile">USERS</a>
                </li>
               <?php  } ?>
              </ul>
              <div class="d-flex cart-wrapper"  data-bs-toggle="modal" data-bs-target="#CartModal">
                  <svg id="view-order" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart2 me-4" viewBox="0 0 16 16">
                      <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>
                <span class="cart"><?php echo is_array($_SESSION["orders"])? count($_SESSION["orders"]):0;  ?></span>
            </div>
              <div class="d-flex">
                    <input class="form-control me-2 <?php echo ($_GET['page'])?$_GET['page']:'dashboard'; ?>-search" name="search" type="search" placeholder="Search" aria-label="Search">
              </div>


            </div>
          </div>
           <div class="modal fade" id="CartModal" tabindex="-1" aria-labelledby="OrderLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="MenuLabel">Cart</h5>
                </div>
                
                <div class="modal-body">
                
                  <table class="table  table-striped">
                      <thead>
                          <tr>
                              <td>Menu</td>
                              <td>Price</td>
                              <td>Quantity</td>
                              <td>Total</td>
                          </tr>
                      </thead>
                      <tbody class="cart-list">
                          
                      </tbody>
                  </table>

                  <form id="customer-details">
                        <input type="hidden" value="" id="menu-id" name="menu-id">
                        <div class="mb-3">
                            <label for="delivery_date" class="col-form-label">Delivery Date:</label>
                            <input type="text" class="form-control" name="delivery_date" id="delivery_date" value="2023-08-08">
                        </div>
                        <div class="mb-3">
                            <label for="delivery_time" class="col-form-label">Delivery Time:</label>
                            <input type="text" class="form-control" name="delivery_time" id="delivery_time" value="23:08:12">
                        </div>
                        <div class="mb-3">
                            <label for="delivery_address" class="col-form-label">Delivery Address:</label>
                            <input type="text" class="form-control" name="delivery_address" id="delivery_address" value="aaaaaaa">
                        </div>
                        <div class="mb-3">
                            <label for="contact_number" class="col-form-label">Contact Number:</label>
                            <input type="text" class="form-control" name="contact_number" id="contact_number" value="111111111">
                        </div>
                </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id = "submit-order">Submit Order</button>
                </div>
            </div>
        </div>     
        </nav>                    

       <?php echo 'Welcome '.$_SESSION['fulname'].'!'; ?> <a href="#" id="logout-user">Logout</a>
       
       <?php
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = "";
        }
         switch($page){
            case "menu":
                require "menu.php";
            break;

            case "profile":
                require "profile.php";
            break;

            case "order-details":
                require "order-details.php";
            break;
            case "index":
                require "index.php";
            break;

            default:
                require "dashboard.php";
                
         }
        ?>
    </body>
</html>

<?php
$conn->close();
?>


