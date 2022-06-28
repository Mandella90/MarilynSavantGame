<script src="js/scripts.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<?php
include "functions.php";
session_start();

 $updateWinsSame = $_POST['sWinsSame'];
 $updateGamesSame = $_POST['sGamesSame'];
 $updateWinsChange = $_POST['sWinsChange'];
 $updateGamesChange = $_POST['sGamesChange'];


 if ($updateWinsSame > 0){
     mysqli_query($conn, "UPDATE scores SET AllWinsSame = AllWinsSame+1, AllGamesSame = AllGamesSame+1;");
     echo "eoop";
     $updateWinsSame = 0;

 } else if($updateWinsChange > 0){
     mysqli_query($conn, "UPDATE scores SET AllWinsChange = AllWinsChange+1, AllGamesChange = AllGamesChange+1;");
     echo "hoop";
     $updateWinsChange = 0;

 } else if($updateGamesSame > 0){
     mysqli_query($conn, "UPDATE scores SET AllGamesSame = AllGamesSame+1;");
     echo "yoop";
     $updateGamesSame = 0;

 } else if($updateGamesChange > 0){
     mysqli_query($conn, "UPDATE scores SET AllGamesChange = AllGamesChange+1;");
     echo "woop";
     $updateGamesChange = 0;

 }else{
     die("bummer");
 }
?>