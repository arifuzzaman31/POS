/*
 *
 * login-register modal
 * Autor: Creative Tim
 * Web-autor: creative.tim
 * Web script: http://creative-tim.com
 * 
 */
function showRegisterForm(){
    $('.loginBox').fadeOut('fast',function(){
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast',function(){
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Register with');
    }); 
    $('.error').removeClass('alert alert-danger').html('');
       
}
function showLoginForm(){
    $('#loginModal .registerBox').fadeOut('fast',function(){
        $('.loginBox').fadeIn('fast');
        $('.register-footer').fadeOut('fast',function(){
            $('.login-footer').fadeIn('fast');    
        });
        
        $('.modal-title').html('Login with');
    });       
     $('.error').removeClass('alert alert-danger').html(''); 
}

function openLoginModal(){
    showLoginForm();
    setTimeout(function(){
        $('#loginModal').modal('show');    
    }, 230);
    
}
function openRegisterModal(){
    showRegisterForm();
    setTimeout(function(){
        $('#loginModal').modal('show');    
    }, 230);
    
}

function PostForRegister(){
     // alert($('#status').val());
    var baseUrl        = window.location;
    var _token         = $('input[name=_token]').val();
    var full_name      = $('#full_name').val();
    var user_name      = $('#user_name').val();
    var email          = $('#emails').val();
    var contact        = $('#contact').val();
    var password       = $('#passwords').val();
    var address        = $('#address').val();
    var status         = $('#status').val();

    $.post( "backend/registration-post",{ 
                    _token: _token,
                    'full_name': full_name,
                    'user_name': user_name,
                    'email': email,
                    'contact': contact,
                    'password': password,
                    'address': address,
                    'status': status
                 },
                function(data) {
                    if (data.success == true) {
                     window.location.replace(baseUrl+"/dashboard");
                     alert(data.message);
                     console.log(data);            
                    } else {
                        alert(data.message);
                    }

            }); 
        }

function loginAjax(){

     var url = window.location;//<?php echo url() ?>
     var email = $("#admin-email").val();
     var password = $("#admin-password").val();

    $.ajax({
        type : 'POST',
        url: url+'/login-post',
        dataType: 'json',
        data : {
            
            'email' : email, 
            'password' : password
        },
        success: function(data){
             console.log(data);
            if (data.status == true) {
                
                window.location.replace(url+"/dashboard"); 
            }else{ 
                alert('failed');
            }
        },
        error: function(data){
            shakeModal();
             console.log(data);
        }
    });

      // Remove this comments when moving to server
  /*  $.post( "/login.post", function( data ) {
            if(data == 1){
                window.location.replace("/dashboard");            
            } else {
                 shakeModal(); 
            }
        }); */


/*   Simulate error message from the server   */
    // shakeModal(); 
}

function shakeModal(){
    $('#loginModal .modal-dialog').addClass('shake');
             $('.error').addClass('alert alert-danger').html("Invalid email/password combination");
             $('input[type="password"]').val('');
             setTimeout( function(){ 
                $('#loginModal .modal-dialog').removeClass('shake'); 
    }, 1000 ); 
}

   