<?php 

include ("./config.php");

    if($_SESSION['user_type']=='client'){
        $count=query("SELECT * from new_registration where user_id='{$_SESSION['user_id']}'");

        if(!$count){
            die(mysqli_error($con));
        }
        else{
            echo mysqli_num_rows($count);
        }
    }
    else{
        $count=query("SELECT * from new_registration");

        if(!$count){
            die(mysqli_error($con));
        }
        else{
            echo mysqli_num_rows($count);
        }
    }

  

?>