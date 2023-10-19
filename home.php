<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>


 <!DOCTYPE html>
<html lang="en">
<head>
  <style>
            .frame {
          width: 90%;
          margin: 40px auto;
          text-align: center;
        }
        button {
          margin: 20px;
        }
        .custom-btn {
          width: 130px;
          height: 40px;
          color: #fff;
          border-radius: 5px;
          padding: 10px 25px;
          font-family: 'Lato', sans-serif;
          font-weight: 500;
          background: transparent;
          cursor: pointer;
          transition: all 0.3s ease;
          position: relative;
          display: inline-block;
          box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
          7px 7px 20px 0px rgba(0,0,0,.1),
          4px 4px 5px 0px rgba(0,0,0,.1);
          outline: none;
        }
        .btn-7 {
          background: linear-gradient(0deg, rgba(255,151,0,1) 0%, rgba(251,75,2,1) 100%);
            line-height: 42px;
            padding: 0;
            border: none;
          }
          .btn-7 span {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
          }
          .btn-7:before,
          .btn-7:after {
            position: absolute;
            content: "";
            right: 0;
            bottom: 0;
            background: rgba(251,75,2,1);
            box-shadow:
            -7px -7px 20px 0px rgba(255,255,255,.9),
            -4px -4px 5px 0px rgba(255,255,255,.9),
            7px 7px 20px 0px rgba(0,0,0,.2),
            4px 4px 5px 0px rgba(0,0,0,.3);
            transition: all 0.3s ease;
          }
          .btn-7:before{
            height: 0%;
            width: 2px;
          }
          .btn-7:after {
            width: 0%;
            height: 2px;
          }
          .btn-7:hover{
            color: rgba(251,75,2,1);
            background: transparent;
          }
          .btn-7:hover:before {
            height: 100%;
          }
          .btn-7:hover:after {
            width: 100%;
          }
          .btn-7 span:before,
          .btn-7 span:after {
            position: absolute;
            content: "";
            left: 0;
            top: 0;
            background: rgba(251,75,2,1);
            box-shadow:
            -7px -7px 20px 0px rgba(255,255,255,.9),
            -4px -4px 5px 0px rgba(255,255,255,.9),
            7px 7px 20px 0px rgba(0,0,0,.2),
            4px 4px 5px 0px rgba(0,0,0,.3);
            transition: all 0.3s ease;
          }
          .btn-7 span:before {
            width: 2px;
            height: 0%;
          }
          .btn-7 span:after {
            height: 2px;
            width: 0%;
          }
          .btn-7 span:hover:before {
            height: 100%;
          }
          .btn-7 span:hover:after {
            width: 100%;
          }
          


  </style>
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
  
<!-- <td colspan="5">
  <button name="delete" class="btn btn-primary pull-right">
    <span id="count" class="badge">0</span><i class="fa fa-trash">

    </span> Delete</button>
  </td> -->

<div class="sidebar">
<div class="logo-details">
      <img src="images/MaissaChat.jpg" alt=" maissa chat "  width = "250" height = "70" >
     
    </div> 
    <br><br><br>
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
      <form action="search.php" method="post">
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      </form>
      
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
    <!-- <form action="delete.php" method="post">
        <button name="delete"class="custom-btn btn-7"><span>Supprimer</span>
        
      </button>
  </form> -->
    

     <?php
    
/*

    //<a href='#'>
    <i class='bx bxs-trash'></i>
    <span class='links_name'>corbeille</span>
    <span id='clickableAwesomeFont'><i class='bx bxs-trash'></i></span>
  </a>*/


  
    $mail=$_SESSION['user_name'];
    //echo $mail;
    $sql = "SELECT id_mes ,id_send,object,message,date_envoi FROM mails WHERE mail_get='$mail' and supp=0";
    $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    while( $rows = mysqli_fetch_assoc($result) ) { 
     # echo $rows["src"];
     $id_mess= $rows["id_mes"];
     $id_send=$rows['id_send'];
     $sql2="SELECT user_name FROM users WHERE id='$id_send'";
     $result2 = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));
     echo "<table class='table table-inbox table-hover'>
     <tbody>
     <tr class='unread'>";
         
        //  <td class='inbox-small-cells'><input type='checkbox' name='check' onclick='countCheckbox()' 
        //  value=' $id_mess'>  "
        
         
         
     
         echo"</td> <td class='inbox-small-cells'> <form action='favorie.php' method='post'>
         <a href='favorie.php?id=".$id_mess."'>
        <button style='border:none;background:none' type='submit' name='fav' value='".$id_mess."'>             
        <span  name='fav' id='clickableAwesomeFont'>
        <i style='font-size:30px' class='bx bx-heart'  width='100' height='100'></i>
       
        </span></button> 
                     
        </a>
        
       </form></td>";
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
         
         <form action='mailsupp.php' method='post'>
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