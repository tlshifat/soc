$(document).ready(function (){

    /*
     * Function for validate login form.
     * 
     */
    $("#login_form").validate({   
      rules: {
        email: {required: true, email: true},
        password: {required: true}
      },
      messages: {
        password: "Please enter your password.",
        email:{
          email: "Your email must be in the format of name@domain.com",  
          required:"Please enter your valid email address."
            
        }
      }      
    });

    /*
     * Function for validate frontend register form.
     * 
     */
    $("#register_form").validate({    
        rules: {
          first_name:{required:true,maxlength: 15},
          last_name:{required:true,maxlength: 15},
          email: {required: true, email: true},
          password: {required: true,minlength: 6},
          confirm_password: {required: true}
       },
       messages: {
          first_name:{
            required: "Please provide your First name.", 
            maxlength: "Name should be less than 15 characters."
          },
          last_name:{
            required: "Please provide your Last name.", 
            maxlength: "Name should be less than 15 characters."
          },
          email:{
            email: "Your email must be in the format of name@domain.com",  
            required:"Please enter your valid email address."
            
          },
           password:{
              required: "Please enter your password.", 
              minlength: "Password must contain at least six characters!"
           },
           confirm_password:{
              required:"Please enter your confirmation password."
           }
         
       }      
    });    

    /*
     * Function for validate admin add user form.
     * 
     */
    $("#Admin-AddUser").validate({    
        rules: {
          first_name:{required:true,maxlength: 15},
          last_name:{required:true,maxlength: 15},
          email: {required: true, email: true},
          password: {required: true,minlength: 6},
          confirm_password: {required: true},
          role: {required: true}
       },
       messages: {
          first_name:{
            required: "Please provide your First name.", 
            maxlength: "Name should be less than 15 characters."
          },
          last_name:{
            required: "Please provide your Last name.", 
            maxlength: "Name should be less than 15 characters."
          },
          email:{
            email: "Your email must be in the format of name@domain.com",  
            required:"Please enter your valid email address."
            
          },
           password:{
              required: "Please enter your password.", 
              minlength: "Password must contain at least six characters!"
           },
           confirm_password:{
              required:"Please enter your confirmation password."
           },
           role:{
              required:"Please select User Role."
           },
         
       }      
    }); 

    /*
     * Function for validate admin edit user form.
     * 
     */
    $("#Admin-EditUser").validate({    
        rules: {
          first_name:{required:true,maxlength: 15},
          last_name:{required:true,maxlength: 15},
          email: {required: true, email: true},
          password: {required: false,minlength: 6},
          confirm_password: {required: false},
          role: {required: true}
       },
       messages: {
          first_name:{
            required: "Please provide your First name.", 
            maxlength: "Name should be less than 15 characters."
          },
          last_name:{
            required: "Please provide your Last name.", 
            maxlength: "Name should be less than 15 characters."
          },
          email:{
            email: "Your email must be in the format of name@domain.com",  
            required:"Please enter your valid email address."
            
          },
           password:{
              required: "Please enter your password.", 
              minlength: "Password must contain at least six characters!"
           },
           confirm_password:{
              required:"Please enter your confirmation password."
           },
           role:{
              required:"Please select User Role."
           },
         
       }      
    }); 

    /*
     * Function for validate admin add/edit role.
     * 
     */
    $("#Admin-AddRole").validate({    
        rules: {
          role:{required:true},
       },
       messages: {
          role:{
            required: "Please enter Role title.", 
          },
       }      
    }); 


    /*
     * Function for validate admin add/edit permission.
     * 
     */
    $("#Admin-AddPermission").validate({    
        rules: {
          role:{required:true},
       },
       messages: {
          role:{
            required: "Please enter Permission title.", 
          },
       }      
    }); 

    /*
     * Function for datatable with button options.
     * 
     */
    $('.dataTables-list-buttons').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'csv'},
            {extend: 'excel', title: 'Downloaded File'},
            {extend: 'pdf', title: 'Downloaded File'},
            {extend: 'print',
              customize: function (win){
                      $(win.document.body).addClass('white-bg');
                      $(win.document.body).css('font-size', '10px');

                      $(win.document.body).find('table')
                              .addClass('compact')
                              .css('font-size', 'inherit');
              }
            }
        ]

    });

    /*
     * Function for datatable without button options.
     * 
     */
    $('.dataTables-list').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            
        ]

    });

    /*
     * Function to show confirmation alert for the data deletion
     * 
     */
    $('body').on('click', '.deleteData', function(){     
      var passedString = $(this).attr('id');
      var res = passedString.split("_");
      var model = res[0]; //model to be called
      var id = res[1]; //id to be deleted for respective model

      swal({
          title: "Are you sure?",
          text: "You will not be able to recover this record!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: true
        }, function () {
            $.ajax({
                method: "POST",
                dataType: "json",
                url: model + '/delete/'+ id ,
                success:function(data) {
                  if(data['status'] == 'deleted') {
                      $('.gradeX_'+id).remove();
                      swal("Good...", "Record has been deleted successfully.", "success");
                  } else if(data['status'] == 'error') {
                      swal("Oops...", "Something went wrong!", "error");
                  }
                  else{
                      swal("Oops...", "Something went wrong!", "error");
                  } 
                }
            });
        });
    });

    /*
     * Function for manage user status.
     * 
     */
    $('body').on('click', '.manage_status', function(){
        var user_id = $(this).attr('id');
        var status = $(this).text();
       swal({
            title: "Are you sure?",
            text: "You want to change status of this user!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, change it!",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                method: "POST",
                url: "users/manage_status/" + user_id,
                success:function(data) {
                  var data = $.parseJSON(data);
                  if(data['status'] == 0) {
                      if(status == 'Active'){
                        $(".manage_status_"+user_id).removeClass("btn-primary");  
                        $(".manage_status_"+user_id).addClass("btn-warning");  
                        $(".manage_status_"+user_id).text("Inactive");  
                      }else{
                        $(".manage_status_"+user_id).removeClass("btn-warning");  
                        $(".manage_status_"+user_id).addClass("btn-primary");
                        $(".manage_status_"+user_id).text("Active");  
                      }                    
                      
                      sweetAlert("Good...", "Updated successfully.", "success");    
                  }else{
                      sweetAlert("Oops...", "Something went wrong!", "error");
                  } 
                }
            });
        });
    });

}); 