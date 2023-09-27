<?php

include ("./config.php");

// new owner fields

if(isset($_POST['reg_id'])){
    $new_owner_work=escape_string($_POST['new_owner_work']);
    $new_owner_address=escape_string($_POST['new_owner_address']);
    $new_owner_name=escape_string($_POST['new_owner_name']);
    $new_owner_email_address=escape_string($_POST['new_owner_email_address']);
    $new_owner_number=escape_string($_POST['new_owner_number']);
    $new_owner_location=escape_string($_POST['new_owner_location']);
    $new_owner_tin=escape_string($_POST['new_owner_tin']);
    $decide_registration=escape_string($_POST['decide_registration']);
    $regi_id=escape_string($_POST['reg_id']);

$file_dir='assets/images/client_image/';
$target_file=$file_dir.$_FILES['new_owner_file']['name'];
$tep_file=$_FILES['new_owner_file']['tmp_name'];
$file_size=$_FILES['new_owner_file']['size']/1000;
$image_size=getimagesize($tep_file);
   // prepare sql and bind parameters
   $file_extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   $new_file = time() . '.' . $file_extension;
   $new_target_file = $file_dir . $new_file;

   if(in_array($file_extension,['jpg','jpeg','png'])){
    if($file_size>250){
      exit("<script>Swal.fire({
        title: 'Error',
        icon: 'error',
        text: 'file size {$file_size} kb is too big you need 250kb',
        })</script>"); 
    }
   }

    // preowner feilds
    $pre_owner_name=escape_string($_POST['pre_owner_name']);
    $pre_owner_address=escape_string($_POST['pre_owner_address']);
    $pre_owner_location=escape_string($_POST['pre_owner_location']);
    $pre_owner_number=escape_string($_POST['pre_owner_number']);
    $pre_owner_tin=escape_string($_POST['pre_owner_tin']);
    $pre_owner_work=escape_string($_POST['pre_owner_work']);
    $pre_owner_email_address=escape_string($_POST['pre_owner_email_address']);



    $insert_query=query("INSERT into new_registration (new_owner_work,new_owner_address,new_owner_name,new_owner_email_address,new_owner_number,
    decide_registration,new_owner_location,registration_id,new_owner_tin,user_id,new_owner_file)
     values ('{$new_owner_work}','{$new_owner_address}','{$new_owner_name}','{$new_owner_email_address}','{$new_owner_number}',
     '{$decide_registration}','{$new_owner_location}','{$regi_id}','{$new_owner_tin}','{$_SESSION['user_id']}','{$new_target_file}')");
    
     if(!$insert_query){
        die(mysqli_error($con));
     }
     else{
         $pre_file_dir='assets/images/client_image/';
         $pre_target_file=$file_dir.$_FILES['pre_owner_file']['name'];
         $pre_tep_file=$_FILES['pre_owner_file']['tmp_name'];
         $pre_file_size=$_FILES['pre_owner_file']['size']/1000;
         $image_size=getimagesize($pre_tep_file);
         // prepare sql and bind parameters
         $pre_file_extension=strtolower(pathinfo($pre_target_file,PATHINFO_EXTENSION));
         $pre_new_file = time() . '.' . $pre_file_extension;
         $pre_new_target_file = $pre_file_dir . $pre_new_file;

         if(in_array($file_extension,['jpg','jpeg','png'])){
         if($pre_file_size>250){
         exit("<script>Swal.fire({
         title: 'Error',
         icon: 'error',
         text: 'file size {$pre_file_size} kb is too big you need 250kb',
         })</script>"); 
         }
         }
        $insert_query2=query("INSERT into previouse_owner (pre_owner_name,pre_owner_address,pre_owner_email_address,pre_owner_number,pre_owner_location,registration_id,pre_owner_tin,pre_owner_work,pre_owner_file)
         values ('{$pre_owner_name}','{$pre_owner_address}','{$pre_owner_email_address}',
         '{$pre_owner_number}','{$pre_owner_location}','{$regi_id}','{$pre_owner_tin}','{$pre_owner_work}','{$pre_new_target_file}')");
    
        // $insert_query2=query("INSERT into previouse_owner (pre_owner_name,pre_owner_address,pre_owner_email_address,pre_owner_number,pre_owner_location)
        // values ('{$pre_owner_name}','{$pre_owner_address}','{$pre_owner_email_address}','{$$pre_owner_number}','{$pre_owner_location}')");
    
    
         if(!$insert_query2){
            die(mysqli_error($con));
         }
         else{
            move_uploaded_file($tep_file,'../'.$new_target_file);
            move_uploaded_file($pre_tep_file,'../'.$pre_new_target_file);
            echo'data stored';
         }
     }
    
    
}
if(isset($_POST['action'])){
   if($_POST['action']=='update_client'){
  
   $new_owner_work=escape_string($_POST['new_owner_work']);
   $new_owner_address=escape_string($_POST['new_owner_address']);
   $new_owner_name=escape_string($_POST['new_owner_name']);
   $new_owner_email_address=escape_string($_POST['new_owner_email_address']);
   $new_owner_number=escape_string($_POST['new_owner_number']);
   $new_owner_location=escape_string($_POST['new_owner_location']);
   $new_owner_tin=escape_string($_POST['new_owner_tin']);
   $decide_registration=escape_string($_POST['decide_registration']);
   $regi_id=escape_string($_POST['registration_id']);
  
  $file_dir='assets/images/client_image/';
  $target_file=$file_dir.$_FILES['new_owner_file']['name'];
  $tep_file=$_FILES['new_owner_file']['tmp_name'];
  $file_size=$_FILES['new_owner_file']['size']/1000;

//   $image_size=getimagesize($tep_file);
     // prepare sql and bind parameters
     $file_extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     $new_file = time() . '.' . $file_extension;
     
     if(in_array($file_extension,['jpg','jpeg','png'])){
      if($file_size>250){
        exit("<script>Swal.fire({
          title: 'Error',
          icon: 'error',
          text: 'file size {$file_size} kb is too big you need 250kb',
          })</script>"); 
      }
     }

  if($file_size==0){
   $new_target_file=escape_string($_POST['old_file']);
  }
  else{
   $new_target_file = $file_dir . $new_file;
  }

   $insert_query=query("UPDATE new_registration set new_owner_work='{$new_owner_work}',new_owner_address='{$new_owner_address}',
   new_owner_name='{$new_owner_name}',new_owner_email_address='{$new_owner_email_address}',new_owner_number='{$new_owner_number}',
   new_owner_location='{$new_owner_location}',new_owner_tin='{$new_owner_tin}',new_owner_file='{$new_target_file}' where registration_id='{$regi_id}'
   ");
   if(!$insert_query){
      die(mysqli_error($con));
   }
   else{
   if($file_size!=0){
   if(move_uploaded_file($tep_file,'../'.$new_target_file)){
   }
   else{
      echo 'file error';
   }

   }
   // preowner feilds
$pre_owner_name=escape_string($_POST['pre_owner_name']);
$pre_owner_address=escape_string($_POST['pre_owner_address']);
$pre_owner_location=escape_string($_POST['pre_owner_location']);
$pre_owner_number=escape_string($_POST['pre_owner_number']);
$pre_owner_tin=escape_string($_POST['pre_owner_tin']);
$pre_owner_work=escape_string($_POST['pre_owner_work']);
$pre_owner_email_address=escape_string($_POST['pre_owner_email_address']);

$pre_file_dir='assets/images/client_image/';
$pre_target_file=$pre_file_dir.$_FILES['pre_owner_file']['name'];
$pre_tep_file=$_FILES['pre_owner_file']['tmp_name'];
$pre_file_size=$_FILES['pre_owner_file']['size']/1000;
// $image_size=getimagesize($pre_tep_file);
// prepare sql and bind parameters
$pre_file_extension=strtolower(pathinfo($pre_target_file,PATHINFO_EXTENSION));
$pre_new_file = time() . '.' . $pre_file_extension;


if(in_array($pre_file_extension,['jpg','jpeg','png'])){
if($pre_file_size>250){
exit("<script>Swal.fire({
title: 'Error',
icon: 'error',
text: 'file size {$pre_file_size} kb is too big you need 250kb',
})</script>"); 
}
}
if($pre_file_size==0){
 $pre_new_target_file = escape_string($_POST['pre_old_file']);
}
else{
 $pre_new_target_file = $pre_file_dir . $pre_new_file;
}

$pre_query=query("UPDATE previouse_owner set pre_owner_work='{$pre_owner_work}',pre_owner_address='{$pre_owner_address}',
pre_owner_name='{$pre_owner_name}',pre_owner_email_address='{$pre_owner_email_address}',pre_owner_number='{$pre_owner_number}',
pre_owner_location='{$pre_owner_location}',pre_owner_tin='{$pre_owner_tin}',pre_owner_file='{$pre_new_target_file}' where registration_id='{$regi_id}'
");


if(!$pre_query){
 die(mysqli_error($con));
}
else{
 if($pre_file_size!=0){
    if(move_uploaded_file($pre_tep_file,'../'.$pre_new_target_file)){
       echo 'data stored';
       unlink('../'.$_POST['pre_old_file']);
     
    }
    else{
       echo 'file error';
    }
 
    }
    else{
       echo 'data stored';
    }
 }

   }
   }

   else if ($_POST['action']=='complete_process_1'){
    $registration_id=escape_string($_POST['registration_id']);
    $vehicle_make=escape_string($_POST['vehicle_make']);
    $model_name=escape_string($_POST['model_name']);
    $chassis_number=escape_string($_POST['chassis_number']);
    $year_manufacture=escape_string($_POST['year_manufacture']);
    $height=escape_string($_POST['height']);
    $body_type=escape_string($_POST['body_type']);
    $color=escape_string($_POST['color']);
    $length=escape_string($_POST['length']);
    $width=escape_string($_POST['width']);
    $origin=escape_string($_POST['origin']);
    $axles=escape_string($_POST['axles']);
    $tyrs=escape_string($_POST['tyrs']);
    $vehicle_use=escape_string($_POST['vehicle_use']);

    $check_query=query("SELECT * from complete_registration where registration_id='{$registration_id}'");

    if(mysqli_num_rows($check_query)>0){

        $insert_query=query("UPDATE  complete_registration set vehicle_make='{$vehicle_make}'
        ,model_name='{$model_name}',chassis_number='{$chassis_number}',year_manufacture='{$year_manufacture}',
        height='{$height}',body_type='{$body_type}',color='{$color}',user_id= '{$_SESSION['user_id']}',
        length='{$length}',width='{$width}',origin='{$origin}',axles='{$axles}',tyrs='{$tyrs}',vehicle_use='{$vehicle_use}'
        where registration_id='{$registration_id}'");        
        if(!$insert_query){
            echo 'error';
            die(mysqli_error($con));
        }
        else{
            echo 'data stored';
        }
    }
    else{
$insert_query=query("INSERT into complete_registration (registration_id,vehicle_make,model_name,chassis_number,year_manufacture,
height,body_type,color,user_id,length,width,origin,axles,tyrs,vehicle_use)
values ('{$registration_id}','{$vehicle_make}','{$model_name}','{$chassis_number}','{$year_manufacture}',
'{$height}','{$body_type}','{$color}','{$_SESSION['user_id']}','{$length}','{$width}',
'{$origin}','{$axles}','{$tyrs}','{$vehicle_use}')");

if(!$insert_query){
    echo 'error';
    die(mysqli_error($con));
}
else{
    echo 'data stored';
}
    }
   }

   else if ($_POST['action']=='complete_process_2'){
    $vehicle_load=escape_string($_POST['vehicle_load']);
    $no_persons=escape_string($_POST['no_persons']);
    $gross_weight=escape_string($_POST['gross_weight']);
    $no_front=escape_string($_POST['no_front']);
    $net_weight=escape_string($_POST['net_weight']);

    $registration_id=escape_string($_POST['registration_id']);

    $no_middle=escape_string($_POST['no_middle']);
    $perm_load=escape_string($_POST['perm_load']);
    $rear=escape_string($_POST['rear']);
    $engine_make=escape_string($_POST['engine_make']);
    $engine_number=escape_string($_POST['engine_number']);
    $cubic_capacity=escape_string($_POST['cubic_capacity']);
    $horse_power=escape_string($_POST['horse_power']);
    $num_cylinders=escape_string($_POST['num_cylinders']);
    $vehicle_weight=escape_string($_POST['vehicle_weight']);
    $fuel_type=escape_string($_POST['fuel_type']);


    $check_query=query("SELECT * from complete_registration where registration_id='{$registration_id}'");

    if(mysqli_num_rows($check_query)>0){
        $update_query=query("UPDATE  complete_registration set vehicle_load='{$vehicle_load}',no_persons='{$no_persons}',
        gross_weight='{$gross_weight}',no_front='{$no_front}',net_weight='{$net_weight}',no_middle='{$no_middle}',perm_load='{$perm_load}',rear='{$rear}',
        engine_make='{$engine_make}',horse_power='{$horse_power}',engine_number='{$engine_number}',
        cubic_capacity='{$cubic_capacity}',num_cylinders='{$num_cylinders}',vehicle_weight='{$vehicle_weight}',
        fuel_type='{$fuel_type}' where registration_id='{$registration_id}'");
    
        if(!$update_query){
            die(mysqli_error($con));
        }
        else{
            $complete_process=query("UPDATE new_registration set status='complete' where registration_id='{$registration_id}'");
            echo"data stored";
        }
    }
    else{
        if(query("INSERT into complete_registration (registration_id) values('{$registration_id}')")){
            $update_query=query("UPDATE  complete_registration set vehicle_load='{$vehicle_load}',no_persons='{$no_persons}',
            gross_weight='{$gross_weight}',no_front='{$no_front}',net_weight='{$net_weight}',no_middle='{$no_middle}',perm_load='{$perm_load}',rear='{$rear}',
            engine_make='{$engine_make}',horse_power='{$horse_power}',engine_number='{$engine_number}',
            cubic_capacity='{$cubic_capacity}',num_cylinders='{$num_cylinders}',vehicle_weight='{$vehicle_weight}',
            fuel_type='{$fuel_type}' where registration_id='{$registration_id}'");
        
            if(!$update_query){
                die(mysqli_error($con));
            }
            else{
                $complete_process=query("UPDATE new_registration set status='complete' where registration_id='{$registration_id}'");
                echo"data stored";
            }
        }
        else{
            echo 'error';
        }
    }



   }


   else{
   $id=escape_string($_POST['id']);
   $query=query("SELECT * from new_registration left join previouse_owner
   on previouse_owner.registration_id=new_registration.registration_id
   where new_registration.registration_id='{$id}'
   ");

   if(!$query){
      die(mysqli_error($con));
   }
   else{
      foreach($query as $row){
         if($_POST['decide_registration']=='brand_new'){
            echo '
            <hr>
         
            <div class="brand new mt-3">
                <div class="row g-1">
         
                    <div class="col-lg-10">
                        <div class="row g-3">
                            <input type="hidden" class="reg_id" name="registration_id" value='.$row['registration_id'].'>
                            <input type="hidden" value="'.$row['new_owner_file'].'" name="old_file">
                            <input type="hidden" value="update_client" name="action">
                            
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input type="text" value='.$row['new_owner_name'].' class="form-control" id="floatingInput" placeholder="new owner" name="new_owner_name" required>
                                    <label for="floatingInput">Full name of new owner</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value='.$row['new_owner_address'].' type="text" class="form-control" id="floatingInput" placeholder="" name="new_owner_address" required>
                                    <label for="floatingInput">Postal Address</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value='.$row['new_owner_location'].' type="text" class="form-control" id="floatingInput" name="new_owner_location" placeholder="" required>
                                    <label for="floatingInput">Residential/ location address</label>
                                </div>
                            </div>
         
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value='.$row['new_owner_number'].' type="number" class="form-control" id="floatingInput" name="new_owner_number" placeholder="" required minlength="10" maxlength="12">
                                    <label for="floatingInput">Telephone number</label>
                                </div>
                            </div>
         
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value='.$row['new_owner_tin'].' type="text" class="form-control" id="floatingInput" name="new_owner_tin" placeholder="" required>
                                    <label for="floatingInput">Tin number</label>
                                </div>
                            </div>
         
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value='.$row['new_owner_work'].' type="text" class="form-control" id="floatingInput" name="new_owner_work" placeholder="" required>
                                    <label for="floatingInput">Occupation</label>
                                </div>
                            </div>
         
                            <div class="col-lg-12">
                                <div class="form-floating mb-2">
                                    <input value='.$row['new_owner_email_address'].' type="email" class="form-control" id="floatingInput" name="new_owner_email_address" placeholder="" required>
                                    <label for="floatingInput">Email address</label>
                                </div>
                            </div>
                        </div>
         
                    </div>
                    <div class="col-lg-2">
                        <div class="pre_owner_img" style="  height: 10rem;width:100%; position: relative; border: 1px solid green;">
                            <img class="img img-fluid new_owner_image" src='.$row['new_owner_file'].' style="height:100%;width:100%; position:absolute;">
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
         else{
            echo '
            <div class="ghana_used mt-3">
            <div class="row g-1">
                <div class="col-lg-2">
                <input type="hidden" value='.$row['pre_owner_file'].' name="pre_old_file">
                <input type="hidden" class="reg_id" name="registration_id" value='.$row['registration_id'].'>
                <input type="hidden" value="update_client" name="action">
                    <div class="pre_owner_img" style="height:10rem;width:100%; position: relative; border: 1px solid green;">
                    <img class="img img-fluid pre_owner_image" src='.$row['pre_owner_file'].' style="height:100%;width:100%; position:absolute;">
                    </div>
                    <p class="text-uppercase font-size-11">Previous owner</p>
                    <div class="owner_image">
                        <input type="file" class="form-control pre_owner_file" id="floatingInput" placeholder="name@example.com" name="pre_owner_file">
                        <label for="floatingInput">Upload image</label>
                    </div>
         
                </div>
                <div class="col-lg-10">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input value='.$row['pre_owner_name'].' type="text" class="form-control" id="floatingInput" placeholder="new owner" name="pre_owner_name" required>
                                <label for="floatingInput">Full name of Previous owner</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input  value='.$row['pre_owner_address'].' type="text" class="form-control" id="floatingInput"  placeholder=""name="pre_owner_address" required>
                                <label for="floatingInput">Previous Owner  Postal Address</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input value='.$row['pre_owner_location'].' type="text" class="form-control" id="floatingInput" name="pre_owner_location" placeholder="" required>
                                <label for="floatingInput">Previous Owner Residential/ location address</label>
                            </div>
                        </div>
         
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input value='.$row['pre_owner_number'].' type="number" class="form-control" id="floatingInput" name="pre_owner_number" placeholder="" required minlength="10" maxlength="12">
                                <label for="floatingInput">Previous Owner  Telephone number</label>
                            </div>
                        </div>
         
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input value='.$row['pre_owner_tin'].' type="text" class="form-control" id="floatingInput" name="pre_owner_tin" placeholder="" required>
                                <label for="floatingInput">Previous Owner  Tin number</label>
                            </div>
                        </div>
         
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input value='.$row['pre_owner_work'].' type="text" class="form-control" id="floatingInput" name="pre_owner_work" placeholder="" required>
                                <label for="floatingInput">Previous Owner  Occupation</label>
                            </div>
                        </div>
         
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input type="file" class="form-control" id="floatingInput" name="pre_owner_sig" placeholder="">
                                <label for="floatingInput">Previous Owner signature</label>
                            </div>
                        </div>
         
                        <div class="col-lg-6">
                            <div class="form-floating mb-2">
                                <input value='.$row['pre_owner_email_address'].' type="email" class="form-control" id="floatingInput" name="pre_owner_email_address" placeholder=""required>
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
                        <input type="hidden" value="'.$row['new_owner_file'].'" name="old_file">
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input type="text" value='.$row['new_owner_name'].' class="form-control" id="floatingInput" placeholder="new owner" name="new_owner_name" required>
                                    <label for="floatingInput">Full name of new owner</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value='.$row['new_owner_address'].' type="text" class="form-control" id="floatingInput" placeholder="" name="new_owner_address" required>
                                    <label for="floatingInput">Postal Address</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value='.$row['new_owner_location'].' type="text" class="form-control" id="floatingInput" name="new_owner_location" placeholder="" required>
                                    <label for="floatingInput">Residential/ location address</label>
                                </div>
                            </div>
         
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value='.$row['new_owner_number'].' type="number" class="form-control" id="floatingInput" name="new_owner_number" placeholder="" required minlength="10" maxlength="12">
                                    <label for="floatingInput">Telephone number</label>
                                </div>
                            </div>
         
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value='.$row['new_owner_tin'].' type="text" class="form-control" id="floatingInput" name="new_owner_tin" placeholder="" required>
                                    <label for="floatingInput">Tin number</label>
                                </div>
                            </div>
         
                            <div class="col-lg-6">
                                <div class="form-floating mb-2">
                                    <input value='.$row['new_owner_work'].' type="text" class="form-control" id="floatingInput" name="new_owner_work" placeholder="" required>
                                    <label for="floatingInput">Occupation</label>
                                </div>
                            </div>
         
                            <div class="col-lg-12">
                                <div class="form-floating mb-2">
                                    <input value='.$row['new_owner_email_address'].' type="email" class="form-control" id="floatingInput" name="new_owner_email_address" placeholder="" required>
                                    <label for="floatingInput">Email address</label>
                                </div>
                            </div>
                        </div>
         
                    </div>
                    <div class="col-lg-2">
                        <div class="pre_owner_img" style="  height: 10rem;width:100%; position: relative; border: 1px solid green;">
                            <img class="img img-fluid new_owner_image" src='.$row['new_owner_file'].' style="height:100%;width:100%; position:absolute;">
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

}
else{

    $post_search = isset($_POST["search"]["value"]) ? escape_string($_POST["search"]["value"]) : '';
    
    $columns = array('new_registration.date_created');
    
    $query = "SELECT complete_registration.date_created AS processed_date,
                     new_registration.decide_registration,
                     new_registration.new_owner_email_address,
                     new_registration.registration_id,
                     new_registration.new_owner_number,
                     new_registration.date_created,
                     new_registration.new_owner_name
              FROM new_registration
              JOIN previouse_owner ON previouse_owner.registration_id = new_registration.registration_id
              JOIN complete_registration ON complete_registration.registration_id = new_registration.registration_id";
    
    if (!empty($post_search)) {
        $query .= ' AND (new_registration.new_owner_number LIKE "%' . $post_search . '%" 
                         OR new_registration.new_owner_email_address LIKE "%' . $post_search . '%" 
                         OR new_registration.registration_id LIKE "%' . $post_search . '%")';
    }
    
    if (isset($_POST["order"])) {
        $query .= ' ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'];
    } else {
        $query .= ' ORDER BY complete_registration.date_created DESC';
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
    
            $sub_array = array();
            $sub_array[] = $count++;
            $sub_array[] = $row["registration_id"];
            $sub_array[] = $row["new_owner_name"];
            $sub_array[] = $row['new_owner_number'];
            $sub_array[] = $row['date_created'];
            $sub_array[] = $row['processed_date'];
            $sub_array[] = ' <a href="./edit-complete-registration.php?registration_id=' . $registration_id .'&re_type=' . $row['decide_registration'] . '" new_owner_name="'.$row['new_owner_name'] . '" class="btn btn-sm btn-info edit text-light" id="' . $registration_id . '" decide_registration="' . $row['decide_registration'] . '">
            <i class="fas fa-pencil-alt"></i>
            </button>
                <a href="./print_completed_data.php?registration_id=' . $registration_id .'&re_type=' . $row['decide_registration'] . '" class="btn btn-sm btn-danger" id="' . $registration_id . '"><i class="fas fa-file-pdf"></i></a>';
    
            $data[] = $sub_array;
        }
    
        function get_all_data($con)
        {
            $query = "SELECT new_registration.new_owner_email_address,
                             new_registration.registration_id,
                             new_registration.status,
                             new_registration.date_created,
                             new_registration.new_owner_name
                      FROM new_registration
                      JOIN previouse_owner ON previouse_owner.registration_id = new_registration.registration_id
                      JOIN complete_registration ON complete_registration.registration_id = new_registration.registration_id";
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
