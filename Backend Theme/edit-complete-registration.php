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
                                <h4 class="mb-sm-0">Client registration</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Staff</a></li>
                                        <li class="breadcrumb-item active">Portal</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Registration Form</h4>

                                    <div id="progrss-wizard" class="twitter-bs-wizard">
                                        <ul class="twitter-bs-wizard-nav nav-justified">
                                            <li class="nav-item">
                                                <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
                                                    <span class="step-number">01</span>
                                                    <span class="step-title">Client Registration form</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#progress-company-document" class="nav-link" data-toggle="tab">
                                                    <span class="step-number">02</span>
                                                    <span class="step-title">Particulars of Vehicle</span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="#progress-bank-detail" class="nav-link" data-toggle="tab">
                                                    <span class="step-number">03</span>
                                                    <span class="step-title">Other  Details</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#progress-confirm-detail" class="nav-link" data-toggle="tab">
                                                    <span class="step-number">04</span>
                                                    <span class="step-title">Confirm Detail</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <div id="bar" class="progress mt-4">
                                            <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated"></div>
                                        </div>
                                        <div class="tab-content twitter-bs-wizard-tab-content">
                                            <div class="tab-pane" id="progress-seller-details">
                                                <form class="all_forms form_section_1">

                                                    <form class="">
                                                        <div class="client_Form">

                                                        </div>
                                                    </form>

                                            </div>

                                            <!-- other detial  -->
                                            <div class="tab-pane" id="progress-company-document">
                                                <div>
                                                    <form class="form_section_2 all_forms">
                                                      
                                                </form>
                                                </div>
                                            </div>

                                            <!-- other details  -->
                                            <div class="tab-pane" id="progress-bank-detail">
                                                <div>
                                                    <form action="" class="form_section_3 all_forms">
                                           
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="progress-confirm-detail">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-6">
                                                        <div class="text-center">
                                                            <div class="mb-4">
                                                                <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                                            </div>
                                                            <div>
                                                                <h5>Confirm Detail</h5>
                                                                <p class="text-muted">If several languages coalesce, the grammar of the resulting</p>
                                                                <button class="btn btn-primary save_data">Save data</button>
                                                            </div>
                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous"><a href="javascript: void(0);">Previous</a></li>
                                            <li class="next"><a href="javascript: void(0);">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

        </div>

        <?php
        include('./server/footer.php')
        ?>
</body>

</html>

    <script>
    const url = window.location.href;
    const param = new URL(url).searchParams;
    const registration_id = param.get('registration_id');
    $('.registration_id').val(registration_id);
    const decide_registration = param.get('re_type');
    const id = $(this).attr('id');
    const action = 'get_data';
    $.ajax({
        url: './server/register_car.php',
        method: 'post',
        data: {
            action: action,
            id: registration_id,
            decide_registration: decide_registration
        },
        success: function(data) {
            $('.client_Form').prepend(`
                        ${data}`);
        }
    })

    get_vehicle_details();
    function get_vehicle_details(){
        const action = 'get_complete_process_1';
        $.ajax({
        url: './server/register_car.php',
        method: 'post',
        data: {
            action: action,
            id: registration_id,
            decide_registration: decide_registration
        },
        success: function(data) {
            $('.form_section_2').prepend(`
                        ${data}`);
        }
    })
    }
    get_other_details();
    function get_other_details(){
        const action = 'get_complete_process_2';
        $.ajax({
        url: './server/register_car.php',
        method: 'post',
        data: {
            action: action,
            id: registration_id,
            decide_registration: decide_registration
        },
        success: function(data) {

            console.log(data);
            $('.form_section_3').prepend(`
                        ${data}`);
        }
    })
    }

    $('.save_data').click(function() {
    // Select all forms with the class 'all_forms'
    var forms = $('.all_forms');
    // Loop through each form
    forms.each(function(index, form) {
        // Create FormData object for the current form
        var form_data = new FormData(form);
        // Define the URL for the AJAX request (you may need to adjust this)
        var url = './server/register_car.php';
        // Send the AJAX request for the current form
        $.ajax({
            url: url,
            method: 'post',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data == 'data stored') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Car registration successful',
                            showConfirmButton: true,
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data,
                            showConfirmButton: true,
                        })
                    }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occur during the request
                console.error('Error submitting form ' + index + ': ' + error);
            }
        });
    });
});

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

</script>