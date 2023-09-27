<?php

include("./config.php");

// new owner fields
if (isset($_POST['reg_id'])) {
    // Escape user input
    $new_owner_work = escape_string($_POST['new_owner_work']);
    $new_owner_address = escape_string($_POST['new_owner_address']);
    $new_owner_name = escape_string($_POST['new_owner_name']);
    $new_owner_email_address = escape_string($_POST['new_owner_email_address']);
    $new_owner_number = escape_string($_POST['new_owner_number']);
    $new_owner_location = escape_string($_POST['new_owner_location']);
    $new_owner_tin = escape_string($_POST['new_owner_tin']);
    $decide_registration = escape_string($_POST['decide_registration']);
    $regi_id = escape_string($_POST['reg_id']);

    // Define the file directory and target file path
    $file_dir = 'assets/images/client_image/';
    $target_file = $file_dir . $_FILES['new_owner_file']['name'];
    $temp_file = $_FILES['new_owner_file']['tmp_name'];
    $file_size = $_FILES['new_owner_file']['size'] / 1000;
    // $image_size = getimagesize($temp_file);

    // Prepare SQL and calculate new file name
    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $new_file = time() . '.' . $file_extension;
    $new_target_file = $file_dir . $new_file;

    // Check if the file extension is allowed and the file size is acceptable
    if (in_array($file_extension,['jpg', 'jpeg', 'png'])) {
        if ($file_size > 250) {
            exit("<script>Swal.fire({
            title: 'Error',
            icon: 'error',
            text: 'File size {$file_size} kb is too big. Maximum size allowed is 250kb.',
        })</script>");
        }
    }

    // Create the insert query

