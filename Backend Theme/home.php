<?php

include('./server/config.php')
?>

<!doctype html>
<html lang="en">

<head>

    <?php

    include("./server/header.php");

    check_for_login();
    ?>

</head>

<body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="logo-sm" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="logo-dark" height="20">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo.png" alt="logo-sm-light" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo.png" alt="logo-light" height="50">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="ri-menu-2-line align-middle"></i>
                    </button>



                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-search-line"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="mb-3 m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>






                    <div class="dropdown d-inline-block user-dropdown">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/default_user.jpeg" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1"><?php echo substr($_SESSION['full_name'], 0, 5) ?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                            <a class="dropdown-item text-danger" href="./server/logout.php"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>

                    <!-- <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="ri-settings-2-line"></i>
                            </button>
                        </div> -->

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            <?php
            include('./side_bar.php');
            ?>
        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Client</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">

                    <?php
                         if($_SESSION['user_type']=='client'){

                    ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Pending Registrations</p>
                                            <h4 class="mb-2 pending"></h4>

                                        </div>
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-light text-primary rounded-3">
                                                <i class="fas fa-car fa-lg text-danger"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-xl-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Completed Registrations</p>
                                            <h4 class="mb-2 complete"></h4>
                                        </div>
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-light text-success rounded-3">
                                                <i class="fas fa-car fa-lg text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-xl-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Total Registrations</p>
                                            <h4 class="mb-2 total"></h4>
                                        </div>
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-light text-primary rounded-3">
                                                <i class="fas fa-car fa-lg text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <?php
                        
                    }
                    else{

                    
                        ?>

                    <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Pending Registrations</p>
                                            <h4 class="mb-2 pending"></h4>

                                        </div>
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-light text-primary rounded-3">
                                                <i class="fas fa-car fa-lg text-danger"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Completed Registrations</p>
                                            <h4 class="mb-2 complete"></h4>
                                        </div>
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-light text-success rounded-3">
                                                <i class="fas fa-car fa-lg text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Your Registrations</p>
                                            <h4 class="mb-2 your_reg"></h4>
                                        </div>
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-light text-success rounded-3">
                                                <i class="fas fa-car fa-lg text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Total Registrations</p>
                                            <h4 class="mb-2 total"></h4>
                                        </div>
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-light text-primary rounded-3">
                                                <i class="fas fa-car fa-lg text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->


<?php
}
?>

                    </div><!-- end row -->



                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4 class="card-title mb-4">Your car registrations</h4>
                                        </div>

                                        <div class="col-lg-4">
                                            <h6 class="car-regisration" align="right">
                                                <?php
                                                 if ($_SESSION['user_type']=='client'){
                                                    echo '<button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                     data-bs-target=".bs-example-modal-xl" onclick="reg_id()">Start new registration</button>';
                                                 }
                                                else{
                                                    // do nothing
                                                }
                                                ?>
                                            </h6>

                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Registrition number</th>
                                                    <th>Previous Owner</th>
                                                    <th>New Owner</th>
                                                    <th>Contact number</th>
                                                    <th>Status</th>
                                                    <th>Created date</th>
                                                    <th style="width: 120px;">Action</th>
                                                </tr>
                                            </thead><!-- end thead -->
                                            <tbody>

                                                <!-- end -->
                                            </tbody><!-- end tbody -->
                                        </table> <!-- end table -->
                                    </div>
                                </div><!-- end card -->
                            </div><!-- end card -->
                        </div>

                    </div>
                    <!-- end row -->
                </div>

            </div>
            <!-- End Page-content -->

            <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-light text-uppercase" id="myExtraLargeModalLabel">New Car Registration Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <form action="" enctype="multipart/form-data" class="register_car_form">

                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <select class="form-select decide_registration" id="specificSizeSelect" name="decide_registration">
                                            <option value="brand_new" selected disable>Brand New Vehicle Registration</option>
                                            <option value="ghana_used">Fairly Used Vehicle Registration</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="ghana_car">

                                </div>


                                <hr>

                                <div class="brand new mt-3">
                                    <div class="row g-1">

                                        <div class="col-lg-10">
                                            <div class="row g-3">
                                                <input type="hidden" class="reg_id" name="reg_id">
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="new owner" name="new_owner_name" required>
                                                        <label for="floatingInput">Full name of new owner</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="" name="new_owner_address" required>
                                                        <label for="floatingInput">Postal Address</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" id="floatingInput" name="new_owner_location" placeholder="" required>
                                                        <label for="floatingInput">Residential/ location address</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-2">
                                                        <input type="number" class="form-control" id="floatingInput" name="new_owner_number" placeholder="" required minlength="10" maxlength="12">
                                                        <label for="floatingInput">Telephone number</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" id="floatingInput" name="new_owner_tin" placeholder="" required>
                                                        <label for="floatingInput">Tin number</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" id="floatingInput" name="new_owner_work" placeholder="" required>
                                                        <label for="floatingInput">Occupation</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-floating mb-2">
                                                        <input type="email" class="form-control" id="floatingInput" name="new_owner_email_address" placeholder="" required>
                                                        <label for="floatingInput">Email address</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-2">
                                            <div class="pre_owner_img" style="  height: 10rem;width:100%; position: relative; border: 1px solid green;">
                                                <p class="text-uppercase font-size-11 text-center mt-4  new_owner_text">New owner</p>
                                                <img class="img img-fluid new_owner_image" src style="height:100%;width:100%; position:absolute;">
                                            </div>
                                            <p class="text-uppercase font-size-11">New owner</p>
                                            <div class="owner_image">
                                                <input type="file" class="form-control new_owner_file" id="floatingInput" placeholder="name@example.com" name="new_owner_file" required>
                                                <label for="floatingInput">Upload image</label>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                                <!-- end of ghana used vehicle -->
                            </form>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect waves-light register">Register</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->




            <!-- update modal -->
            <div class="modal update_modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-light text-uppercase" id="myExtraLargeModalLabel">New Car Registration Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="get_data">
                          
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect waves-light update_register">Update Data</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <?php
        include('./server/footer.php')
        ?>
