<?php
//db connection
require ("connector.php");
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

/*select Profile.account_id,Account.account_id, Account.fname, Account.lname,Profile.profile_id, Profile.fname,Profile.lname FROM Profile JOIN Account ON Profile.account_id = Account.account_id WHERE Profile.account_id = Account.account_id;

select Profile.account_id,Account.account_id, Profile.fname,Profile.lname 
FROM Profile 
JOIN Account
ON Profile.account_id = Account.account_id 
WHERE Profile.account_id = Account.account_id
AND Account.account_id = 1;*/


      $sql = mysqli_query($conn, " select Account.account_id, Account.fname afname, Account.lname alname, Profile.account_id, Profile.profile_id, Profile.fname pfname, Profile.lname plname
      FROM Profile 
      JOIN Account 
      ON Profile.account_id = Account.account_id 
      WHERE Profile.account_id = Account.account_id;
      ");
      //$sql2 = mysqli_query($conn, "SELECT account_id, fname, lname FROM Account");
      
if(mysqli_num_rows($sql)){
//$select= '<select name="select">';

while($rs=mysqli_fetch_array($sql)){
      //*$select.= '.$rs['Profile.fname'].'.$rs['Profile.lname'].';`  
     //$select.=''.$rs['fname'].'"</br>"'.$rs['lname'].'';
     $select.='<div>'."Account name: ".$rs['afname'].' '.$rs['alname'].'<p>'."Profile: ".$rs['pfname'].' '.$rs['plname'].'';

 }
}

/*  <div>
    <p>Eddie Twinnie</p>
    <p></p>
</div>

    <p>Marcel Twinnie</p>
    <p>Marcel Twinnie</p>
    <p>Mark Twinnie</p></p>
    </br>
    <p>Account name: Ashly Lawrence</p>
    <p>Profile(s):</p>
    </br>
    <p>Ashley Lawrence</p>
    <p>Michael Lawrence</p>
    <p>Melissa Lawrence</p></p>  
  </div>  */




               // <li class="list-unstyled-item list-hours-item d-flex">
                //  Thursday
                 // <span class="ml-auto">7:00 AM to 8:00 PM</span>
                // </li>

//if(mysqli_num_rows($sql2)){
//$select= '<select name="select">';

//while($rs=mysqli_fetch_array($sql2)){
      /*$select.= '.$rs['fname'].'.$rs['lname'].';*/
   //   $select.='<option value="'.$rs['fname'].'">'.$rs['lname'].'</option>';

 // }
//}

//$select.='</select>';
echo $select;
?> 

