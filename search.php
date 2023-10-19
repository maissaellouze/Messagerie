<?php

include "db_conn.php";
session_start();


 // Récupère la recherche
 $recherche = isset($_POST['search']) ? $_POST['search'] : '';


 $q = $conn->query(
 "SELECT user_name FROM users
  WHERE user_name LIKE '%$recherche%' ");


 while( $r = mysqli_fetch_array($q)){
 echo "Résultat de la recherche: ".$r['user_name']." <br />";
 }
?>