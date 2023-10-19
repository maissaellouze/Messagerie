<?php 
session_start();
include "db_conn.php";
//echo"hi";
  $mail=$_SESSION['user_name'];
  $id=$_POST['supp'];

  // $id;
  
  if(ISSET($_POST['supp'])){
    $sql = "UPDATE mails SET supp='1'  WHERE id_mes='$id'";
    $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
 
    echo"
        <script>
        alert('votre mail est deplacer dans le corbeille')
        window.location.replace('home.php')

        </script>";

     
    $sql2 = "SELECT COUNT(id_mes) AS count FROM  mails  WHERE  supp='1' AND mail_get='$mail'";
    $result2 = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn)); 
    $data = mysqli_fetch_assoc($result2);
    $som= $data['count'];

   
 }

 
//  <script>
//  alert($result2)
//  window.location.replace('home.php')

//  </script>";

?>
  
    


 


  

