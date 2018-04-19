<?php
//db connection
require ("connector.php");
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


      $sql = mysqli_query($conn, "SELECT recipe_name,creationdate FROM Recipe ");

if(mysqli_num_rows($sql)){
//$select= '<select name="select">';

while($rs=mysqli_fetch_array($sql)){
      $select.='<li class="list-unstyled-item list-hours-item d-flex">'.$rs['recipe_name'].'"<span class="ml-auto">'.$rs['creationdate'].'</span> </li>';

  }
}

               // <li class="list-unstyled-item list-hours-item d-flex">
                //  Thursday
                 // <span class="ml-auto">7:00 AM to 8:00 PM</span>
                // </li>

//$select.='</select>';
echo $select;
?> 