</body>

</html>

<script>
    $('.new_owner_image').hide();
    all_data();
    $(document).on('change', '.decide_registration', function() {
        $val = $(this).val();

        if ($val != 'brand_new') {
            ghana_used()

            $('.pre_owner_image').hide();
        } else {
            $('.ghana_used').remove();
        }

    })
    pending();
    complete();
    total();
    your_reg();
    function pending(){
        $.ajax({
            url:"./server/pending_client_count.php",
            method:'post',
            success:function(data){
               $('.pending').html(data);
            }
        })
    }

    function complete(){
        $.ajax({
            url:"./server/complete_client_count.php",
            method:'post',
            success:function(data){
               $('.complete').html(data);
            }
        })
    }

    function total(){
        $.ajax({
            url:"./server/total_client_count.php",
            method:'post',
            success:function(data){
               $('.total').html(data);
            }
        })
    }
 
    function your_reg(){
        $.ajax({
            url:"./server/your_registrations.php",
            method:'post',
            success:function(data){
               $('.your_reg').html(data);
            }
        })
    }

    
   

    $(document).on('change', '.new_owner_file', (e) => {
        let reader = new FileReader();
        reader.onload = function(e) {
            $('.new_owner_image').attr('src', e.target.result);
            $('.new_owner_text').hide();
            $('.new_owner_image').show();
        }
        reader.readAsDataURL(e.target.files['0']);
    })

    $(document).on('change', '.pre_owner_file', (e) => {
        let reader = new FileReader();
        reader.onload = function(e) {
            $('.pre_owner_image').attr('src', e.target.result);
            $('.new_owner_text').hide();
            $('.pre_owner_image').show();
        }
        reader.readAsDataURL(e.target.files['0']);
    })

    $(document).on('change', '.pre_owner_sig_file', (e) => {
        alert('ok');
        let reader = new FileReader();
        reader.onload = function(e) {
            $('.pre_owner_sig').attr('src', e.target.result);
            $('.pre_owner_sig').show();
        }
        reader.readAsDataURL(e.target.files['0']);
    })

    function reg_id() {
        let id = Math.floor(Math.random() * 9000000) + 1000000;
        $('.reg_id').val(id);
    }

    $(document).on('click', '.register', function(e) {
        e.preventDefault();
        var form = $('.register_car_form')[0];
        var form_data = new FormData(form);
        if ($(".register_car_form").parsley().validate()) {
            $.ajax({
                url: './server/register_car.php',
                method: 'post',
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data == 'data stored') {
                        $('.bs-example-modal-xl').modal('hide');
                        $('.register_car_form')[0].reset();

                        $('.pre_owner_image').hide();
                        $('.new_owner_image').hide();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Car registration successful',
                            showConfirmButton: true,
                        })

                        $('.table').DataTable().destroy();
                        all_data();

                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data,
                            showConfirmButton: true,
                        })


                    }
                }
            })

        } else {

        }
    })


    $(document).on('click', '.update_register', function(e) {
        e.preventDefault();
        var form = $('.update_register_car_form')[0];
        var form_data = new FormData(form);
        if ($(".update_register_car_form").parsley().validate()) {
            $.ajax({
                url: './server/register_car.php',
                method: 'post',
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    alert(data)
                    if (data == 'data stored') {
                        $('.update_modal').modal('hide');
                        $('.pre_owner_image').hide();
                        $('.new_owner_image').hide();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Car registration successful',
                            showConfirmButton: true,
                        })

                        $('.table').DataTable().destroy();
                        all_data();

                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data,
                            showConfirmButton: true,
                        })


                    }
                }
            })

        } else {

        }
    })
    function all_data() {
        $('.table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [], // Order by the 5th column (index 4) in descending order
            "ajax": {
                url: "./server/register_car.php",
                type: "POST",
            },
            'aoColumnDefs': [{
                bSortable: false,
                aTargets: [0, 1, 3, 4, 5, 2, 6] // Disable sorting for columns 0, 5, 2, 3, and 4
            }],
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
            ],
            "lengthMenu": [
                [500, 750, 1000, -1],
                [500, 750, 1000, "All"]
            ]
        });
    }

    $(document).on('click', '.edit', function() {
        const decide_registration = $(this).attr('decide_registration');
        const id = $(this).attr('id');
        const action = 'get_data';

        $.ajax({
            url: './server/register_car.php',
            method: 'post',
            data: {
                action: action,
                id: id,
                decide_registration: decide_registration
            },
            success: function(data) {
                $('.get_data').html(`<form action="" enctype="multipart/form-data" class="update_register_car_form">
                        ${data}
                </form>`);
                $('.update_modal').modal('show');
            }
        })
        // alert(id);
        // if (decide_registration !='brand_new'){
        //     ghana_used()
        // }
        // else{
        //     $('.ghana_used').remove();
        // }

    })

        $(document).on('click', '.delete', function() {
        const decide_registration = $(this).attr('decide_registration');
        const id = $(this).attr('id');
        const action = 'delete';

        $.ajax({
            url: './server/register_car.php',
            method: 'post',
            data: {
                action: action,
                id: id,
                decide_registration: decide_registration
            },
            success: function(data) {

                Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: `${data}`,
                            showConfirmButton: true,
                        })
                $('.table').DataTable().destroy();
                        all_data();
            }
        })
    })




    




    function ghana_used() {
        $('.ghana_car').html(` <div class="ghana_used mt-3">
                                    <div class="row g-1">
                                        <div class="col-lg-2">
                                            <div class="pre_owner_img" style="height:10rem;width:100%; position: relative; border: 1px solid green;">
                                            <p class="text-uppercase font-size-11 text-center mt-4 new_owner_text">Previous owner</p>
                                            <img class="img img-fluid pre_owner_image" src style="height:100%;width:100%; position:absolute;">
                                            </div>
                                            <p class="text-uppercase font-size-11">Previous owner</p>
                                            <div class="owner_image">
                                                <input type="file" class="form-control pre_owner_file" id="floatingInput" placeholder="name@example.com" name="pre_owner_file" required>
                                                <label for="floatingInput">Upload image</label>
                                            </div>

                                            <img class="img img-fluid pre_owner_sig" src="" style="height:5rem">
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="row g-3">
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="new owner" name="pre_owner_name" required>
                                                        <label for="floatingInput">Full name of Previous owner</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" id="floatingInput"  placeholder=""name="pre_owner_address" required>
                                                        <label for="floatingInput">Previous Owner  Postal Address</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" id="floatingInput" name="pre_owner_location" placeholder="" required>
                                                        <label for="floatingInput">Previous Owner Residential/ location address</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-2">
                                                        <input type="number" class="form-control" id="floatingInput" name="pre_owner_number" placeholder="" required minlength="10" maxlength="12">
                                                        <label for="floatingInput">Previous Owner  Telephone number</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" id="floatingInput" name="pre_owner_tin" placeholder="" required>
                                                        <label for="floatingInput">Previous Owner  Tin number</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" id="floatingInput" name="pre_owner_work" placeholder="" required>
                                                        <label for="floatingInput">Previous Owner  Occupation</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-2">
                                                        <input type="file" class="form-control pre_owner_sig_file" id="floatingInput" name="pre_owner_sig" placeholder=""required>
                                                        <label for="floatingInput">Previous Owner signature</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-2">
                                                        <input type="email" class="form-control" id="floatingInput" name="pre_owner_email_address" placeholder=""required>
                                                        <label for="floatingInput">Previous Owner Email Address</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                    
                                      

                                    </div>

                                    </div>
                                </div>`)
                                $('.pre_owner_sig').hide();
    }

    // $('.ghana_used').remove();
</script>