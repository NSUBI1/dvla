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
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <input type="hidden" name="action" value="complete_process_1">
                                                                <input type="hidden" name="registration_id" class="registration_id">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="vehicle_make">Vehicle Make</label>
                                                                    <input type="text" class="form-control vehicle_make" id="vehicle_make" name="vehicle_make" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="model_name">Model Name /No</label>
                                                                    <input type="text" class="form-control model_name" id="model_name" name="model_name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-cstno-input">Chassis number</label>
                                                                    <input type="text" class="form-control chassis_number" id="progress-basicpill-cstno-input" name="chassis_number" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-servicetax-input">Year of Manufacture</label>
                                                                    <input type="text" class="form-control year_manufacture" id="progress-basicpill-servicetax-input" name="year_manufacture" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-companyuin-input">Body Type</label>
                                                                    <input type="text" class="form-control body_type" id="progress-basicpill-companyuin-input" name="body_type" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-declaration-input">Color</label>
                                                                    <input type="text" class="form-control color" id="progress-basicpill-declaration-input" name="color" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-declaration-input">Measurement(cm) length</label>
                                                                    <input type="text" class="form-control length" id="progress-basicpill-declaration-input" name="length" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-declaration-input">Width</label>
                                                                    <input type="text" class="form-control width" id="progress-basicpill-declaration-input" name="width" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-declaration-input">Height</label>
                                                                    <input type="text" class="form-control height" id="progress-basicpill-declaration-input" name="height" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-declaration-input">Country of origin</label>
                                                                    <input type="text" class="form-control origin" id="progress-basicpill-declaration-input" name="origin" required>
                                                                </div>
                                                            </div>




                                                            <div class="col-lg-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-declaration-input">Number of Axles</label>
                                                                    <input type="text" class="form-control axles" id="progress-basicpill-declaration-input" name="axles" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-declaration-input">Number of tyres</label>
                                                                    <input type="text" class="form-control tyrs" id="progress-basicpill-declaration-input" name="tyrs" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mt-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-declaration-input">Vehicle use(Private)</label>
                                                                    <input type="radio" class="form-check-input vehicle_use" id="progress-basicpill-declaration-input" value="private" name="vehicle_use" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mt-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-declaration-input">Commercial</label>
                                                                    <input type="radio" class="form-check-input vehicle_use" id="progress-basicpill-declaration-input" value="commercial" name="vehicle_use" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                              <strong>Declaration:</strong><p>I declare that , this application to register a motor
                                                                vehicle contains full and true account of the particulas which the law requires me to state
                                                            . I shall be held liable for any false represntation or concealment of relevant facts made in respect of the application
                                                              </p>
                                                            </div>
                                                            <div class="col-lg-3">
                                                              
                                                              </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-3">
                                                                    <input type="file" class="form-control" id="progress-basicpill-declaration-input" name="new_owner_signature" required>

                                                                    <label class="form-label" for="progress-basicpill-declaration-input">New owner Signature</label>
                                                                </div>
                                                            </div>


                                                        </div>
                                                </form>
                                                </div>
                                            </div>

                                            <!-- other details  -->
                                            <div class="tab-pane" id="progress-bank-detail">
                                                <div>
                                                    <form action="" class="form_section_3 all_forms">
                                                    <input type="hidden" name="action" value="complete_process_2">
                                                                <input type="hidden" name="registration_id" class="registration_id">
                                                        <div class="row">
                                                        <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-namecard-input">vehicle weight</label>
                                                                    <input type="text" class="form-control vehicle_weight" id="progress-basicpill-namecard-input" name="vehicle_weight"required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-namecard-input">Permissible Axle load</label>
                                                                    <input type="text" class="form-control vehicle_load" id="progress-basicpill-namecard-input" name="vehicle_load"required>
                                                                </div>
                                                            </div>


                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-namecard-input">Number of persons allowed</label>
                                                                    <input type="text" class="form-control no_persons" id="progress-basicpill-namecard-input" name="no_persons"required>
                                                                </div>
                                                            </div>

                    
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-cardno-input">Gross Weight</label>
                                                                    <input type="numbet" class="form-control gross_weight" id="progress-basicpill-cardno-input" name="gross_weight" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-card-verification-input">Front</label>
                                                                    <input type="text" class="form-control no_front" id="progress-basicpill-card-verification-input" name="no_front" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">Net Weight</label>
                                                                    <input type="text" class="form-control net_weight" id="progress-basicpill-expiration-input" name="net_weight" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">Middel</label>
                                                                    <input type="text" class="form-control no_middle" id="progress-basicpill-expiration-input" name="no_middle" required>
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">Permissible loading capacity</label>
                                                                    <input type="text" class="form-control perm_load" id="progress-basicpill-expiration-input" name="perm_load" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">Rear</label>
                                                                    <input type="text" class="form-control rear" id="progress-basicpill-expiration-input" name="rear" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">Engine make</label>
                                                                    <input type="text" class="form-control engine_make" id="progress-basicpill-expiration-input" name="engine_make" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">Engine number</label>
                                                                    <input type="text" class="form-control engine_number" id="progress-basicpill-expiration-input" name="engine_number" required>
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">Number of Cylinders</label>
                                                                    <input type="text" class="form-control engine_make" id="progress-basicpill-expiration-input" name="num_cylinders" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">Cubic Capacity</label>
                                                                    <input type="text" class="form-control cubic_capacity" id="progress-basicpill-expiration-input" name="cubic_capacity" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">Horse power</label>
                                                                    <input type="text" class="form-control horse_power" id="progress-basicpill-expiration-input" name="horse_power" required>
                                                                </div>
                                                            </div>

                                                        </div>



                                                        <div class="row">
                                                            <div class="col-lg-2 mt-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">Fuel type (Petrol)</label>
                                                                    <input type="radio" class="form-check-input fuel_type" id="progress-basicpill-expiration-input" value="Petrol" name="fuel_type" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-2 mt-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">Diesel</label>
                                                                    <input type="radio" class="form-check-input fuel_type" id="progress-basicpill-expiration-input" value="diesel" name="fuel_type" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-2 mt-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">LPG</label>
                                                                    <input type="radio" class="form-check-input lpg" id="progress-basicpill-expiration-input" value="lpg" name="fuel_type" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-2 mt-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">Electric</label>
                                                                    <input type="radio" class="form-check-input fuel_type" id="progress-basicpill-expiration-input" value="electric" name="fuel_type" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-2 mt-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">Petrol/Electric Hybrid</label>
                                                                    <input type="radio" class="form-check-input fuel_type" id="progress-basicpill-expiration-input" value="Petrol/Electric Hybrid" name="fuel_type" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-2 mt-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-expiration-input">Diesel/Electric Hybrid</label>
                                                                    <input type="radio" class="form-check-input fuel_type" id="progress-basicpill-expiration-input" value="Diesel/Electric Hybrid" name="fuel_type" required>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                        <div class="col-lg-9">
                                                            
                                                            </div>
                                                          
                                                            <div class="col-lg-3">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-declaration-input">Authorised  Signature</label>
                                                                    <input type="file" class="form-control" id="progress-basicpill-declaration-input"  name="authorised_signature" required>
                                                                </div>
                                                            </div>
                                                        </div>
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

                        setTimeout(() => {
                            location.href=`print_completed_data.php?registration_id=${registration_id}&re_type=${decide_registration}`
                        }, 1000);
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







    // $('.ghana_used').remove();
</script>