<?php
$username = filter_input(INPUT_POST,'uname');
$firstname = filter_input(INPUT_POST,'fname');
$lastname = filter_input(INPUT_POST,'lname');
$password = filter_input(INPUT_POST,'psw');
$plantype = filter_input(INPUT_POST,'plantype');
/*if (!empty($firstname)){
    if(!empty($lastname)){
        if(!empty($username)){
                if(!empty($password)){
                    if (!empty($plantype)){*/
                        require ("connector.php");
                        // Creating connection
                        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
                        if (mysqli_connect_error()){
                            die('Connect Error ('. mysqli_connect_errno().')'. mysqli_connect_error());
                        }
                        else{
                            $sql1 = mysqli_query($conn, "Select account_id from Account");
                            $result = mysqli_fetch_array($sql1,MYSQLI_NUM);
                            //$sql1 = $result[];
                            //$x = count($result);
                            $temp = 1113;
                            
                            $temp = $temp + 1;
                            
                            $sql = "insert into Account (account_id, fname, lname, plantype, pword) values ('$temp','$firstname','$lastname', '$plantype', '$password')";
                            if ($conn->query($sql)){
                        
                                echo "New record was successfully inserted into our database!";
                                include('UserHome.html');
                                }
                                else{
                                    echo "Error: ". $sql ."<br>". $conn->error;
                                    }
                                    $conn->close();
                        }
                  //  }
/*                    else{
                    echo"plantype should not be empty";
                    //include('signup.html');
                    die();
                }
                }
                else{
                    echo"password should not be empty";
                   // include('signup.html');
                    die();
                }
            }
            else{
                echo "contactnumber should not be empty";
                //include('signup.html');
                die();
        }
            
    }
    else{
        echo "lastname should not be empty";
        //include('signup.html');
        die();
        
    }
    
    
}
else{
    echo "firstname should not be empty";
    //include('signup.html');
    die();
    } */
?>

