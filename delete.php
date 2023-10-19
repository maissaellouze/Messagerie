<?php
	    session_start();
        include "db_conn.php";
        
        //echo"hi";
          //$mail=$_SESSION['user_name'];
          //$id=$_POST['delete'];
	
	if(ISSET($_POST['delete'])){
		if(ISSET($_POST['check'])){
			$checked = $_POST['check'];
			for($i=0; $i < count($checked); $i++){
                $id = $checked[$i];
				$sql = "UPDATE mails SET supp='1'  WHERE id_mes='$id'";
    $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
 
    echo"
    <script>
    alert('votre mail est deplacer dans le corbeille')
    window.location.replace('home.php')

     </script>";
            }
	}

   
 }


?>