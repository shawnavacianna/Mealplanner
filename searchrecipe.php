<?php
//db connection
$name= $_POST['search'];
require ("connector.php");
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


      $sql = mysqli_query($conn, "SELECT recipe_name,creationdate,calorie_count,prep_time,unit FROM Recipe where recipe_name = '$name' ");

if(mysqli_num_rows($sql)){
//$select= '<select name="select">';

while($rs=mysqli_fetch_array($sql)){
      $select.='<li class="list-unstyled-item list-hours-item d-flex">NAME:'.$rs['recipe_name'].'"<span class="ml-auto">CREATION DATE:'.$rs['creationdate'].'CALORIE COUNT'.$rs['calorie_count'].''.$rs[pre_time].'</span> </li>';

  }
}

               // <li class="list-unstyled-item list-hours-item d-flex">
                //  Thursday
                 // <span class="ml-auto">7:00 AM to 8:00 PM</span>
                // </li>

//$select.='</select>';
echo $select;
?> 