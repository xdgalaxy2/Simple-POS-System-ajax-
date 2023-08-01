 <?php if ($_SESSION['admin']==1) {?>
        <div class=" mt-5">
            <b><p align="center">ORDER LIST</p></b>
        <div style="padding: 6px;" >
            <button type="button" data-toggle="modal" data-target="#profileModal" class="btn btn-primary" name="add-user" id="add-profile" >Order Details</button>                  
        </div>
            </div>
            <table class="table  table-striped">
                <thead>
                    <tr>
                        <br>              
                        <td scope="col">ID</td><td scope="col">Date Order</td><td scope="col">Deleviry Date</td><td scope="col">Delivery Time</td><td scope="col">Delivery Address</td><td scope="col">Contact Number</td>
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

<script type="text/javascript">
    $(function(){


    loadMenuList();
});
</script>

