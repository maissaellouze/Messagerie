<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/reception.css">

    <title>Document</title>
</head>
<body>
<div class="sidebar">
<div class="logo-details">
      <img src="images/MaissaChat.jpg" alt=" maissa chat "  width = "250" height = "70" >
     
    </div>
    <br><br> 
      <ul class="nav-links">
      <li>
          <a href="send.php">
          <i class='bx bx-mail-send' ></i>
            <span class="links_name">ecrire un message</span>
          </a>
        </li>

        <li>
        <a href="home.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>

        <li>
          <a href="corbeille.php">
          <i class='bx bxs-trash'></i>
            <span class="links_name">corbeille</span>
            <?php    
                  $mail=$_SESSION['user_name'];
                  $sql2 = "SELECT COUNT(id_mes) AS count FROM  mails  WHERE  supp='1' AND mail_get='$mail'";
                    $result2 = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn)); 
                    $data = mysqli_fetch_assoc($result2);
                    $som= $data['count'];
                    echo "<h4>".$som."</h4>";
                
            ?>
            <span id='clickableAwesomeFont'></span>
          </a>
        </li>
        
   
        <li>
          <a href="favori.php">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favrorites</span>
            <?php    
                  $mail=$_SESSION['user_name'];
                  $sql2 = "SELECT COUNT(id_mes) AS count FROM  mails  WHERE  fav='1' AND mail_get='$mail' and supp='0'";
                    $result2 = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn)); 
                    $data = mysqli_fetch_assoc($result2);
                    $som= $data['count'];
                    echo "<h4>".$som."</h4>";
                
            ?>

          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="login.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Maissa Chat</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      
      <div class="profile-details">
      <?php  
          include "db_conn.php";
          $num=$_SESSION['id'];
          /*echo "<script>
          alert(' $num')
        </script>
                ";*/
          $sql = "SELECT src FROM images WHERE id= $num";
          $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
		while( $rows = mysqli_fetch_assoc($resultset) ) { 
      echo "<img src='images/".$rows["src"]."' alt='maissa' >";
    }
		?>
      
        <span class="admin_name">
        <?php echo $_SESSION['name']; ?>
        </span>

      </div>
      
    </nav>
    <br><br><br><br><br><br>

    
     <?php
    
/*

    //<a href='#'>
    <i class='bx bxs-trash'></i>
    <span class='links_name'>corbeille</span>
    <span id='clickableAwesomeFont'><i class='bx bxs-trash'></i></span>
  </a>*/


  $mail=$_SESSION['user_name'];
  //echo $mail;
  $sql = "SELECT id_mes ,id_send,object,message,date_envoi FROM mails WHERE mail_get='$mail' and supp=1";
  $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
  while( $rows = mysqli_fetch_assoc($result) ) { 
   # echo $rows["src"];
   $id_mess= $rows["id_mes"];
   $id_send=$rows['id_send'];
   $sql2="SELECT user_name FROM users WHERE id='$id_send'";
   $result2 = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));
   echo "<table class='table table-inbox table-hover'>
   <tbody>
   <tr class='unread'>
       
       <td class='inbox-small-cells'> ";
       
       echo"<form action='toRecep.php' method='post'>
       <a href='mailsupp.php?id=".$id_mess."'>
      <button style='border:none;background:none' type='submit' name='supp' value='".$id_mess."'>             
      <span  name='supp' id='clickableAwesomeFont'>
      <i style='font-size:30px' class='bx bx-mail-send' width='100' height='100'></i>
     
      </span></button> 
                   
      </a>
      
     </form>";
      
       
       
   
       echo"<td class='view-message  dont-show'>";
       while( $rows2 = mysqli_fetch_assoc($result2) ) {
        $sql3 = "SELECT src FROM images WHERE id= $id_send";
        $resultset3 = mysqli_query($conn, $sql3) or die("database error:". mysqli_error($conn));
  while( $rows3 = mysqli_fetch_assoc($resultset3) ) { 
    echo "<img src='images/".$rows3["src"]."' alt='maissa' width = '50' height = '50' >";
  }
          
          
          echo "     ". $rows2['user_name']."</td>";
       }
       echo"<td class='view-message ''>".$rows['object']."</td>";
       echo" <td class='view-message  inbox-small-cells'>".$rows['message']."</td>
       <td class='view-message  text-right'>".$rows['date_envoi']."</td>";
      
      
       echo"<td class='inbox-small-cells'>
       <form action='mailsupp.php' method='post'>
            <a href='mailsupp.php?id=".$id_mess."'>
           <button style='border:none;background:none' type='submit' name='supp' value='".$id_mess."'>             
           </button>              
          </a>                                                  
          </form>
       </td>";
      //  
       echo"<td class='inbox-small-cells'>
       
       <form action='suppdefin.php' method='post'>
            <a href='mailsupp.php?id=".$id_mess."'>
           <button style='border:none;background:none' type='submit' name='supp' value='".$id_mess."'>             
           <span  name='supp' id='clickableAwesomeFont'>
           <i style='font-size:30px' class='bx bxs-trash' width='100' height='100'></i>
          
           </span></button> 
                        
           </a>
           
          </form>


       </td>";
      echo" </tbody>
      </table>";
      }
         ?>  

</section>













<script>
   let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
    sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
 </script>
</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}

 ?>