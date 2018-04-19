<?php

//db connection
require ("connector.php");
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
$mealtype = $_GET["str"];
//query
//$sql=mysql_query("SELECT meal_id,meal_name FROM Meal");
//$rs=mysqli_fetch_array($sql);

//if($mealtype == "Breakfast"){
      $sql = mysqli_query($conn, "SELECT meal_id,meal_name,meal_type FROM Meal WHERE meal_type= 'Dinner' ");
//}
//elseif($mealtype == "Lunch"){
    //  $sql = mysqli_query($conn, "SELECT meal_id,meal_name,meal_type FROM Meal WHERE meal_type = 'Lunch' ");
//}

//elseif($mealtype == "Dinner"){
  //    $sql = mysqli_query($conn, "SELECT meal_id,meal_name,meal_type FROM Meal WHERE meal_type = 'Dinner' ");
//} 


if(mysqli_num_rows($sql)){
$select= '<select name="select">';
while($rs=mysqli_fetch_array($sql)){
      $select.='<option value="'.$rs['meal_id'].'">'.$rs['meal_name'].'</option>';

  }
}
$select.='</select>';
echo $select;
?> 