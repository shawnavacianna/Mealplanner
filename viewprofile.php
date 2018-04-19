<?php

//db connection
require ("connector.php");
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

//if($mealtype == "Breakfast"){
      $sql = mysqli_query($conn, "SELECT fname,lname,glutentolerant,diabetic,lactoseintolerant,vegetarian,vegan FROM Profile");

           //     <span class="section-heading-upper" id="Mtype1">Meal Type</span>
             //   <span class="section-heading-lower" id="Mname1">Meal Name</span>
if(mysqli_num_rows($sql)){

    while($rs=mysqli_fetch_array($sql)){
          
         $span.='<div class="username">'.$rs['fname'].''.$rs['lname'].'</div><div class="data"><span class="entypo-heart"> Profiles Details</span></div><div class="left">Gluten Intolerant</div><div class="right">'.$rs['glutentolerant'].'</div> <div class="left">Diabetic</div><div class="right">'.$rs['diabetic'].'</div><div class="left">Lactose Intolerant</div><div class="right">'.$rs['lactoseintolerant'].'</div><div class="left">Vegan</div><div class="right">'.$rs['vegan'].'</div><div class="left">Vegetarian</div><div class="right">'.$rs['vegetarian'].'</div>';
    
      }
    }

echo $span;

?> 
