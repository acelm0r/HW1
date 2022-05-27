<?php
   include 'config.php';
   session_start();

   if(!isset($_SESSION['user_name'])){
      header('location:login.php');
   }

   if(isset($_POST['submit'])){
            $conn = mysqli_connect($host, $user, $password, $db);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $text = mysqli_real_escape_string($conn, $_POST['text_content']);
            $query = "INSERT INTO REVIEWS (author, title, text_content) VALUES ('" . $_SESSION['user_id'] . "', '$title', '$text')";
            $res = mysqli_query($conn, $query);
            echo '<script>alert("Commento salvato!")</script>';
   }
?>

<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <link rel='icon' type='image/png' href='images/favicon.png'>
      <link rel='stylesheet' href="./styles/create_review.css">
      <title>Netfflix - Scrivi un commento</title>
   </head>

   <body>
   <div class="overlay"></div>
      <div class="topnav" id="myTopnav">
         <div class="logo">
            <a href="home.php"><img src="images/netfflix.png"></a>
         </div>
         <a href="create_review.php">Scrivi un commento</a>
         <a href="search_film.php">Cerca</a>
         <div class ="logout">Non sei <?php echo $_SESSION['user_name']; ?>? <a href="logout.php">Esci</a></div>
         <a href="javascript:void(0);" class="icon" onclick="myFunction()">
         <i class="fa fa-bars"></i>
         </a>
      </div>

      <div class="container">
          <h1>Scrivi una recensione</h1>
            <form method="post" action="">
                <input type="text" name="title" placeholder="Titolo"/>
                <textarea name="text_content" rows="40" cols="3"></textarea>
                <input type="submit" class="submit" name="submit" value="Salva commento"/>
            </form>
            <div class="message" hidden> Il commento è stato salvato con successo</div>
      </div>
      <footer> 
        	<div>Netfflix non è un marchio registrato</div>
        	<div>Powered by<a href="https://github.com/acelm0r"> Carmelo Pillera · O46001367</a></div>
        	<div><a href="https://perceivelab.github.io/web-programming-course/">Web Programming 2022</a></div>
        </footer>
</body>
</html>
                


                  
