<?php
//db connection
require ("connector.php");
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
//$mealtype = $_GET["str"];


      $sql = mysqli_query($conn, "SELECT ingredient_id,name FROM Ingredients ");


if(mysqli_num_rows($sql)){
$select= '<select name="select">';
while($rs=mysqli_fetch_array($sql)){
      $select.='<option value="'.$rs['ingredient_id'].'">'.$rs['name'].'</option>';

  }
}
$select.='</select>';
echo $select;
?> 