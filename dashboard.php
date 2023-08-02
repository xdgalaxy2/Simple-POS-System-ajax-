 <?php if ($_SESSION['admin']==1) {?>
        <div class=" mt-5">
            <b><p align="center">ORDER LIST</p></b>
        <div style="padding: 6px;" >
            <button type="button" data-toggle="modal" data-target="#OrderModal" class="btn btn-primary" name="add-user" id="add-profile" >Add Order</button>                  
        </div>
            </div>
            <table class="table  table-striped">
                <thead>
                    <tr>
                        <br>              
                        <td scope="col">ID</td><td scope="col">Date Order</td><td scope="col">Deleviry Date</td><td scope="col">Delivery Time</td><td scope="col">Delivery Address</td><td scope="col">Contact Number</td><td scope="col">Action</td>
                    </tr>
                </thead>
                <!-- List Loop -->
                <tbody id="order-list"><tbody>
            </table>
        </div>
    <?php }
        else{

        }

    ?>

<!-- Profile Modal -->
<div class="modal fade" id="OrderModal" tabindex="-1" aria-labelledby="OrderLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="OrderLabel">Edit Order</h5>
        </div>
        
        <div class="modal-body">
            <form id="form-menu">
            <input type="hidden" value="" id="order-id" name="order-id">
            <div class="mb-3">
                <label for="Deleviry Date" class="col-form-label">Deleviry Date:</label>
                <input type="text" class="form-control" name="delivery_date" id="delivery_date">
            </div>
            <div class="mb-3">
                <label for="Delivery Time" class="col-form-label">Delivery Time:</label>
                <input type="text" class="form-control" name="delivery_time" id="delivery_time">
            </div>
            <div class="mb-3">
                <label for="Delivery Address" class="col-form-label">Delivery Address:</label>
                <input type="text" class="form-control" name="delivery_address" id="delivery_address">
            </div>
            <div class="mb-3">
                <label for="Contact Number" class="col-form-label">Contact Number:</label>
                <input type="text" class="form-control" name="contact_number" id="contact_number">
            </div>
        </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id = "update-orderdetails">Save</button>
        </div>
    </div>
</div>