<?php
include_once ('./config.php');

if (isset($_POST['action'])){

    if($_POST['action']=='delete'){
        $id=escape_string($_POST['id']);
             
        $delete=query("DELETE from users where user_id='{$id}'");
        if ($delete){
            exit('deleted');
            }
            else{
                die(mysqli_error($con));
            }

    }

    else{
        $full_name=escape_string($_POST['full_name']);
        $email_address=escape_string($_POST['email_address']);
        $user_type=escape_string($_POST['action']);
        $address=escape_string($_POST['address']);
        //this for agency update
        $tel_number=escape_string($_POST['tel_number']);
        $password=escape_string($_POST['password']);
        // end
  
        $query=query("Select * from users where email_address='".$email_address."'");
        if (mysqli_num_rows($query)>0){
        exit('email address already exist');
        }
        else{
        $password=password_hash($password,PASSWORD_DEFAULT);
        $query=query("INSERT into users (full_name,email_address,password,user_type,tel_number,address) values ('{$full_name}','{$email_address}','{$password}','{$user_type}','{$tel_number}','{$address}')");
        if ($query){
        exit('user addedd successfully');
        }
        else{
            die(mysqli_error($con));
        }
        }

            
    }
    }

else{    
    $post_search = isset($_POST["search"]["value"]) ? escape_string($_POST["search"]["value"]) : '';
    
    $columns = array('full_name', 'email_address');
    $query = "SELECT * FROM users where user_type='staff'";
    
    if (!empty($post_search)) {
        $query .= "and (full_name LIKE '%$post_search%' OR email_address LIKE '%$post_search%')";
    }
    
    if (isset($_POST["order"])) {
        $query .= " ORDER BY " . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'];
    } else {
        $query .= ' ORDER BY full_name ASC';
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
            $user_id = $row['user_id'];
    
            $sub_array = array();
            $sub_array[] = $count++;
            $sub_array[] = $row["full_name"];
            $sub_array[] = $row["email_address"];
            $sub_array[] = $row["tel_number"];
            $sub_array[] = $row['address'];
            $sub_array[] = '<button class="btn btn-sm btn-danger delete" id="' . $user_id . '">Delete</button>';
            $data[] = $sub_array;
        }
    
        function get_all_data($con)
        {
            $query = "SELECT * FROM users where user_type='staff'";
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

    



?>