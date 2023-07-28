 <?php if ($_SESSION['admin']==1) {?>
        <div class=" mt-5">
            <b><p align="center">ORDER LIST</p></b>

            </div>
            <table class="table  table-striped">
                <thead>
                    <tr>
                        <br>              
                        <td scope="col">ID</td><td scope="col">Date Order</td><td scope="col">Deleviry Date</td><td scope="col">Delivery Address</td><td scope="col">Delivery Time</td><td scope="col">Contact Number</td>
                    </tr>
                </thead>
                <!-- List Loop -->
                <tbody id="user-list"><tbody>
            </table>
        </div>
    <?php }
        else{

        }

    ?>

        

