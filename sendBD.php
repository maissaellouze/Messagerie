<?php

/*
$conn = new PDO( 'mysql:host=localhost;dbname=projet_mess', 'root', '');
	if(!$conn){
		die("Error: Failed to coonect to database!");
	}
	
	if(ISSET($_POST['envoyer'])){
		try{
			$email = $_POST['email'];
			$object = $_POST['object'];
			$message = $_POST['message'];
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if (empty($email)) {
				echo "<script>
				alert('saisir une adresse mail')
				</script>";
			}
			$sql = "INSERT INTO `mails` (`mail_get`, `object`, `message`) VALUES ('$email', '$object', '$message')";
			$conn->exec($sql);
			echo "hello";
		}catch(PDOException $e){
			echo $e->getMessage();
		}

		$conn = null;
 
		header('location: home.php');
	}
	




	*/

	require_once 'db_conn.php';
	session_start();
	/*$conn = new PDO( 'mysql:host=localhost;dbname=projet_mess', 'root', '');
	if(!$conn){
		die("Error: Failed to coonect to database!");
	}*/
		if(ISSET($_POST['envoyer'])){

			function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
			}
			$email = validate($_POST['email']);
			$object = validate($_POST['object']);
			$message = validate($_POST['message']);
			if (empty($email)) {
				echo "<script>
				alert('saisir une adresse mail')
				window.location.replace('send.php')
				</script>";

			}else if(empty($object)){
				echo "<script>
				alert('saisir un objet')
				window.location.replace('send.php')
				</script>";
				
			}
			else if(empty($message)){
				echo "<script>
				alert('saisir un message ')
				window.location.replace('send.php')
				</script>";

			}
			
			else{
				  $num=$_SESSION['id'];
				$email=$_POST['email'];
				//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				echo "<script>
						alert($email)
					</script>";
					$sql = "INSERT INTO `mails` (`id_send`, `mail_get`,`object`, `message`) VALUES ('$num','$email', '$object', '$message')";
					//$conn->exec($sql);
					$result = mysqli_query($conn, $sql);
					echo "<script>
					alert('votre mail a éte bien envoyée')
					window.location.replace('home.php')
					</script>";
				}


			}
			
		else{
			header("Location: home.php");
			exit();
		}

    ?>