<?php
//$username = filter_input(INPUT_POST,'uname');
$firstname = filter_input(INPUT_POST,'fname');
$lastname = filter_input(INPUT_POST,'lname');
$password = filter_input(INPUT_POST,'password');
//$plantype = filter_input(INPUT_POST,'plantype');
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

                           
                            $sql1 = mysqli_query($conn, "Select account_id, password from Account where password = '$password'");

                            if (!$sql1){
                                echo "Access Denied";
                                include 'viewprofile.html';
                            }
                            else{
                            
                            $sql="update Profile join Account on Profile.account_id=Account.account_id SET fname = '$fname',lname='$lname',password='$password' where Profile.profile_id = Account.profile_id";
                            if ($conn->query($sql)){
                        
                                echo "Updated!";
                                include('Viewprofile.html');
                                }
                                else{
                                    echo "Error: ". $sql ."<br>". $conn->error;
                                    }
                                    $conn->close();
                            }
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

