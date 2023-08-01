 <div class=" mt-5">
    <b><p align="center">MENU LIST</p></b>

    <?php if ($_SESSION['admin']==1) {?>
         <div style="padding: 6px;" >
                <button type="button" data-toggle="modal" data-target="#MenuModal" class="btn btn-primary" >Add Menu</button>                      
            
            </div>
   
    <?php }
        else{

        }

    ?>
     <table class="table  table-striped">
        <thead>
            <tr>
                <td scope="col">ID</td><td scope="col">Description</td><td scope="col">Price</td><td scope="col">Action</td>
            </tr>
        </thead>
        <!-- List Loop -->
        <tbody id="menu-list"><tbody>
    </table>
</div>
            


<!-- Profile Modal -->
<div class="modal fade" id="MenuModal" tabindex="-1" aria-labelledby="OrderLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="MenuLabel">Add Menu</h5>
        </div>
        
        <div class="modal-body">
            <form id="form-menu">
            <input type="hidden" value="" id="menu-id" name="menu-id">
            <div class="mb-3">
                <label for="Description" class="col-form-label">Description:</label>
                <input type="text" class="form-control" name="description" id="description">
            </div>
            <div class="mb-3">
                <label for="Price" class="col-form-label">Price:</label>
                <input type="text" class="form-control" name="price" id="price">
            </div>
        </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id = "update-menu">Save</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        loadMenuList();
    });
</script>