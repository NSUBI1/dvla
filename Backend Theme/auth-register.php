<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Register | Upcube - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />

        <?php
        include ("./header.php");
        ?>

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">
    
                        <div class="text-center mt-1">
                            <div class="mb-1">
                                <a href="index.html" class="auth-logo">
                                    <img src="assets/images/logo.png" height="80" class="logo-dark mx-auto" alt="">
                                </a>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>
    
                        <div class="p-3">
                            <form class="form-horizontal mt-1 register_form" action="index.html">
                                <input type="hidden" name="action" value="client">
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" type="text" required="" placeholder="full name" name="full_name">
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" type="email" required="" placeholder="Email" name="email_address">
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" type="number" required="" placeholder="contact number" name="tel_number" minlength="10" maxlength='12'
                                        >
                                    </div>
                                </div>

                                    <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" type="text" required="" placeholder="Residential Address" name="address">
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" type="password" required="" placeholder="Password" name="password">
                                    </div>
                                </div>
    
                                <div class="form-group text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-lightm register" type="submit">Register</button>
                                    </div>
                                </div>
    
                                <div class="form-group mt-2 mb-0 row">
                                    <div class="col-12 mt-3 text-center">
                                        <a href="index.php" class="text-muted">Already have account?</a>
                                    </div>
                                </div>
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->
        

        <!-- JAVASCRIPT -->
    <?php  include ('./footer.php')?>

    </body>
</html>


<script>

        $(document).ready(function(){
      
        $(document).on('click','.register', function(e){
            e.preventDefault();
            var form = $('.register_form')[0];
            var form_data = new FormData(form);
            if($(".register_form").parsley().validate()){
            $.ajax({
                url:'./server/register-user.php',
                method:'post',
                data:form_data,
                contentType: false,
                cache: false,
                processData: false,
                success:function(data){
                   if(data=='email address already exist'){
                    Swal.fire({
            icon: 'error',
            title: 'Error',
            text: data,
            showConfirmButton: true,
        })
                   }
                   else{
                    Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Registration successful',
                    showConfirmButton: true,
                    })

                    setTimeout(function(){
                        location.href='./index.php'
                    },1000)
                   
                   }
                }
            })

        }
        else{

        }
        })


        })


// $("#change_pwd_form_data").parsley().validate()
</script>
