<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    
</body>
</html>
<?php 

 session_start();
 include "db_conn.php";
 $mail=$_SESSION['user_name'];
 //echo $mail;
 $sql = "SELECT id_send,object,message,date_envoi FROM mails WHERE mail_get='$mail'";
          $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
          while( $rows = mysqli_fetch_assoc($result) ) { 
           # echo $rows["src"];
           $id_send=$rows['id_send'];
           $sql2="SELECT user_name FROM users WHERE id='$id_send'";
           $result2 = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));
           echo "<div class='overview-boxes'>";
           while( $rows2 = mysqli_fetch_assoc($result2) ) { 
            echo " <div class='box'>
            <div class='right-side'>
              <div class='box-topic'>".$rows2['user_name']."</div>";
           }
              //echo $rows['id_send'];
              echo "<div class='number'>".$rows['object']."</div>";
              echo "<div class='indicator'>
              <span class='text'>".$rows['message']."</span>
              </div>
               <div class='indicator'>
              <span class='text'>".$rows['date_envoi']."</span>
              </div>
            </div>
  
          </div></div>";

          }
          
/*

 <div class='box'>
          <div class='right-side'>
            <div class='box-topic'>Total Sales</div>
            <div class='number'>38,876</div>
            <div class='indicator'>
              <span class='text'>Up from yesterday</span>
            </div>
          </div>

        </div>*/
          //"SELECT id_mes FROM mails WHERE mail_get=$mail";
        
/*
          <td ><?php echo $fetch['email']?></td>
          <td style="font-weight: bold;"><?php echo $fetch['object']?></td>
                <td style="font-weight: bold;" >   <?php echo $fetch['message']?></td> <td ><?php  echo $fetch['datemes']?></td>
                 <td ><?php  echo $fetch['datemes']?></td>










          echo '<div class="mailCard">'.
            'from: &nbsp;&nbsp;'.$mail['sender'].'<br>'.
            'to: &nbsp;&nbsp;'.$receiver.'<br>'.
            'cc: &nbsp;&nbsp;'.$cc.'<br>'.
            'date: &nbsp;&nbsp;'.$mail['timedate'].'<br>'.
            'subject: &nbsp;&nbsp;'.$mail['object'].'<br>'
            .'</div>';
            echo '<div class="mailContent">message:<br><br>'.$mail['message'].'
                <div>
                    <br><hr><br>
                    '.$url.'
                </div>
            </div>';*/
        
?>