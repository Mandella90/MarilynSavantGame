<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marilyn von Savant</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>  
</head>
    <?php
        include 'functions.php';
        session_start();
    ?>
<body>
    
    
    <div class="header">
        <div class="login">
            <p>Find the ruby!</p>
        </div>       
    </div>

    <section class="card-set">
        <div class="card answer-right">
            <img class="front-face" src="images/card-right.JPG" alt="right">
            <img class="back-face" src="images/card-back.jpg" alt="back">
        </div>
        <div class="card answer-wrong1">
            <img class="front-face" src="images/card-wrong.JPG" alt="wrong">
            <img class="back-face" src="images/card-back.jpg" alt="back">
        </div>
        <div class="card answer-wrong2">
            <img class="front-face" src="images/card-wrong2.JPG" alt="wrong">
            <img class="back-face" src="images/card-back.jpg" alt="back">
        </div>
    </section>

    <div class="footer">
         <div class="scores">
            <label id="session-score"></label>
            <label id="all-time-score"></label>
        </div>        
    </div>
    
    <script src="js/scripts.js"></script>
</body>
</html>


