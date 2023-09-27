<?php
error_reporting(0);
session_status() === PHP_SESSION_ACTIVE ?: session_start();
function set_message($msg){
    if(!empty($msg)){
       $_SESSION['message']=$msg; 
    }
    else{
        $msg="";
    }
}

function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}
function redirect($location){
    header("Location:$location");
}

function query($query){
    global $con;
    return mysqli_query($con,$query);

}
function confirmQuery($results){
    global $con;
    if(!$results){
        die("Query failed". mysqli_error($con,$results));
    }

else{

    //do nothing
// $outsms=<<<DELIMETER
// <div class="alert alert-success alert-dismissible fade in show" role="alert">
// <strong>Very well</strong> Data added successfuly.
// <button type="button" class="close" data-dismiss="alert" aria-label="Close">
// <span aria-hidden="true">&times;</span>
// </button>
// </div>
// DELIMETER;
//     set_message($outsms);
//     display_message();
}
    // else{
    //     echo '<html><div class="alert alert-success" role="alert">
    //     Data saved
    //   </div></html>';
    // }
    // return mysqli_query($con,$query);
    
}
function escape_string($escape){
    global $con;
    $data=trim($escape);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    $data=mysqli_real_escape_string($con,$data);  
    return $data;
}
function check_for_login(){
    if(isset($_SESSION['user_id'])){

    }
    else{
        header("Location:./server/logout.php");
    }
}
function fetch_array($result){
return mysqli_fetch_array($result);
}