$insert_query = "INSERT INTO new_registration 
(new_owner_work, new_owner_address, new_owner_name, new_owner_email_address,
new_owner_number, decide_registration, new_owner_location, registration_id, 
new_owner_tin, user_id, new_owner_file) 
VALUES ('{$new_owner_work}', '{$new_owner_address}', '{$new_owner_name}', 
'{$new_owner_email_address}', '{$new_owner_number}', 
'{$decide_registration}', '{$new_owner_location}', '{$regi_id}', 
'{$new_owner_tin}', '{$_SESSION['user_id']}', '{$new_target_file}')";

    // Execute the query
    if (!mysqli_query($con, $insert_query)) {
        die(mysqli_error($con));
    } else {

        if (isset($_POST['pre_owner_name'])) {
            // preowner feilds
            $pre_owner_name = escape_string($_POST['pre_owner_name']);
            $pre_owner_address = escape_string($_POST['pre_owner_address']);
            $pre_owner_location = escape_string($_POST['pre_owner_location']);
            $pre_owner_number = escape_string($_POST['pre_owner_number']);
            $pre_owner_tin = escape_string($_POST['pre_owner_tin']);
            $pre_owner_work = escape_string($_POST['pre_owner_work']);
            $pre_owner_email_address = escape_string($_POST['pre_owner_email_address']);

            $pre_file_dir = 'assets/images/client_image/';
            $pre_target_file = $file_dir . $_FILES['pre_owner_file']['name'];
            $pre_tep_file = $_FILES['pre_owner_file']['tmp_name'];
            $pre_file_size = $_FILES['pre_owner_file']['size']/1000;
            $image_size = getimagesize($pre_tep_file);

            // prepare sql and bind parameters
            $pre_file_extension = strtolower(pathinfo($pre_target_file, PATHINFO_EXTENSION));
            $pre_new_file = 'pre' . time() . '.' . $pre_file_extension;
            $pre_new_target_file = $pre_file_dir . $pre_new_file;

            if (in_array($file_extension, ['jpg', 'jpeg', 'png'])) {
                if ($pre_file_size > 250) {
            exit("<script>Swal.fire({
            title: 'Error',
            icon: 'error',
            text: 'file size {$pre_file_size} kb is too big you need 250kb',
            })</script>");
                }
            }

            $sig_file_dir = 'assets/images/client_image/';
            $sig_target_file = $sig_file_dir . $_FILES['pre_owner_sig']['name'];
            $sig_tep_file = $_FILES['pre_owner_sig']['tmp_name'];
            $sig_file_size = $_FILES['pre_owner_sig']['size'] / 1000;
            //  $image_size=getimagesize($sig_tep_file);
            // prepare sql and bind parameters
            $sig_file_extension = strtolower(pathinfo($sig_target_file, PATHINFO_EXTENSION));
            $sig_new_file = 'sig' . time() . '.' . $sig_file_extension;
            $sig_new_target_file = $sig_file_dir . $sig_new_file;



            //  $pre_owner_sig_file=escape_string($_POST['pre_owner_sig_file']);

            $insert_query2 = query("INSERT into previouse_owner (pre_owner_name,pre_owner_address,pre_owner_email_address,pre_owner_number,pre_owner_location,registration_id,pre_owner_tin,pre_owner_work,pre_owner_file,pre_owner_sig_file)
            values ('{$pre_owner_name}','{$pre_owner_address}','{$pre_owner_email_address}',
            '{$pre_owner_number}','{$pre_owner_location}',
            '{$regi_id}','{$pre_owner_tin}','{$pre_owner_work}','{$pre_new_target_file}','{$sig_new_target_file}')");

            // $insert_query2=query("INSERT into previouse_owner (pre_owner_name,pre_owner_address,pre_owner_email_address,pre_owner_number,pre_owner_location)
            // values ('{$pre_owner_name}','{$pre_owner_address}','{$pre_owner_email_address}','{$$pre_owner_number}','{$pre_owner_location}')");
            if (!$insert_query2) {
                die(mysqli_error($con));
            } else {
                move_uploaded_file($temp_file, '../' . $new_target_file);
                move_uploaded_file($pre_tep_file, '../' . $pre_new_target_file);
                move_uploaded_file($sig_tep_file, '../' . $sig_new_target_file);
                echo 'data stored';
            }
        } else {
            $insert_query2 = query("INSERT into previouse_owner (registration_id)
            values ('{$regi_id}')");
            move_uploaded_file($temp_file, '../' . $new_target_file);
            echo 'data stored';
        }
    }
}
if (isset($_POST['action'])) {
    $id = escape_string($_POST['id']);
    if ($_POST['action'] == 'delete') {
        $query = query("DELETE from new_registration 
         USING new_registration
        inner join previouse_owner
        on previouse_owner.registration_id=new_registration.registration_id
        where new_registration.registration_id='{$id}'
        ");

        if (!$query) {
            die(mysqli_error($con));
        } else {
            exit('data deleted');
        }
    }
    if ($_POST['action'] == 'update_client') {
        $new_owner_work = escape_string($_POST['new_owner_work']);
        $new_owner_address = escape_string($_POST['new_owner_address']);
        $new_owner_name = escape_string($_POST['new_owner_name']);
        $new_owner_email_address = escape_string($_POST['new_owner_email_address']);
        $new_owner_number = escape_string($_POST['new_owner_number']);
        $new_owner_location = escape_string($_POST['new_owner_location']);
        $new_owner_tin = escape_string($_POST['new_owner_tin']);
        $decide_registration = escape_string($_POST['decide_registration']);
        $regi_id = escape_string($_POST['registration_id']);

        $file_dir = 'assets/images/client_image/';
        $target_file = $file_dir . $_FILES['new_owner_file']['name'];
        $tep_file = $_FILES['new_owner_file']['tmp_name'];
        $file_size = $_FILES['new_owner_file']['size'] / 1000;

        //   $image_size=getimagesize($tep_file);
        // prepare sql and bind parameters
        $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $new_file = time() . '.' . $file_extension;

        if (in_array($file_extension, ['jpg', 'jpeg', 'png'])) {
            if ($file_size > 250) {
                exit("<script>Swal.fire({
          title: 'Error',
          icon: 'error',
          text: 'file size {$file_size} kb is too big you need 250kb',
          })</script>");
            }
        }

        if ($file_size == 0) {
            $new_target_file = escape_string($_POST['old_file']);
        } else {
            $new_target_file = $file_dir . $new_file;
        }

        $insert_query = query("UPDATE new_registration set 
   new_owner_work='{$new_owner_work}',new_owner_address='{$new_owner_address}',
   new_owner_name='{$new_owner_name}',new_owner_email_address='{$new_owner_email_address}',
   new_owner_number='{$new_owner_number}',new_owner_location='{$new_owner_location}',
   new_owner_tin='{$new_owner_tin}',new_owner_file='{$new_target_file}' where registration_id='{$regi_id}'
   ");
        if (!$insert_query) {
            die(mysqli_error($con));
        } else {
            if ($file_size != 0) {
                if (move_uploaded_file($tep_file, '../' . $new_target_file)) {
                } else {
                    echo 'file error';
                }
            }
            // preowner feilds
            $pre_owner_name = escape_string($_POST['pre_owner_name']);
            $pre_owner_address = escape_string($_POST['pre_owner_address']);
            $pre_owner_location = escape_string($_POST['pre_owner_location']);
            $pre_owner_number = escape_string($_POST['pre_owner_number']);
            $pre_owner_tin = escape_string($_POST['pre_owner_tin']);
            $pre_owner_work = escape_string($_POST['pre_owner_work']);
            $pre_owner_email_address = escape_string($_POST['pre_owner_email_address']);

            $pre_file_dir = 'assets/images/client_image/';
            $pre_target_file = $pre_file_dir . $_FILES['pre_owner_file']['name'];
            $pre_tep_file = $_FILES['pre_owner_file']['tmp_name'];
            $pre_file_size = $_FILES['pre_owner_file']['size'] / 1000;
            // $image_size=getimagesize($pre_tep_file);
            // prepare sql and bind parameters
            $pre_file_extension = strtolower(pathinfo($pre_target_file, PATHINFO_EXTENSION));
            $pre_new_file = time() . '.' . $pre_file_extension;


            if (in_array($pre_file_extension, ['jpg', 'jpeg', 'png'])) {
                if ($pre_file_size > 250) {
                    exit("<script>Swal.fire({
title: 'Error',
icon: 'error',
text: 'file size {$pre_file_size} kb is too big you need 250kb',
})</script>");
                }
            }
            if ($pre_file_size == 0) {
                $pre_new_target_file = escape_string($_POST['pre_old_file']);
            } else {
                $pre_new_target_file = $pre_file_dir . $pre_new_file;
            }

            // pre_owner_sig

            $sig_file_dir = 'assets/images/client_image/';
            $sig_target_file = $sig_file_dir . $_FILES['pre_owner_sig']['name'];
            $sig_temp_file = $_FILES['pre_owner_sig']['tmp_name'];
            $sig_file_size = $_FILES['pre_owner_sig']['size'] / 1000;
            //  $image_size=getimagesize($sig_tep_file);
            // prepare sql and bind parameters
            $sig_file_extension = strtolower(pathinfo($sig_target_file, PATHINFO_EXTENSION));
            $sig_new_file = 'sig' . time() . '.' . $sig_file_extension;


            if ($sig_file_size == 0) {
                $sig_new_target_file = escape_string($_POST['pre_owner_sig_file_old']);
            } else {
                $sig_new_target_file = $sig_file_dir . $sig_new_file;
            }
            $pre_query = query("UPDATE previouse_owner set 
pre_owner_work='{$pre_owner_work}',pre_owner_address='{$pre_owner_address}',
pre_owner_name='{$pre_owner_name}',pre_owner_email_address='{$pre_owner_email_address}',
pre_owner_number='{$pre_owner_number}',pre_owner_location='{$pre_owner_location}',
pre_owner_tin='{$pre_owner_tin}',pre_owner_file='{$pre_new_target_file}',
pre_owner_sig_file='{$sig_new_target_file}' where registration_id='{$regi_id}'
");
            if (!$pre_query) {
                die(mysqli_error($con));
            } else {
                if ($pre_file_size != 0) {
                    if (move_uploaded_file($pre_tep_file, '../' . $pre_new_target_file)) {
                        move_uploaded_file($sig_temp_file, '../' . $sig_new_target_file);
                        unlink('../' . $_POST['pre_old_file']);
                        unlink('../' . $_POST['pre_owner_sig_file_old']);
                        echo 'data stored';
                    } else {
                        echo 'file error';
                    }
                } else {
                    echo 'data stored';
                }
            }
        }
    } else if ($_POST['action'] == 'complete_process_1') {
        $registration_id = escape_string($_POST['registration_id']);
        $vehicle_make = escape_string($_POST['vehicle_make']);
        $model_name = escape_string($_POST['model_name']);
        $chassis_number = escape_string($_POST['chassis_number']);
        $year_manufacture = escape_string($_POST['year_manufacture']);
        $height = escape_string($_POST['height']);
        $body_type = escape_string($_POST['body_type']);
        $color = escape_string($_POST['color']);
        $length = escape_string($_POST['length']);
        $width = escape_string($_POST['width']);
        $origin = escape_string($_POST['origin']);
        $axles = escape_string($_POST['axles']);
        $tyrs = escape_string($_POST['tyrs']);
        $vehicle_use = escape_string($_POST['vehicle_use']);

        $check_query = query("SELECT * from complete_registration where registration_id='{$registration_id}'");

        if (mysqli_num_rows($check_query) > 0) {

            $insert_query = query("UPDATE  complete_registration set vehicle_make='{$vehicle_make}'
        ,model_name='{$model_name}',chassis_number='{$chassis_number}',year_manufacture='{$year_manufacture}',
        height='{$height}',body_type='{$body_type}',color='{$color}',user_id= '{$_SESSION['user_id']}',
        length='{$length}',width='{$width}',origin='{$origin}',axles='{$axles}',tyrs='{$tyrs}',vehicle_use='{$vehicle_use}'
        where registration_id='{$registration_id}'");
            if (!$insert_query) {
                echo 'error';
                die(mysqli_error($con));
            } else {
                echo 'data stored';
            }
        } else {
            $insert_query = query("INSERT into complete_registration (registration_id,vehicle_make,model_name,chassis_number,year_manufacture,
height,body_type,color,user_id,length,width,origin,axles,tyrs,vehicle_use)
values ('{$registration_id}','{$vehicle_make}','{$model_name}','{$chassis_number}','{$year_manufacture}',
'{$height}','{$body_type}','{$color}','{$_SESSION['user_id']}','{$length}','{$width}',
'{$origin}','{$axles}','{$tyrs}','{$vehicle_use}')");

            if (!$insert_query) {
                echo 'error';
                die(mysqli_error($con));
            } else {
                echo 'data stored';
            }
        }
    } else if ($_POST['action'] == 'complete_process_2') {
        $vehicle_load = escape_string($_POST['vehicle_load']);
        $no_persons = escape_string($_POST['no_persons']);
        $gross_weight = escape_string($_POST['gross_weight']);
        $no_front = escape_string($_POST['no_front']);
        $net_weight = escape_string($_POST['net_weight']);

        $registration_id = escape_string($_POST['registration_id']);

        $no_middle = escape_string($_POST['no_middle']);
        $perm_load = escape_string($_POST['perm_load']);
        $rear = escape_string($_POST['rear']);
        $engine_make = escape_string($_POST['engine_make']);
        $engine_number = escape_string($_POST['engine_number']);
        $cubic_capacity = escape_string($_POST['cubic_capacity']);
        $horse_power = escape_string($_POST['horse_power']);
        $num_cylinders = escape_string($_POST['num_cylinders']);
        $vehicle_weight = escape_string($_POST['vehicle_weight']);
        $fuel_type = escape_string($_POST['fuel_type']);


        $check_query = query("SELECT * from complete_registration where registration_id='{$registration_id}'");

        if (mysqli_num_rows($check_query) > 0) {
            $update_query = query("UPDATE  complete_registration set vehicle_load='{$vehicle_load}',no_persons='{$no_persons}',
        gross_weight='{$gross_weight}',no_front='{$no_front}',net_weight='{$net_weight}',no_middle='{$no_middle}',perm_load='{$perm_load}',rear='{$rear}',
        engine_make='{$engine_make}',horse_power='{$horse_power}',engine_number='{$engine_number}',
        cubic_capacity='{$cubic_capacity}',num_cylinders='{$num_cylinders}',vehicle_weight='{$vehicle_weight}',
        fuel_type='{$fuel_type}' where registration_id='{$registration_id}'");

            if (!$update_query) {
                die(mysqli_error($con));
            } else {

                $sig_file_dir = 'assets/images/client_image/';
                $sig_target_file = $sig_file_dir . $_FILES['new_owner_signature']['name'];
                $sig_temp_file = $_FILES['new_owner_signature']['tmp_name'];
                $sig_file_size = $_FILES['new_owner_signature']['size'] / 1000;
                //  $image_size=getimagesize($sig_tep_file);
                // prepare sql and bind parameters
                $sig_file_extension = strtolower(pathinfo($sig_target_file, PATHINFO_EXTENSION));
                $sig_new_file = 'sig' . time() . '.' . $sig_file_extension;
                $sig_new_target_file = $sig_file_dir . $sig_new_file;
                $complete_process = query("UPDATE new_registration set status='complete',
        new_owner_sig='{$sig_new_target_file}'
         where registration_id='{$registration_id}'");
                move_uploaded_file($sig_temp_file, '../' . $sig_new_target_file);
                echo "data stored";
            }
        } else {
            if (query("INSERT into complete_registration (registration_id) values('{$registration_id}')")) {
                $update_query = query("UPDATE  complete_registration set vehicle_load='{$vehicle_load}',no_persons='{$no_persons}',
            gross_weight='{$gross_weight}',no_front='{$no_front}',net_weight='{$net_weight}',no_middle='{$no_middle}',perm_load='{$perm_load}',rear='{$rear}',
            engine_make='{$engine_make}',horse_power='{$horse_power}',engine_number='{$engine_number}',
            cubic_capacity='{$cubic_capacity}',num_cylinders='{$num_cylinders}',vehicle_weight='{$vehicle_weight}',
            fuel_type='{$fuel_type}' where registration_id='{$registration_id}'");

                if (!$update_query) {
                    die(mysqli_error($con));
                } else {
                    $sig_file_dir = 'assets/images/client_image/';
                    $sig_target_file = $sig_file_dir . $_FILES['new_owner_signature']['name'];
                    $sig_temp_file = $_FILES['new_owner_signature']['tmp_name'];
                    $sig_file_size = $_FILES['new_owner_signature']['size'] / 1000;
                    //  $image_size=getimagesize($sig_tep_file);
                    // prepare sql and bind parameters
                    $sig_file_extension = strtolower(pathinfo($sig_target_file, PATHINFO_EXTENSION));
                    $sig_new_file = 'sig' . time() . '.' . $sig_file_extension;
                    $sig_new_target_file = $sig_file_dir . $sig_new_file;
                    $complete_process = query("UPDATE new_registration set status='complete',
                new_owner_sig='{$sig_new_target_file}'
                 where registration_id='{$registration_id}'");
                    move_uploaded_file($sig_temp_file, '../' . $sig_new_target_file);
                    echo "data stored";
                }
            } else {
                echo 'error';
            }
        }
    } else if ($_POST['action'] == 'get_complete_process_1') {
        $registration_id = escape_string($_POST['id']);
        $get_data = query("SELECT * from complete_registration where registration_id='{$registration_id}'");
        if (!$get_data) {
            die(mysqli_error($con));
        } else {
            foreach ($get_data as $row) {
                echo '
            <div class="row">
            <div class="col-lg-6">
                <input type="hidden" name="action" value="edit_complete_process_1">
                <input type="hidden" name="registration_id" class="registration_id" value="' . $row['registration_id'] . '">
                <div class="mb-3">
                    <label class="form-label" for="vehicle_make">Vehicle Make</label>
                    <input type="text" class="form-control vehicle_make" id="vehicle_make" name="vehicle_make" value="' . $row['vehicle_make'] . '" required>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="model_name">Model Name /No</label>
                    <input type="text" class="form-control model_name" id="model_name" name="model_name" value="' . $row['model_name'] . '" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-cstno-input">Chassis number</label>
                    <input type="text" class="form-control chassis_number" id="progress-basicpill-cstno-input" name="chassis_number"  value="' . $row['chassis_number'] . '" required>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-servicetax-input">Year of Manufacture</label>
                    <input type="text" class="form-control year_manufacture" id="progress-basicpill-servicetax-input" name="year_manufacture" value="' . $row['year_manufacture'] . '" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-companyuin-input">Body Type</label>
                    <input type="text" class="form-control body_type" id="progress-basicpill-companyuin-input" name="body_type" value="' . $row['body_type'] . '" required>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Color</label>
                    <input type="text" class="form-control color" id="progress-basicpill-declaration-input" name="color" value="' . $row['color'] . '" required>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Measurement(cm) length</label>
                    <input type="number" class="form-control length" id="progress-basicpill-declaration-input" name="length" value="' . $row['length'] . '" required>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Width</label>
                    <input type="text" class="form-control width" id="progress-basicpill-declaration-input" name="width" value="' . $row['width'] . '" required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Height</label>
                    <input type="text" class="form-control height" id="progress-basicpill-declaration-input" name="height" value="' . $row['height'] . '" required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Country of origin</label>
                    <input type="text" class="form-control origin" id="progress-basicpill-declaration-input" name="origin" value="' . $row['origin'] . '" required>
                </div>
            </div>


            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Number of Axles</label>
                    <input type="text" class="form-control axles" id="progress-basicpill-declaration-input" name="axles" value="' . $row['axles'] . '" required>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Number of tyres</label>
                    <input type="text" class="form-control tyrs" id="progress-basicpill-declaration-input" name="tyrs" value="' . $row['tyrs'] . '" required>
                </div>
            </div>
            <div class="col-lg-3 mt-4">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Vehicle use(Private)</label>
                    <input type="hidden" name="old_car_use" value="' . $row['vehicle_use'] . '">
                    <input type="radio" class="form-check-input vehicle_use" id="progress-basicpill-declaration-input" value="private" name="vehicle_use" >
                </div>
            </div>
            <div class="col-lg-3 mt-4">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Commercial</label>
                    <input type="radio" class="form-check-input vehicle_use" id="progress-basicpill-declaration-input" value="commercial" name="vehicle_use">
                </div>
            </div>
        </div>
            ';
            }
        }
    } else if ($_POST['action'] == 'edit_complete_process_1') {
        $registration_id = escape_string($_POST['registration_id']);
        $vehicle_make = escape_string($_POST['vehicle_make']);
        $model_name = escape_string($_POST['model_name']);
        $chassis_number = escape_string($_POST['chassis_number']);
        $year_manufacture = escape_string($_POST['year_manufacture']);
        $height = escape_string($_POST['height']);
        $body_type = escape_string($_POST['body_type']);
        $color = escape_string($_POST['color']);
        $length = escape_string($_POST['length']);
        $width = escape_string($_POST['width']);
        $origin = escape_string($_POST['origin']);
        $axles = escape_string($_POST['axles']);
        $tyrs = escape_string($_POST['tyrs']);
        if ($vehicle_use == '') {
            $vehicle_use = escape_string($_POST['old_car_use']);
        } else {
            $vehicle_use = escape_string($_POST['vehicle_use']);
        }
        $insert_query = query("UPDATE  complete_registration set vehicle_make='{$vehicle_make}'
    ,model_name='{$model_name}',chassis_number='{$chassis_number}',year_manufacture='{$year_manufacture}',
    height='{$height}',body_type='{$body_type}',color='{$color}',
    length='{$length}',width='{$width}',origin='{$origin}',axles='{$axles}',tyrs='{$tyrs}',vehicle_use='{$vehicle_use}'
    where registration_id='{$registration_id}'");
        if (!$insert_query) {
            echo 'error';
            die(mysqli_error($con));
        } else {
            echo 'data stored';
        }
    } else if ($_POST['action'] == 'get_complete_process_2') {
        $registration_id = escape_string($_POST['id']);

        $get_data = query("SELECT * from complete_registration where registration_id='{$registration_id}'");

        if (!$get_data) {
            die(mysqli_error($con));
        } else {

            foreach ($get_data as $row) {
                echo '
            <input type="hidden" name="action" value="edit_complete_process_2">
            <input type="hidden" name="registration_id" class="registration_id" value="' . $row['registration_id'] . '">
    <div class="row">
    <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-namecard-input">vehicle weight</label>
                <input type="text" class="form-control vehicle_weight" id="progress-basicpill-namecard-input" name="vehicle_weight"  value="' . $row['vehicle_weight'] . '" required>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-namecard-input">Permissible Axle load</label>
                <input type="text" class="form-control vehicle_load" id="progress-basicpill-namecard-input" name="vehicle_load" value="' . $row['vehicle_load'] . '" required>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-namecard-input">Number of persons allowed</label>
                <input type="text" class="form-control no_persons" id="progress-basicpill-namecard-input" name="no_persons" value="' . $row['no_persons'] . '" required>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-cardno-input">Gross Weight</label>
                <input type="numbet" class="form-control gross_weight" id="progress-basicpill-cardno-input" name="gross_weight" value="' . $row['gross_weight'] . '" required>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-card-verification-input">Front</label>
                <input type="number" class="form-control no_front" id="progress-basicpill-card-verification-input" name="no_front" value="' . $row['no_front'] . '"  required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">Net Weight</label>
                <input type="number" class="form-control net_weight" id="progress-basicpill-expiration-input" name="net_weight" value="' . $row['net_weight'] . '" required>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">Middel</label>
                <input type="number" class="form-control no_middle" id="progress-basicpill-expiration-input" name="no_middle" value="' . $row['no_middle'] . '" required>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">Permissible loading capacity</label>
                <input type="number" class="form-control perm_load" id="progress-basicpill-expiration-input" name="perm_load"  value="' . $row['perm_load'] . '" required>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">Rear</label>
                <input type="number" class="form-control rear" id="progress-basicpill-expiration-input" name="rear"  value="' . $row['rear'] . '" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">Engine make</label>
                <input type="text" class="form-control engine_make" id="progress-basicpill-expiration-input" name="engine_make" value="' . $row['engine_make'] . '" required>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">Engine number</label>
                <input type="text" class="form-control engine_number" id="progress-basicpill-expiration-input" name="engine_number" value="' . $row['engine_number'] . '" required>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">Number of Cylinders</label>
                <input type="text" class="form-control engine_make" id="progress-basicpill-expiration-input" name="num_cylinders" value="' . $row['num_cylinders'] . '" required>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">Cubic Capacity</label>
                <input type="text" class="form-control cubic_capacity" id="progress-basicpill-expiration-input" name="cubic_capacity" value="' . $row['cubic_capacity'] . '" required>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">Horse power</label>
                <input type="text" class="form-control horse_power" id="progress-basicpill-expiration-input" name="horse_power" value="' . $row['horse_power'] . '" required>
            </div>
        </div>

    </div>



    <div class="row">
        <div class="col-lg-2 mt-4">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">Fuel type (Petrol)</label>
                <input type="hidden" name="old_type" value="' . $row['fuel_type'] . '">
                <input type="radio" class="form-check-input fuel_type" id="progress-basicpill-expiration-input" value="Petrol" name="fuel_type" >
            </div>
        </div>

        <div class="col-lg-2 mt-4">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">Diesel</label>
                <input type="radio" class="form-check-input fuel_type" id="progress-basicpill-expiration-input" value="diesel" name="fuel_type">
            </div>
        </div>

        <div class="col-lg-2 mt-4">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">LPG</label>
                <input type="radio" class="form-check-input lpg" id="progress-basicpill-expiration-input" value="lpg" name="fuel_type">
            </div>
        </div>

        <div class="col-lg-2 mt-4">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">Electric</label>
                <input type="radio" class="form-check-input fuel_type" id="progress-basicpill-expiration-input" value="electric" name="fuel_type">
            </div>
        </div>

        <div class="col-lg-2 mt-4">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">Petrol/Electric Hybrid</label>

                <input type="radio" class="form-check-input fuel_type" id="progress-basicpill-expiration-input" value="Petrol/Electric Hybrid" name="fuel_type">
            </div>
        </div>

        <div class="col-lg-2 mt-4">
            <div class="mb-3">
                <label class="form-label" for="progress-basicpill-expiration-input">Diesel/Electric Hybrid</label>
                
                <input type="radio" class="form-check-input fuel_type" id="progress-basicpill-expiration-input" value="Diesel/Electric Hybrid" name="fuel_type">
            </div>
        </div>

    </div>';
            }
        }
    } else if ($_POST['action'] == 'edit_complete_process_2') {
        $vehicle_load = escape_string($_POST['vehicle_load']);
        $no_persons = escape_string($_POST['no_persons']);
        $gross_weight = escape_string($_POST['gross_weight']);
        $no_front = escape_string($_POST['no_front']);
        $net_weight = escape_string($_POST['net_weight']);

        $registration_id = escape_string($_POST['registration_id']);

        $no_middle = escape_string($_POST['no_middle']);
        $perm_load = escape_string($_POST['perm_load']);
        $rear = escape_string($_POST['rear']);
        $engine_make = escape_string($_POST['engine_make']);
        $engine_number = escape_string($_POST['engine_number']);
        $cubic_capacity = escape_string($_POST['cubic_capacity']);
        $horse_power = escape_string($_POST['horse_power']);
        $num_cylinders = escape_string($_POST['num_cylinders']);
        $vehicle_weight = escape_string($_POST['vehicle_weight']);

        if ($fuel_type == '') {
            $fuel_type = escape_string($_POST['old_type']);
        } else {
            $fuel_type = escape_string($_POST['fuel_type']);
        }
        $update_query = query("UPDATE  complete_registration set vehicle_load='{$vehicle_load}',no_persons='{$no_persons}',
        gross_weight='{$gross_weight}',no_front='{$no_front}',net_weight='{$net_weight}',no_middle='{$no_middle}',perm_load='{$perm_load}',rear='{$rear}',
        engine_make='{$engine_make}',horse_power='{$horse_power}',engine_number='{$engine_number}',
        cubic_capacity='{$cubic_capacity}',num_cylinders='{$num_cylinders}',vehicle_weight='{$vehicle_weight}',
        fuel_type='{$fuel_type}' where registration_id='{$registration_id}'");
        if (!$update_query) {
            die(mysqli_error($con));
        } else {
            echo "data stored";
        }
    } else {
        $id = escape_string($_POST['id']);
        $query = query("SELECT * from new_registration left join previouse_owner
   on previouse_owner.registration_id=new_registration.registration_id
   where new_registration.registration_id='{$id}'
   ");

        if (!$query) {
            die(mysqli_error($con));
        } else {
            foreach ($query as $row) {
                if ($_POST['decide_registration'] == 'brand_new') {
                    echo '
            <hr>
         
            <div class="brand new mt-3">
                <div class="row g-1">
         
                    <div class="col-lg-10">
                        <div class="row g-3">
                            <input type="hidden" class="reg_id" name="registration_id" value=' . $row['registration_id'] . '>
                            <input type="hidden" value="' . $row['new_owner_file'] . '" name="old_file">
                            <input type="hidden" value="update_client" name="action">
                            
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input type="text" value=' . $row['new_owner_name'] . ' class="form-control" id="floatingInput" placeholder="new owner" name="new_owner_name" required>
                                    <label for="floatingInput">Full name of new owner</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value=' . $row['new_owner_address'] . ' type="text" class="form-control" id="floatingInput" placeholder="" name="new_owner_address" required>
                                    <label for="floatingInput">Postal Address</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value=' . $row['new_owner_location'] . ' type="text" class="form-control" id="floatingInput" name="new_owner_location" placeholder="" required>
                                    <label for="floatingInput">Residential/ location address</label>
                                </div>
                            </div>
         
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value=' . $row['new_owner_number'] . ' type="number" class="form-control" id="floatingInput" name="new_owner_number" placeholder="" required minlength="10" maxlength="12">
                                    <label for="floatingInput">Telephone number</label>
                                </div>
                            </div>
         
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value=' . $row['new_owner_tin'] . ' type="text" class="form-control" id="floatingInput" name="new_owner_tin" placeholder="" required>
                                    <label for="floatingInput">Tin number</label>
                                </div>
                            </div>
         
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value=' . $row['new_owner_work'] . ' type="text" class="form-control" id="floatingInput" name="new_owner_work" placeholder="" required>
                                    <label for="floatingInput">Occupation</label>
                                </div>
                            </div>
         
                            <div class="col-lg-12">
                                <div class="form-floating mb-2">
                                    <input value=' . $row['new_owner_email_address'] . ' type="email" class="form-control" id="floatingInput" name="new_owner_email_address" placeholder="" required>
                                    <label for="floatingInput">Email address</label>
                                </div>
                            </div>
                        </div>
         
                    </div>
                    <div class="col-lg-2">
                        <div class="pre_owner_img" style="  height: 10rem;width:100%; position: relative; border: 1px solid green;">
                            <img class="img img-fluid new_owner_image" src=' . $row['new_owner_file'] . ' style="height:100%;width:100%; position:absolute;">
                        </div>
                        <p class="text-uppercase font-size-11">New owner</p>
                        <div class="owner_image">
                            <input type="file" class="form-control new_owner_file" id="floatingInput" placeholder="name@example.com" name="new_owner_file">
                            <label for="floatingInput">Upload image</label>
                        </div>
         
                    </div>
         
         
                </div>
            </div>
            <!-- end of ghana used vehicle -->
            ';
                } else {
                    echo '
            <div class="ghana_used mt-3">
            <div class="row g-1">
                <div class="col-lg-2">
                <input type="hidden" value=' . $row['pre_owner_file'] . ' name="pre_old_file">
                <input type="hidden" class="reg_id" name="registration_id" value=' . $row['registration_id'] . '>
                <input type="hidden" value="update_client" name="action">
                    <div class="pre_owner_img" style="height:10rem;width:100%; position: relative; border: 1px solid green;">
                    <img class="img img-fluid pre_owner_image" src=' . $row['pre_owner_file'] . ' style="height:100%;width:100%; position:absolute;">
                    </div>
                    <p class="text-uppercase font-size-11">Previous owner</p>
                    <div class="owner_image">
                        <input type="file" class="form-control pre_owner_file" id="floatingInput" placeholder="name@example.com" name="pre_owner_file">
                        <label for="floatingInput">Upload image</label>
                    </div>
                    <input type="hidden" name="pre_owner_sig_file_old" value=' . $row['pre_owner_sig_file'] . '>
                    <img class="img img-fluid pre_owner_sig" src=' . $row['pre_owner_sig_file'] . ' style="height:5rem">
         
                </div>
                <div class="col-lg-10">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input value=' . $row['pre_owner_name'] . ' type="text" class="form-control" id="floatingInput" placeholder="new owner" name="pre_owner_name" required>
                                <label for="floatingInput">Full name of Previous owner</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input  value=' . $row['pre_owner_address'] . ' type="text" class="form-control" id="floatingInput"  placeholder=""name="pre_owner_address" required>
                                <label for="floatingInput">Previous Owner  Postal Address</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input value=' . $row['pre_owner_location'] . ' type="text" class="form-control" id="floatingInput" name="pre_owner_location" placeholder="" required>
                                <label for="floatingInput">Previous Owner Residential/ location address</label>
                            </div>
                        </div>
         
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input value=' . $row['pre_owner_number'] . ' type="number" class="form-control" id="floatingInput" name="pre_owner_number" placeholder="" required minlength="10" maxlength="12">
                                <label for="floatingInput">Previous Owner  Telephone number</label>
                            </div>
                        </div>
         
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input value=' . $row['pre_owner_tin'] . ' type="text" class="form-control" id="floatingInput" name="pre_owner_tin" placeholder="" required>
                                <label for="floatingInput">Previous Owner  Tin number</label>
                            </div>
                        </div>
         
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input value=' . $row['pre_owner_work'] . ' type="text" class="form-control" id="floatingInput" name="pre_owner_work" placeholder="" required>
                                <label for="floatingInput">Previous Owner  Occupation</label>
                            </div>
                        </div>
         
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input type="file" class="form-control pre_owner_sig" id="floatingInput" name="pre_owner_sig" placeholder="">
                                <label for="floatingInput">Previous Owner signature</label>
                            </div>
                        </div>
         
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input value=' . $row['pre_owner_email_address'] . ' type="email" class="form-control" id="floatingInput" name="pre_owner_email_address" placeholder=""required>
                                <label for="floatingInput">Previous Owner Email Address</label>
                            </div>
                        </div>
                    </div>
         
                </div>
         
              
         
            </div>
         
            </div>
         </div>
            <hr>
            <div class="brand new mt-3">
                <div class="row g-1">
         
                    <div class="col-lg-10">
                        <div class="row g-3">
                        <input type="hidden" value="' . $row['new_owner_file'] . '" name="old_file">
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input type="text" value=' . $row['new_owner_name'] . ' class="form-control" id="floatingInput" placeholder="new owner" name="new_owner_name" required>
                                    <label for="floatingInput">Full name of new owner</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value=' . $row['new_owner_address'] . ' type="text" class="form-control" id="floatingInput" placeholder="" name="new_owner_address" required>
                                    <label for="floatingInput">Postal Address</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value=' . $row['new_owner_location'] . ' type="text" class="form-control" id="floatingInput" name="new_owner_location" placeholder="" required>
                                    <label for="floatingInput">Residential/ location address</label>
                                </div>
                            </div>
         
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value=' . $row['new_owner_number'] . ' type="number" class="form-control" id="floatingInput" name="new_owner_number" placeholder="" required minlength="10" maxlength="12">
                                    <label for="floatingInput">Telephone number</label>
                                </div>
                            </div>
         
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value=' . $row['new_owner_tin'] . ' type="text" class="form-control" id="floatingInput" name="new_owner_tin" placeholder="" required>
                                    <label for="floatingInput">Tin number</label>
                                </div>
                            </div>
         
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value=' . $row['new_owner_work'] . ' type="text" class="form-control" id="floatingInput" name="new_owner_work" placeholder="" required>
                                    <label for="floatingInput">Occupation</label>
                                </div>
                            </div>
         
                            <div class="col-lg-12">
                                <div class="form-floating mb-2">
                                    <input value=' . $row['new_owner_email_address'] . ' type="email" class="form-control" id="floatingInput" name="new_owner_email_address" placeholder="" required>
                                    <label for="floatingInput">Email address</label>
                                </div>
                            </div>
                        </div>
         
                    </div>
                    <div class="col-lg-2">
                        <div class="pre_owner_img" style="  height: 10rem;width:100%; position: relative; border: 1px solid green;">
                            <img class="img img-fluid new_owner_image" src=' . $row['new_owner_file'] . ' style="height:100%;width:100%; position:absolute;">
                        </div>
                        <p class="text-uppercase font-size-11">New owner</p>
                        <div class="owner_image">
                            <input type="file" class="form-control new_owner_file" id="floatingInput" placeholder="name@example.com" name="new_owner_file">
                            <label for="floatingInput">Upload image</label>
                        </div>
         
                    </div>
         
         
                </div>
            </div>
            <!-- end of ghana used vehicle -->         
            ';
                }
            }
        }
    }
} else {

    $post_search = isset($_POST["search"]["value"]) ? escape_string($_POST["search"]["value"]) : '';

    $columns = array('new_registration.date_created');
    $userType = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : '';

    if ($userType == 'client') {
        $query = "SELECT new_registration.decide_registration, new_registration.new_owner_email_address, new_registration.registration_id, new_registration.new_owner_number, new_registration.status, new_registration.date_created, new_registration.new_owner_name
                  FROM new_registration
                  LEFT JOIN previouse_owner ON previouse_owner.registration_id = new_registration.registration_id
                  LEFT JOIN users ON users.user_id = new_registration.user_id
                  WHERE new_registration.user_id = '{$_SESSION['user_id']}'";
    } else {
        $query = "SELECT new_registration.decide_registration, new_registration.new_owner_email_address, new_registration.registration_id, new_registration.new_owner_number, new_registration.status, new_registration.date_created, new_registration.new_owner_name
                  FROM new_registration
                  LEFT JOIN previouse_owner ON previouse_owner.registration_id = new_registration.registration_id
                  LEFT JOIN users ON users.user_id = new_registration.user_id";
    }

    if (!empty($post_search)) {
        if ($userType == 'client') {
            $query .= " AND (new_registration.new_owner_number LIKE '%$post_search%' OR new_registration.new_owner_email_address LIKE '%$post_search%' OR new_registration.registration_id LIKE '%$post_search%' OR new_registration.status LIKE '%$post_search%')";
        } else {
            $query .= " WHERE (new_registration.new_owner_number LIKE '%$post_search%' OR new_registration.new_owner_email_address LIKE '%$post_search%' OR new_registration.registration_id LIKE '%$post_search%' OR new_registration.status LIKE '%$post_search%')";
        }
    }

    if (isset($_POST["order"])) {
        $query .= " ORDER BY " . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'];
    } else {
        $query .= ' ORDER BY new_registration.date_created DESC';
    }

    $query1 = '';

    if ($_POST["length"] != -1) {
        $query1 = ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    $number_filter_row = mysqli_num_rows(mysqli_query($con, $query));

    $result = mysqli_query($con, $query . $query1);

    if (!$result) {
        echo "no data to show";
    } else {
        $data = array();
        $count = 1;
        while ($row = mysqli_fetch_array($result)) {
            $registration_id = $row['registration_id'];

            $status = ($row['status'] != 'complete') ? '<div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-danger align-middle me-2"></i>Process Pending</div>' : '<div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Process Complete</div>';

            if ($userType == 'client' && $row['status'] != 'complete') {
                $button = '<button new_owner_number="' . $new_owner_number . '" new_owner_name="' . $row['new_owner_name'] . '" class="btn btn-sm btn-info edit text-light" id="' . $registration_id . '" decide_registration="' . $row['decide_registration'] . '">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-sm btn-danger delete" id="' . $registration_id . '">
                            <i class="fas fa-trash"></i>
                        </button>
                        ';
            }
            // else {
            //     $button = '</button>
            //                 <button class="btn btn-sm btn-danger" id="' . $registration_id . '">
            //                     <i class="fas fa-lock"></i>
            //                 </button>';
            // }

            else if ($userType == 'staff' && $row['status'] != 'complete') {
                $button = '<button new_owner_number="' . $new_owner_number . '" new_owner_name="' . $row['new_owner_name'] . '" class="btn btn-sm btn-info edit text-light" id="' . $registration_id . '" decide_registration="' . $row['decide_registration'] . '">
            <i class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-sm btn-danger delete" id="' . $registration_id . '">
            <i class="fas fa-trash"></i>
            </button>
            <a href="./complete-registration.php?registration_id=' . $registration_id . '&re_type=' . $row['decide_registration'] . '" class="btn btn-sm btn-primary" id="' . $registration_id . '">
            <i class="fas fa-save fa-sm"></i>
            </a>';
            } else {
                $button = '</button>
                <button class="btn btn-sm btn-danger" id="' . $registration_id . '">
                    <i class="fas fa-lock"></i>
                </button>';
            }

            $sub_array = array();
            $sub_array[] = $count++;
            $sub_array[] = $row["registration_id"];
            $sub_array[] = $row["new_owner_name"];
            $sub_array[] = $row['new_owner_number'];
            $sub_array[] = $status;
            $sub_array[] = $row['date_created'];
            $sub_array[] = $button;
            $data[] = $sub_array;
        }

        function get_all_data($con)
        {
            global $userType;

            if ($userType == 'client') {
                $query = "SELECT new_registration.new_owner_email_address, new_registration.registration_id, new_registration.status, new_registration.date_created, new_registration.new_owner_name
                          FROM new_registration
                          LEFT JOIN previouse_owner ON previouse_owner.registration_id = new_registration.registration_id
                          LEFT JOIN users ON users.user_id = new_registration.user_id
                          WHERE users.user_id = '{$_SESSION['user_id']}'";
            } else {
                $query = "SELECT new_registration.new_owner_email_address, new_registration.registration_id, new_registration.status, new_registration.date_created, new_registration.new_owner_name
                          FROM new_registration
                          LEFT JOIN previouse_owner ON previouse_owner.registration_id = new_registration.registration_id
                          LEFT JOIN users ON users.user_id = new_registration.user_id";
            }

            $result = mysqli_query($con, $query);
            return mysqli_num_rows($result);
        }

        $output = array(
            "draw"            => intval($_POST["draw"]),
            "recordsTotal"    => get_all_data($con),
            "recordsFiltered" => $number_filter_row,
            "data"            => $data
        );

        echo json_encode($output);
    }
}
