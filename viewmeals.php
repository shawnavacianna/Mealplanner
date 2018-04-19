<?php

//db connection
require ("connector.php");
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

//if($mealtype == "Breakfast"){
     // $sql = mysqli_query($conn, "SELECT meal_name,meal_type,image_path FROM Mealplan join Meal on Mealplan.meal_id=Meal.meal_id where meal_date='$date'");
      $sql = mysqli_query($conn, "SELECT * FROM Meal where meal_type='Lunch'");
      //$sql = mysqli_query($conn, "SELECT * FROM Meal where meal_type='Lunch'");

    

           //     <span class="section-heading-upper" id="Mtype1">Meal Type</span>
             //   <span class="section-heading-lower" id="Mname1">Meal Name</span>
             
      $array = mysqli_fetch_row($sql); 
echo json_encode($array);
/*
if(mysqli_num_rows($sql)){


while($rs=mysqli_fetch_array($sql)){
      $span= '<span class="section-headng-upper" id="Mtype'.$i.'">'.$rs['meal_type'].'</span></br>';
      $span2='<span class="section-headng-upper" id="Mname'.$i.'">'.$rs['meal_name'].'</span>';
      $img= '<img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" scr="'.$rs['image_path'].'" alt="">';

  }
}

echo $span;
echo $span2;
echo $img;*/

?> 