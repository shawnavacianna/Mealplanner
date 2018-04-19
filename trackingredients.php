<?php
//db connection
require ("connector.php");
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

      $sql = mysqli_query($conn,"select status,hasInStock.ingredient_id,Ingredients.ingredient_id,name 
      from hasInStock 
      JOIN Ingredients
      ON hasInStock.ingredient_id = Ingredients.ingredient_id
      where status='True'");
      //$sql = mysqli_query($conn, " select name, amount,status, unit FROM Ingredients WHERE status = 'available'");
      //$sql = mysqli_query($conn, " select status FROM hasInStock WHERE status = 'True'");

      
if(mysqli_num_rows($sql)){
//$select= '<select name="select">';

while($rs=mysqli_fetch_array($sql)){
     // $select.= '<div>'.'<p>'.$rs['name'].' , '.$rs['amount'].' '.$rs['unit'];
      $select.= '<div>'.'<p>'.$rs['name'].'' ;
     //$select.=''.$rs['name'].'';
     //$select.='<div>'."Account name: ".$rs['name'].' '.$rs['name'].'<p>'."Profile: ".$rs['name'].' '.$rs['name'].'';

 }
}

echo $select;
?> 

