<?php 
session_start();
include "db_conn.php";
//echo"hi";
  $mail=$_SESSION['user_name'];
  $id=$_POST['fav'];

  // $id;
  
  if(ISSET($_POST['fav'])){
    $sql = "UPDATE mails SET fav='1'  WHERE id_mes='$id' and  supp='0'";
    $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    header('location:home.php');
 
    

    

   
 }

 
//  <script>
//  alert($result2)
//  window.location.replace('home.php')

//  </script>";

?>