<?php 

include ("./config.php");

        $count=query("SELECT * from complete_registration where user_id='{$_SESSION['user_id']}'");

        if(!$count){
            die(mysqli_error($con));
        }
        else{
            echo mysqli_num_rows($count);
        }
    
?>