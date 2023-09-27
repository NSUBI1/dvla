<?php 

include ("./config.php");

    if($_SESSION['user_type']=='client'){
        $count=query("SELECT * from new_registration where user_id='{$_SESSION['user_id']}'
        and status='pending' or user_id='{$_SESSION['user_id']}' and status is null 
        ");

        if(!$count){
            die(mysqli_error($con));
        }
        else{
            echo mysqli_num_rows($count);
        }
    }
    else{
        $count=query("SELECT * from new_registration where status='pending' or  status is null 
        ");

        if(!$count){
            die(mysqli_error($con));
        }
        else{
            echo mysqli_num_rows($count);
        }
    }

  

?>