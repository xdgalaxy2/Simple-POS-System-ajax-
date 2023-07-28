 <?php if ($_SESSION['admin']==1) {?>
        <div class=" mt-5">
            <b>USER LIST</b>

            <div style="padding: 6px;" >
                <button type="button" data-toggle="modal" data-target="#profileModal" class="btn btn-primary" name="add-user" id="add-profile" >Add Menu</button>                      
            
            </div>
            <table class="table  table-striped">
                <thead>
                    <tr>
                        <td scope="col">ID</td><td scope="col">Name</td><td scope="col">Email</td><td scope="col">Action</td>
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

        

