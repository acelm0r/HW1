<?php
   include 'config.php';
   session_start();

   if(!isset($_SESSION['user_name'])){
      header('location:login.php');
   }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
        <link rel='icon' type='image/png' href='images/favicon.png'>
        <link rel="stylesheet" href="./styles/search_film.css">
        <script src="./scripts/search_film.js" defer="true"></script>
        <title>Netfflix - Search</title>
    </head>

    <body>   
      <div class="topnav" id="myTopnav">
         <div class="logo">
            <a href="home.php"><img src="images/netfflix.png"></a>
         </div>
         <a href="create_review.php">Scrivi una recensione</a>
         <a href="search_film.php">Cerca</a>
         <div class ="logout">Non sei <?php echo $_SESSION['user_name']; ?>? <a href="logout.php">Esci</a></div>
         <a href="javascript:void(0);" class="icon" onclick="myFunction()">
         <i class="fa fa-bars"></i>
         </a>
      </div>

      <div class="top-image">
         <div class="overlay"></div>
      </div>

      <div class="container">
        <h1>Vuoi cercare un contenuto? Usa uno dei nostri database</h1>
        <form name="cerca" id="cerca">
            <label><input type='text' name='content' id='content'></label>
            <select name="tipo" id="tipo">
                <option value='film'>Film - IMDb</option>
                <option value='serie_tv'>Serie TV - IMDb</option>
                <option value='anime'>Anime - Kitsu</option>
            </select>
            <label>&nbsp;<input class="submit" type='submit'></label>
        </form>
      </div>
        
        <article id="risultati"></article>

        <footer> 
        	<div>Netfflix non è un marchio registrato</div>
        	<div>Powered by<a href="https://github.com/acelm0r"> Carmelo Pillera · O46001367</a></div>
        	<div><a href="https://perceivelab.github.io/web-programming-course/">Web Programming 2022</a></div>
        </footer>
    </body>
</html>
