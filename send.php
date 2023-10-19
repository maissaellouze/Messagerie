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
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/send.css">

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
          
          $sql = "SELECT src FROM images WHERE id= $num";
          $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
		while( $rows = mysqli_fetch_assoc($resultset) ) { 
      echo "<img src='images/".$rows["src"]."' alt='maissa'>";
    }
		?>
        <span class="admin_name">
        <?php echo $_SESSION['name']; ?>
        </span>

      </div>
      
    </nav>
    <form action="sendBD.php" method="post">
    <div class="container">
        <br><br><br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <label for="subject">Subject:</label>
            <input type="text" name="object" id="subject">
            <label for="message">Message</label>
            <textarea name="message" cols="30" rows="10"></textarea>
            <input name="envoyer"type="submit" value="Send">
        
    </div>
    </form>
   
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





