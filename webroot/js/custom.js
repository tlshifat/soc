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
     * Function for validate register form.
     * 
     */
    $("#register_form").validate({    
        rules: {
          name:{required:true,maxlength: 15},
          email: {required: true, email: true},
          password: {required: true,minlength: 6},
          confirm_password: {required: true}
       },
       messages: {
          name:{
            required: "Please provide your name.", 
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




}); 