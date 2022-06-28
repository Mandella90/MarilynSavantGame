<?php 
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "phpsavant";
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

//// USED TO CREATE JAVASCRIPT VARIABLES - TO POST 'ALL-TIME' SCORES
$winsSame = mysqli_fetch_array((mysqli_query($conn, "SELECT AllWinsSame FROM scores;")))['AllWinsSame'];

$gamesSame = mysqli_fetch_array((mysqli_query($conn, "SELECT AllGamesSame FROM scores;")))['AllGamesSame'];

$winsChange = mysqli_fetch_array((mysqli_query($conn, "SELECT AllWinsChange FROM scores;")))['AllWinsChange'];

$gamesChange = mysqli_fetch_array((mysqli_query($conn, "SELECT AllGamesChange FROM scores;")))['AllGamesChange'];

?>

<script>
    var allWinsSame = "<?php echo $winsSame; ?>";
    var allGamesSame = "<?php echo $gamesSame; ?>";
    var allWinsChange = "<?php echo $winsChange; ?>";
    var allGamesChange = "<?php echo $gamesChange; ?>";
        
    function ajaxUpdate(){
       $.ajax({
    type: "POST",
    url: "results.php",
    data:{sWinsSame, sWinsSame, 
        sGamesSame, sGamesSame,
        sWinsChange, sWinsChange,
        sGamesChange, sGamesChange },
        success: function(data){
            console.log(data); 
               sWinsSame = 0;
               sGamesSame = 0;
               sWinsChange = 0;
               sGamesChange = 0;
               } 
           })
       }
</script>
