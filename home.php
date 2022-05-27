<?php
   include 'config.php';
   session_start();

   if(!isset($_SESSION['user_name'])){
      header('location:login.php');
   }
?>

<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <link rel='stylesheet' href='./styles/home.css'>
      <link rel='icon' type='image/png' href='images/favicon.png'>
      <script src='./scripts/home.js' defer='true'></script>
      <title>Netfflix - Home</title>
   </head>

   <body>
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
      
      <div class="top-image">
         <div class="overlay"></div>
      </div>

      <div class="container">
         <?php  
            include('config.php');
            $query = "SELECT REVIEWS.id as id, USERS.username, REVIEWS.published, REVIEWS.title, REVIEWS.text_content FROM USERS JOIN REVIEWS ON REVIEWS.author = USERS.id ORDER BY REVIEWS.published DESC";
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result) > 0) {
              $sn=1;
              while($data = mysqli_fetch_assoc($result)) {
             ?>
             <div class="results">
               <div class="published"><?php echo $data['published']; ?> </div> 
               <div class="author"><?php echo $data['username']; ?> </div>
               <div class="title"><?php echo $data['title']; ?> </div>
               <div class="text_content"><?php echo $data['text_content']; ?> </div>
              </div>
             <?php
              $sn++;}} else { ?>
                <div class="error">
                 <p>Sezione commenti vuota</p>
                </div>
             <?php } ?>

      </div>

         <footer> 
        	<div>Netfflix non è un marchio registrato</div>
        	<div>Powered by<a href="https://github.com/acelm0r"> Carmelo Pillera · O46001367</a></div>
        	<div><a href="https://perceivelab.github.io/web-programming-course/">Web Programming 2022</a></div>
        </footer>
      </div>
   </body>
</html>

<?php mysqli_close($conn); ?>