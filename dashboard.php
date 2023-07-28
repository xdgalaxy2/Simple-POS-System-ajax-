 <?php if ($_SESSION['admin']==1) {?>
        <div class=" mt-5">
            <b><p align="center">ORDER LIST</p></b>

            </div>
            <table class="table  table-striped">
                <thead>
                    <tr>
                        <br>              
                        <td scope="col">ID</td><td scope="col">date_order</td><td scope="col">deleviry_date</td><td scope="col">delivery_address</td><td scope="col">delivery_time</td><td scope="col">contact_number</td>
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

        

