 <?php if ($_SESSION['admin']==1) {?>
        <div class=" mt-5">
            <b><p align="center">MENU LIST</p></b>

            <div style="padding: 6px;" >
                <button type="button" data-toggle="modal" data-target="#MenuLabel" class="btn btn-primary" name="add-user" id="add-profile" >Add Menu</button>                      
            
            </div>
            <table class="table  table-striped">
                <thead>
                    <tr>
                        <td scope="col">ID</td><td scope="col">Name</td><td scope="col">Email</td><td scope="col">Action</td>
                    </tr>
                </thead>
                <!-- List Loop -->
                <tbody id="menu-list"><tbody>
            </table>
        </div>
    <?php }
        else{

        }

    ?>
            


<!-- Profile Modal -->
<div class="modal fade" id="MenuLabel" tabindex="-1" aria-labelledby="OrderLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="OrderLabel">Update Menu</h5>
        </div>
        
        <div class="modal-body">
            <form id="update-profile">
            <input type="hidden" value="" id="profile-id" name="profile-id">
            <div class="mb-3">
                <label for="Description" class="col-form-label">Description:</label>
                <input type="text" class="form-control" name="lastname" id="lastname">
            </div>
            <div class="mb-3">
                <label for="Price" class="col-form-label">Price:</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id = "save-profile">Save</button>
        </div>
    </div>
</div>