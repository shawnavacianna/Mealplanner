<?php
$username = filter_input(INPUT_POST,'uname');
$password = filter_input(INPUT_POST,'psw');
//if (!empty($username)){
 //   if(!empty($password)){
        require ("connector.php");
        // Creating connection
        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
        if (mysqli_connect_error()){
            die('Connect Error ('. mysqli_connect_errno().')'. mysqli_connect_error());
        }
        else{
           
            $sql1 = mysqli_query($conn, "Select fname, pword from Account where fname = '$username' and pword = '$password'");
            //$sql2 = mysqli_query($conn, "Select user_id from User where user_id like '1%';");
            //$query = "Select username, password from User where username = '$username' and password = '$password'";
            //$query = "Select username, password from User where username = 'm10' and password = 'password'";
            //$res = mysqli_query($conn, $query);
            //$result = mysqli_num_rows($conn,$sql1);
            if (!$sql1){
                echo "Access Denied";
                include 'login.html';
            }
            else{
                include 'UserHome.html';
            }
        }
        
        $conn->close();
 //   }
    
//    else{
//       echo "password should not be empty";
//        die();
//    }

//}
//else{
//    echo "Username should not be empty";
//    die();
//}

?>

