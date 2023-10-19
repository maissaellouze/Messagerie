<?php 
session_start();
include "db_conn.php";
//echo"hi";
  $mail=$_SESSION['user_name'];
  $id=$_POST['supp'];

  // $id;
  
  if(ISSET($_POST['supp'])){
    $sql = "UPDATE mails SET supp='0'  WHERE id_mes='$id'";
    $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
 
    echo"
    <script>
    alert('votre mail est deplacer dans la boite reception ')
    window.location.replace('corbeille.php')

    </script>";
   
 }
  
    


 

?>
  

