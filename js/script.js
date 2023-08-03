$(function(){

    $(".menu-search").on('keyup',function(e) {
            loadMenuList();
            
    });

   
    loadOrderDetails();

    $(".order-details-search").on('keyup',function(e) {
            loadOrderDetails();
            
    });

    

    loadOrderLists();

    $(".order-list-search").on('keyup',function(e) {
            loadOrderLists();
            
    });

    



    loadUserLists();

    

    $("#save-profile").click(function(e){
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
          }).then((result) => {
            if (result.isConfirmed) {
            
                $.ajax({
                    type        : 'POST',  
                    url         : 'action/update-user.php',
                    data        : $('#update-profile').serialize() , // data : $('#form_ID').serialize() or data : {var1:val1,var2:val2}
                    dataType    : 'json',  //  xml, html, script, json, text
                    beforeSend : function() {
                    
                    },
                    //is called when the server returns success status code, like: 200, 201
                    success:function(data){   
                        //console.log(data);
                    if(data.message=='Record update successfully!' || data.message=='Record add successfully!'){
                        
                        Swal.fire(
                            'Profile!',
                            data.message,
                            'success'
                          )

                        loadUserLists();
        
                    }else{
                        
                        Swal.fire(
                            'Profile',
                            data.message,
                            'error'
                          )
                        
                    }
                        
                    
                    },
                    // is called always when the request is complete. (no matter, it is success/error response from server.)
                    complete : function(data,status) {
                        //console.log(data.responseText);
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        console.log(xhr.responseText);
                    }
                });
            }

          })

    })
 
    $("#login-form").submit(function(e){
        e.preventDefault();

        $.ajax({
          type        : 'POST',  
          url         : 'action/verify-user.php',
          data        : $('#login-form').serialize(), // data : $('#form_ID').serialize() or data : {var1:val1,var2:val2}
          dataType    : 'json',  //  xml, html, script, json, text
          beforeSend : function() {
            $('#login-message').html("Verifiying Account.");
          },
          //is called when the server returns success status code, like: 200, 201
          success:function(data){   
              //console.log(data);
            if(data.message=='Password Verified!'){

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 1500
                })

                
                setTimeout(
                    function() 
                    {
                        $(window).attr('location','/ajax/');
                    }, 1500);

            }else{
                
                  Swal.fire({
                    icon: 'warning',
                    title: 'LOGIN',
                    text: data.message,
                    footer: ''
                  })
                 
            }
              
             
          },
          // is called always when the request is complete. (no matter, it is success/error response from server.)
          complete : function(data,status) {
              //console.log(data.responseText);
          },
          error:function (xhr, ajaxOptions, thrownError){
              console.log(xhr.responseText);
          }
      });

    })


    $("#signup-form").submit(function(e){
        e.preventDefault();

        $.ajax({
          type        : 'POST',  
          url         : 'action/save-profile.php',
          data        : $('#signup-form').serialize(), // data : $('#form_ID').serialize() or data : {var1:val1,var2:val2}
          dataType    : 'json',  //  xml, html, script, json, text
          beforeSend : function() {
            $('#login-message').html("Saving Profile.");
          },
          //is called when the server returns success status code, like: 200, 201
          success:function(data){   
              //console.log(data);
            if(data.message=='Create account successfully!'){

                $('#login-message').html("");

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 1500
                })


            }else{
                
                  Swal.fire({
                    icon: 'warning',
                    title: 'Create account',
                    text: data.message,
                    footer: ''
                  })
                 
            }
              
             
          },
          // is called always when the request is complete. (no matter, it is success/error response from server.)
          complete : function(data,status) {
              console.log(data.responseText);
          },
          error:function (xhr, ajaxOptions, thrownError){
              console.log(xhr.responseText);
          }
      });

    })

    
    $(document).on('click', '.delete-user', function(e){
        e.preventDefault();
        
        var id = $(this).attr("data-id");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
            
                $.ajax({
                    type        : 'POST',  
                    url         : 'action/delete-user.php',
                    data        : {id:id}, // data : $('#form_ID').serialize() or data : {var1:val1,var2:val2}
                    dataType    : 'json',  //  xml, html, script, json, text
                    beforeSend : function() {
                    
                    },
                    //is called when the server returns success status code, like: 200, 201
                    success:function(data){   
                        //console.log(data);
                    if(data.message=='Record deleted successfully!'){
                        
                        Swal.fire(
                            'Deleted!',
                            'User record has been deleted.',
                            'success'
                          )

                        loadUserLists();
        
                    }else{
                        
                        Swal.fire(
                            'Delete',
                            'Failed to delete user record!',
                            'error'
                          )
                        
                    }
                        
                    
                    },
                    // is called always when the request is complete. (no matter, it is success/error response from server.)
                    complete : function(data,status) {
                        //console.log(data.responseText);
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        console.log(xhr.responseText);
                    }
                });
            }

          })

    })


    $(document).on('click', '.delete-order', function(e){
        e.preventDefault();
        
        var id = $(this).attr("data-id");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
            
                $.ajax({
                    type        : 'POST',  
                    url         : 'action/delete-order.php',
                    data        : {id:id}, // data : $('#form_ID').serialize() or data : {var1:val1,var2:val2}
                    dataType    : 'json',  //  xml, html, script, json, text
                    beforeSend : function() {
                    
                    },
                    //is called when the server returns success status code, like: 200, 201
                    success:function(data){   
                        //console.log(data);
                    if(data.message=='Order deleted successfully!'){
                        
                        Swal.fire(
                            'Deleted!',
                            'Order record has been deleted.',
                            'success'
                          )

                        loadOrderLists();
        
                    }else{
                        
                        Swal.fire(
                            'Delete',
                            'Failed to delete order record!',
                            'error'
                          )
                        
                    }
                        
                    
                    },
                    // is called always when the request is complete. (no matter, it is success/error response from server.)
                    complete : function(data,status) {
                        //console.log(data.responseText);
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        console.log(xhr.responseText);
                    }
                });
            }

          })

    })



    $(document).on('click', '.delete-menu', function(e){
        e.preventDefault();
        
        var id = $(this).attr("data-id");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
            
                $.ajax({
                    type        : 'POST',  
                    url         : 'action/delete-menu.php',
                    data        : {id:id}, // data : $('#form_ID').serialize() or data : {var1:val1,var2:val2}
                    dataType    : 'json',  //  xml, html, script, json, text
                    beforeSend : function() {
                    
                    },
                    //is called when the server returns success status code, like: 200, 201
                    success:function(data){   
                        //console.log(data);
                    if(data.message=='Record deleted successfully!'){
                        
                        Swal.fire(
                            'Deleted!',
                            'User record has been deleted.',
                            'success'
                          )

                        loadMenuList();
        
                    }else{
                        
                        Swal.fire(
                            'Delete',
                            'Failed to delete user record!',
                            'error'
                          )
                        
                    }
                        
                    
                    },
                    // is called always when the request is complete. (no matter, it is success/error response from server.)
                    complete : function(data,status) {
                        //console.log(data.responseText);
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        console.log(xhr.responseText);
                    }
                });
            }

          })

    })



     $(document).on('click', '.add-order', function(e){
        e.preventDefault();
        
        var id = $(this).attr("data-id");

            
                $.ajax({
                    type        : 'POST',  
                    url         : 'action/add-order.php',
                    data        : {id:id}, // data : $('#form_ID').serialize() or data : {var1:val1,var2:val2}
                    dataType    : 'json',  //  xml, html, script, json, text
                    beforeSend : function() {
                    
                    },
                    //is called when the server returns success status code, like: 200, 201
                    success:function(data){   
                        //console.log(data);
                    if(data.message=='Order added'){
                        
                        Swal.fire(
                            'Order',
                            'Order Added',
                            'success'
                          )

                        //loadMenuList();
                        $(".cart").html(data.cart);
        
                    }else{
                        
                        Swal.fire(
                            'Delete',
                            'Failed to delete user record!',
                            'error'
                          )
                        
                    }
                        
                    
                    },
                    // is called always when the request is complete. (no matter, it is success/error response from server.)
                    complete : function(data,status) {
                        //console.log(data.responseText);
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        console.log(xhr.responseText);
                    }
                });
            

          })




    $("#profile-search").submit(function(e){
        e.preventDefault();
        loadUserLists();
    });

    $(".profile-search").on('keyup',function(e) {
     
            loadUserLists();
            
    });

    



    $("#logout-user").click(function(e){
        e.preventDefault();
        
        Swal.fire({
            title: 'Logout Account',
            text: "Are you sure?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log out!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Logout Account',
                'You are now log out.',
                'success'
              )

              setTimeout(
                function() 
                {
                    $(window).attr('location','/ajax/logout.php');
                }, 1000);

            }
          })

        });

     $("#update-menu").click(function(e){
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
          }).then((result) => {
            if (result.isConfirmed) {
            
                $.ajax({
                    type        : 'POST',  
                    url         : 'action/update-menu.php',
                    data        : $('#form-menu').serialize() , // data : $('#form_ID').serialize() or data : {var1:val1,var2:val2}
                    dataType    : 'json',  //  xml, html, script, json, text
                    beforeSend : function() {
                    
                    },
                    //is called when the server returns success status code, like: 200, 201
                    success:function(data){   
                        //console.log(data);
                    if(data.message=='Menu updated successfully!' || data.message=='Menu item created successfully!'){
                        
                        Swal.fire(
                            'Profile!',
                            data.message,
                            'success'
                          )

                        loadMenuList();
        
                    }else{
                        
                        Swal.fire(
                            'Profile',
                            data.message,
                            'error'
                          )
                        
                    }
                        
                    
                    },
                    // is called always when the request is complete. (no matter, it is success/error response from server.)
                    complete : function(data,status) {
                        //console.log(data.responseText);
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        console.log(xhr.responseText);
                    }
                });
            }

          })

    })


     $("#update-orderdetails").click(function(e){
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
          }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type        : 'POST',  
                    url         : 'action/update-orderdetails.php',
                    data        : $('#form-menu').serialize() , // data : $('#form_ID').serialize() or data : {var1:val1,var2:val2}
                    dataType    : 'json',  //  xml, html, script, json, text
                    beforeSend : function() {
                    
                    },
                    //is called when the server returns success status code, like: 200, 201
                    success:function(data){  
                        //console.log(data);
                    if(data.message=='Order details updated successfully!' || data.message=='Order details added successfully!'){
                        
                        Swal.fire(
                            'Profile!',
                            data.message,
                            'success'
                          )

                        loadOrderLists();
        
                    }else{
                        
                        Swal.fire(
                            'Profile',
                            data.message,
                            'error'
                          )
                        
                    }
                        
                    
                    },
                    // is called always when the request is complete. (no matter, it is success/error response from server.)
                    complete : function(data,status) {
                        console.log(data.responseText);
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        console.log(xhr.responseText);
                    }
                });
            }

          })

    })





           // Edit Profile add value to form fields
    $('#profileModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var firstname = button.data('fname'); // Extract info from data-* attributes
        var lastname = button.data('lname');
        var id = button.data('id');
        var email = button.data('email');
        var username = button.data('username');

        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        if (id) {
            modal.find('.modal-body #profile-id').val(id);
            modal.find('.modal-body #firstname').val(firstname);
            modal.find('.modal-body #lastname').val(lastname);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #username').val(username);

            modal.find('.modal-body #username').prop('disabled', true);

            modal.find('.modal-header #profileModalLabel').html("Update Profile");
            modal.find('.modal-body .optional').show();
        } else {
            modal.find('.modal-body .optional').hide();
            modal.find('.modal-body #profile-id').val("");
            modal.find('.modal-body #firstname').val("");
            modal.find('.modal-body #lastname').val("");
            modal.find('.modal-body #email').val("");
            modal.find('.modal-body #username').val("");

            modal.find('.modal-body #username').prop('disabled', false);

            modal.find('.modal-header #profileModalLabel').html("Add Profile");
        }

    });



           // Edit menu add value to form fields
    $('#MenuModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var description = button.data('description'); // Extract info from data-* attributes
        var price = button.data('price');
        var id = button.data('id');

        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        if (id) {
            modal.find('.modal-body #menu-id').val(id);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #price').val(price);


            modal.find('.modal-header #MenuLabel').html("Update Menu");
        } else {
            modal.find('.modal-body #menu-id').val("");
            modal.find('.modal-body #description').val("");
            modal.find('.modal-body #price').val("");

            modal.find('.modal-header #MenuLabel').html("Add Menu");
        }

    });



           // Edit menu add value to form fields
    $('#OrderModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var delivery_date = button.data('deliverydate'); // Extract info from data-* attributes
        var delivery_time = button.data('deliverytime');
        var delivery_address = button.data('deliveryaddress');
        var contact_number = button.data('contactnumber');
        var id = button.data('id');

        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        if (id) {
            modal.find('.modal-body #order-id').val(id);
            modal.find('.modal-body #delivery_date').val(delivery_date);
            modal.find('.modal-body #delivery_time').val(delivery_time);
            modal.find('.modal-body #delivery_address').val(delivery_address);
            modal.find('.modal-body #contact_number').val(contact_number);


            modal.find('.modal-header #OrderLabel').html("Update Order");
        } else {
            modal.find('.modal-body #order-id').val("");
            modal.find('.modal-body #delivery_date').val(delivery_date);
            modal.find('.modal-body #delivery_time').val(delivery_time);
            modal.find('.modal-body #delivery_address').val(delivery_address);
            modal.find('.modal-body #contact_number').val(contact_number);
            modal.find('.modal-header #OrderLabel').html("Add Order");
        } 
    });

     $('#CartModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal

                $.ajax({
                    type        : 'POST',  
                    url         : 'action/cart-list.php',
                    data        : $('#form-cart').serialize() , // data : $('#form_ID').serialize() or data : {var1:val1,var2:val2}
                    dataType    : 'html',  //  xml, html, script, json, text
                    beforeSend : function() {
                    
                    },
                    //is called when the server returns success status code, like: 200, 201
                    success:function(data){  
                        //console.log(data);
                    $(".cart-list").html(data);
                        
                    
                    },
                    // is called always when the request is complete. (no matter, it is success/error response from server.)
                    complete : function(data,status) {
                        console.log(data.responseText);
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        console.log(xhr.responseText);
                    }
                });


    });

});




 function loadMenuList(){

        var search = $(".menu-search").val();

        $.ajax({
            type        : 'POST',  
            url         : 'action/menu-list.php',
            data        : {search:search}, // data : $('#form_ID').serialize() or data : {var1:val1,var2:val2}
            dataType    : 'html',  //  xml, html, script, json, text
            beforeSend : function() {
              
            },
            //is called when the server returns success status code, like: 200, 201
            success:function(data){   
                //console.log(data);
           
                $('#menu-list   ').html(data);
               
            },
            // is called always when the request is complete. (no matter, it is success/error response from server.)
            complete : function(data,status) {
                //console.log(data.responseText);
            },
            error:function (xhr, ajaxOptions, thrownError){
                console.log(xhr.responseText);
            }
        });
    }

    function loadOrderLists(){

        var search = $(".order-list-search").val();

        $.ajax({
            type        : 'POST',  
            url         : 'action/order-list.php',
            data        : {search:search}, // data : $('#form_ID').serialize() or data : {var1:val1,var2:val2}
            dataType    : 'html',  //  xml, html, script, json, text
            beforeSend : function() {
              
            },
            //is called when the server returns success status code, like: 200, 201
            success:function(data){   
                //console.log(data);
           
                $('#order-list').html(data);
               
            },
            // is called always when the request is complete. (no matter, it is success/error response from server.)
            complete : function(data,status) {
                //console.log(data.responseText);
            },
            error:function (xhr, ajaxOptions, thrownError){
                console.log(xhr.responseText);
            }
        });
    }


    function loadOrderDetails(){

        var search = $(".order-details-search").val();

        $.ajax({
            type        : 'POST',  
            url         : 'action/order-details.php',
            data        : {search:search}, // data : $('#form_ID').serialize() or data : {var1:val1,var2:val2}
            dataType    : 'html',  //  xml, html, script, json, text
            beforeSend : function() {
              
            },
            //is called when the server returns success status code, like: 200, 201
            success:function(data){   
                //console.log(data);
           
                $('#order-list').html(data);
               
            },
            // is called always when the request is complete. (no matter, it is success/error response from server.)
            complete : function(data,status) {
                //console.log(data.responseText);
            },
            error:function (xhr, ajaxOptions, thrownError){
                console.log(xhr.responseText);
            }
        });
    }


    function loadUserLists(){

        var search = $(".profile-search").val();

        $.ajax({
            type        : 'POST',  
            url         : 'action/user-list.php',
            data        : {search:search}, // data : $('#form_ID').serialize() or data : {var1:val1,var2:val2}
            dataType    : 'html',  //  xml, html, script, json, text
            beforeSend : function() {
              
            },
            //is called when the server returns success status code, like: 200, 201
            success:function(data){   
                //console.log(data);
           
                $('#user-list').html(data);
               
            },
            // is called always when the request is complete. (no matter, it is success/error response from server.)
            complete : function(data,status) {
                //console.log(data.responseText);
            },
            error:function (xhr, ajaxOptions, thrownError){
                console.log(xhr.responseText);
            }
        });
    }

