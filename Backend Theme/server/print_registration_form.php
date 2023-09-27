<?php
include ("./config.php");

if(isset($_POST['action'])){
    if ($_POST['action']=='get_complete_process_2'){
        $registration_id= escape_string($_POST['id']);
        
        $get_data=query("SELECT * from complete_registration where registration_id='{$registration_id}'");
    
        if(!$get_data){
            die(mysqli_error($con));
        }
        else{
    
            foreach($get_data as $row){
                echo '
                <input type="hidden" name="action" value="edit_complete_process_2">
                <input type="hidden" name="registration_id" class="registration_id" value="'.$row['registration_id'].'">
        <div class="row">
        <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-namecard-input">vehicle weight</label>
                    <input type="text" class="form-control vehicle_weight" id="progress-basicpill-namecard-input" name="vehicle_weight"  value="'.$row['vehicle_weight'].'" disabled>
                </div>
            </div>
    
            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-namecard-input">Permissible Axle load</label>
                    <input type="text" class="form-control vehicle_load" id="progress-basicpill-namecard-input" name="vehicle_load" value="'.$row['vehicle_load'].'" disabled>
                </div>
            </div>
    
    
            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-namecard-input">Number of persons allowed</label>
                    <input type="text" class="form-control no_persons" id="progress-basicpill-namecard-input" name="no_persons" value="'.$row['no_persons'].'" disabled>
                </div>
            </div>
    
    
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-cardno-input">Gross Weight</label>
                    <input type="numbet" class="form-control gross_weight" id="progress-basicpill-cardno-input" name="gross_weight" value="'.$row['gross_weight'].'" disabled>
                </div>
            </div>
    
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-card-verification-input">Front</label>
                    <input type="number" class="form-control no_front" id="progress-basicpill-card-verification-input" name="no_front" value="'.$row['no_front'].'"  disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-expiration-input">Net Weight</label>
                    <input type="number" class="form-control net_weight" id="progress-basicpill-expiration-input" name="net_weight" value="'.$row['net_weight'].'" disabled>
                </div>
            </div>
    
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-expiration-input">Middel</label>
                    <input type="number" class="form-control no_middle" id="progress-basicpill-expiration-input" name="no_middle" value="'.$row['no_middle'].'" disabled>
                </div>
            </div>
    
        </div>
    
    
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-expiration-input">Permissible loading capacity</label>
                    <input type="number" class="form-control perm_load" id="progress-basicpill-expiration-input" name="perm_load"  value="'.$row['perm_load'].'" disabled>
                </div>
            </div>
    
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-expiration-input">Rear</label>
                    <input type="number" class="form-control rear" id="progress-basicpill-expiration-input" name="rear"  value="'.$row['rear'].'" disabled>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-expiration-input">Engine make</label>
                    <input type="text" class="form-control engine_make" id="progress-basicpill-expiration-input" name="engine_make" value="'.$row['engine_make'].'" disabled>
                </div>
            </div>
    
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-expiration-input">Engine number</label>
                    <input type="text" class="form-control engine_number" id="progress-basicpill-expiration-input" name="engine_number" value="'.$row['engine_number'].'" disabled>
                </div>
            </div>
    
        </div>
    
    
        <div class="row">
            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-expiration-input">Number of Cylinders</label>
                    <input type="text" class="form-control engine_make" id="progress-basicpill-expiration-input" name="num_cylinders" value="'.$row['num_cylinders'].'" disabled>
                </div>
            </div>
    
            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-expiration-input">Cubic Capacity</label>
                    <input type="text" class="form-control cubic_capacity" id="progress-basicpill-expiration-input" name="cubic_capacity" value="'.$row['cubic_capacity'].'" disabled>
                </div>
            </div>
    
            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-expiration-input">Horse power</label>
                    <input type="text" class="form-control horse_power" id="progress-basicpill-expiration-input" name="horse_power" value="'.$row['horse_power'].'" disabled>
                </div>
            </div>
    
        </div>
    
    
    
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-expiration-input">Fuel type</label>
                    <input type="text" name="old_type" value="'.$row['fuel_type'].'" disabled class="form-control">
                </div>
            </div>
    
        </div>';
            }
        }
    
    }



else if ($_POST['action']=='get_complete_process_1'){
    $registration_id= escape_string($_POST['id']);
    $get_data=query("SELECT * from complete_registration where registration_id='{$registration_id}'");
    if(!$get_data){
        die(mysqli_error($con));
    }
    else{
        foreach($get_data as $row){
            echo '
            <div class="row">
            <div class="col-lg-6">
                <input type="hidden" name="action" value="edit_complete_process_1">
                <input type="hidden" name="registration_id" class="registration_id" value="'.$row['registration_id'].'">
                <div class="mb-3">
                    <label class="form-label" for="vehicle_make">Vehicle Make</label>
                    <input type="text" class="form-control vehicle_make" id="vehicle_make" name="vehicle_make" value="'.$row['vehicle_make'].'" disabled>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="model_name">Model Name /No</label>
                    <input type="text" class="form-control model_name" id="model_name" name="model_name" value="'.$row['model_name'].'" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-cstno-input">Chassis number</label>
                    <input type="text" class="form-control chassis_number" id="progress-basicpill-cstno-input" name="chassis_number"  value="'.$row['chassis_number'].'" disabled>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-servicetax-input">Year of Manufacture</label>
                    <input type="text" class="form-control year_manufacture" id="progress-basicpill-servicetax-input" name="year_manufacture" value="'.$row['year_manufacture'].'" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-companyuin-input">Body Type</label>
                    <input type="text" class="form-control body_type" id="progress-basicpill-companyuin-input" name="body_type" value="'.$row['body_type'].'" disabled>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Color</label>
                    <input type="text" class="form-control color" id="progress-basicpill-declaration-input" name="color" value="'.$row['color'].'" disabled>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Measurement(cm) length</label>
                    <input type="number" class="form-control length" id="progress-basicpill-declaration-input" name="length" value="'.$row['length'].'" disabled>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Width</label>
                    <input type="text" class="form-control width" id="progress-basicpill-declaration-input" name="width" value="'.$row['width'].'" disabled>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Height</label>
                    <input type="text" class="form-control height" id="progress-basicpill-declaration-input" name="height" value="'.$row['height'].'" disabled>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Country of origin</label>
                    <input type="text" class="form-control origin" id="progress-basicpill-declaration-input" name="origin" value="'.$row['origin'].'" disabled>
                </div>
            </div>


            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Number of Axles</label>
                    <input type="text" class="form-control axles" id="progress-basicpill-declaration-input" name="axles" value="'.$row['axles'].'" disabled>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Number of tyres</label>
                    <input type="text" class="form-control tyrs" id="progress-basicpill-declaration-input" name="tyrs" value="'.$row['tyrs'].'" disabled>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="progress-basicpill-declaration-input">Vehicle use</label>
                    <input type="text" name="old_car_use" value="'.$row['vehicle_use'].'" class="form-control" disabled>
                </div>
            </div>
      
        </div>
            ';



        }
    }
}
    

else if ($_POST['action']=='get_data'){
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
                                     <input type="text" value='.$row['new_owner_name'].' class="form-control" id="floatingInput" placeholder="new owner" name="new_owner_name" disabled>
                                     <label for="floatingInput">Full name of new owner</label>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-floating mb-2">
                                     <input value='.$row['new_owner_address'].' type="text" class="form-control" id="floatingInput" placeholder="" name="new_owner_address" disabled>
                                     <label for="floatingInput">Postal Address</label>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-floating mb-2">
                                     <input value='.$row['new_owner_location'].' type="text" class="form-control" id="floatingInput" name="new_owner_location" placeholder="" disabled>
                                     <label for="floatingInput">Residential/ location address</label>
                                 </div>
                             </div>
          
                             <div class="col-lg-6">
                                 <div class="form-floating mb-2">
                                     <input value='.$row['new_owner_number'].' type="number" class="form-control" id="floatingInput" name="new_owner_number" placeholder="" disabled minlength="10" maxlength="12">
                                     <label for="floatingInput">Telephone number</label>
                                 </div>
                             </div>
          
                             <div class="col-lg-6">
                                 <div class="form-floating mb-2">
                                     <input value='.$row['new_owner_tin'].' type="text" class="form-control" id="floatingInput" name="new_owner_tin" placeholder="" disabled>
                                     <label for="floatingInput">Tin number</label>
                                 </div>
                             </div>
          
                             <div class="col-lg-6">
                                 <div class="form-floating mb-2">
                                     <input value='.$row['new_owner_work'].' type="text" class="form-control" id="floatingInput" name="new_owner_work" placeholder="" disabled>
                                     <label for="floatingInput">Occupation</label>
                                 </div>
                             </div>
          
                             <div class="col-lg-12">
                                 <div class="form-floating mb-2">
                                     <input value='.$row['new_owner_email_address'].' type="email" class="form-control" id="floatingInput" name="new_owner_email_address" placeholder="" disabled>
                                     <label for="floatingInput">Email address</label>
                                 </div>
                             </div>
                         </div>
          
                     </div>
                     <div class="col-lg-2">
                         <div class="pre_owner_img" style="  height: 10rem;width:100%; position: relative; border: 1px solid green;">
                             <img class="img img-fluid new_owner_image" src='.$row['new_owner_file'].' style="height:100%;width:100%; position:absolute;">
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
                 </div>
                 <div class="col-lg-10">
                     <div class="row g-3">
                         <div class="col-lg-6">
                             <div class="form-floating mb-2">
                                 <input value='.$row['pre_owner_name'].' type="text" class="form-control" id="floatingInput" placeholder="new owner" name="pre_owner_name" disabled>
                                 <label for="floatingInput">Full name of Previous owner</label>
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="form-floating mb-2">
                                 <input  value='.$row['pre_owner_address'].' type="text" class="form-control" id="floatingInput"  placeholder=""name="pre_owner_address" disabled>
                                 <label for="floatingInput">Previous Owner  Postal Address</label>
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="form-floating mb-2">
                                 <input value='.$row['pre_owner_location'].' type="text" class="form-control" id="floatingInput" name="pre_owner_location" placeholder="" disabled>
                                 <label for="floatingInput">Previous Owner Residential/ location address</label>
                             </div>
                         </div>
          
                         <div class="col-lg-6">
                             <div class="form-floating mb-2">
                                 <input value='.$row['pre_owner_number'].' type="number" class="form-control" id="floatingInput" name="pre_owner_number" placeholder="" disabled minlength="10" maxlength="12">
                                 <label for="floatingInput">Previous Owner  Telephone number</label>
                             </div>
                         </div>
          
                         <div class="col-lg-6">
                             <div class="form-floating mb-2">
                                 <input value='.$row['pre_owner_tin'].' type="text" class="form-control" id="floatingInput" name="pre_owner_tin" placeholder="" disabled>
                                 <label for="floatingInput">Previous Owner  Tin number</label>
                             </div>
                         </div>
          
                         <div class="col-lg-6">
                             <div class="form-floating mb-2">
                                 <input value='.$row['pre_owner_work'].' type="text" class="form-control" id="floatingInput" name="pre_owner_work" placeholder="" disabled>
                                 <label for="floatingInput">Previous Owner  Occupation</label>
                             </div>
                         </div>
          
                         <div class="col-lg-12">
                             <div class="form-floating mb-2">
                                 <input value='.$row['pre_owner_email_address'].' type="email" class="form-control" id="floatingInput" name="pre_owner_email_address" placeholder=""disabled>
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
                                     <input type="text" value='.$row['new_owner_name'].' class="form-control" id="floatingInput" placeholder="new owner" name="new_owner_name" disabled>
                                     <label for="floatingInput">Full name of new owner</label>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-floating mb-2">
                                     <input value='.$row['new_owner_address'].' type="text" class="form-control" id="floatingInput" placeholder="" name="new_owner_address" disabled>
                                     <label for="floatingInput">Postal Address</label>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-floating mb-2">
                                     <input value='.$row['new_owner_location'].' type="text" class="form-control" id="floatingInput" name="new_owner_location" placeholder="" disabled>
                                     <label for="floatingInput">Residential/ location address</label>
                                 </div>
                             </div>
          
                             <div class="col-lg-6">
                                 <div class="form-floating mb-2">
                                     <input value='.$row['new_owner_number'].' type="number" class="form-control" id="floatingInput" name="new_owner_number" placeholder="" disabled minlength="10" maxlength="12">
                                     <label for="floatingInput">Telephone number</label>
                                 </div>
                             </div>
          
                             <div class="col-lg-6">
                                 <div class="form-floating mb-2">
                                     <input value='.$row['new_owner_tin'].' type="text" class="form-control" id="floatingInput" name="new_owner_tin" placeholder="" disabled>
                                     <label for="floatingInput">Tin number</label>
                                 </div>
                             </div>
          
                             <div class="col-lg-6">
                                 <div class="form-floating mb-2">
                                     <input value='.$row['new_owner_work'].' type="text" class="form-control" id="floatingInput" name="new_owner_work" placeholder="" disabled>
                                     <label for="floatingInput">Occupation</label>
                                 </div>
                             </div>
          
                             <div class="col-lg-12">
                                 <div class="form-floating mb-2">
                                     <input value='.$row['new_owner_email_address'].' type="email" class="form-control" id="floatingInput" name="new_owner_email_address" placeholder="" disabled>
                                     <label for="floatingInput">Email address</label>
                                 </div>
                             </div>
                         </div>
          
                     </div>
                     <div class="col-lg-2">
                         <div class="pre_owner_img" style="  height: 10rem;width:100%; position: relative; border: 1px solid green;">
                             <img class="img img-fluid new_owner_image" src='.$row['new_owner_file'].' style="height:100%;width:100%; position:absolute;">
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


?>