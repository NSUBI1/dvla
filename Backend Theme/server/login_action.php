<?php
include("./config.php");
if(isset($_POST['email_address'])&& isset($_POST['password']) ){
    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        $data=escape_string($data);
      return $data;
    }
    $user_name=validate($_POST['email_address']);
    $password=validate($_POST['password']);

    if(empty($user_name) ||empty($password)){
         header("Location:../index.php?error=required");
        exit(); 
    }
    else{
        $query= query("SELECT * from users where email_address='".$user_name."'");
        if(mysqli_num_rows($query)===1){
           foreach($query as $row){
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user_id']=$row['user_id'];
                    $_SESSION['full_name']=$row['full_name'];
                    $_SESSION['user_type']=$row['user_type'];
                    $_SESSION['email_address']=$row['email_address'];
                    $_SESSION['tel_number']=$row['tel_number'];
                    header("Location:../home.php");
                } else {
                    header("Location:../index.php?error=wrongpwd");
                }
               }   
           }
        else{
            header("Location:../index.php?error=wrongemail");
            exit();
        }
    }
}
else{
    header("Location:../index.php?error=wrongcri");
    exit();
}

?>
