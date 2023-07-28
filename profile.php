 <?php if ($_SESSION['admin']==1) {?>
        <div class=" mt-5">
            <b>MENU LIST</b>

            <div style="padding: 6px;" >
                <button type="button" data-toggle="modal" data-target="#profileModal" class="btn btn-primary" name="add-user" id="add-profile" >Add User</button>                      
            
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
            


<!-- Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="profileModalLabel">Update Profile</h5>
        </div>
        
        <div class="modal-body">
            <form id="update-profile">
            <input type="hidden" value="" id="profile-id" name="profile-id">
            <div class="mb-3">
                <label for="firstname" class="col-form-label">First Name:</label>
                <input type="text" class="form-control" name="firstname" id="firstname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="col-form-label">Last Name:</label>
                <input type="text" class="form-control" name="lastname" id="lastname">
            </div>
            <div class="mb-3">
                <label for="email" class="col-form-label">Email:</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            
            <div class="mb-3 username-wrapper">
                <label for="username" class="col-form-label">Username:</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3 password-wrapper" >
                <label for="password" class="col-form-label">Password: <span class = "optional">(optional)</span></label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3 password-wrapper">
                <label for="confirm-password" class="col-form-label">Confirm Password: <span class = "optional">(optional)</span></label>
                <input type="password" class="form-control" name="confirm-password" id="confirm-password">
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id = "save-profile">Save</button>
        </div>
    </div>
</div>