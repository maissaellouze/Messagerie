<?php 
session_start();
include "db_conn.php";
//echo"hi";
  $mail=$_SESSION['user_name'];
  $id=$_POST['supp'];

  // $id;
  
  if(ISSET($_POST['supp'])){
    $sql = "DELETE FROM  mails  WHERE id_mes='$id' AND supp='1'";
    $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
 
    echo"
    <script>
    alert('votre mail a éte definitivement supprime')
    window.location.replace('home.php')

    </script>";
   
  }
  
    


 

?>
  

