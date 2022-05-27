<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){
   $conn = mysqli_connect($host, $user, $password, $db);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = "SELECT * FROM USERS WHERE email = '$email' && password = '$pass'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
    	$row = mysqli_fetch_array($result);
    	$_SESSION['user_name'] = $row['username'];
		$_SESSION['user_id'] = $row['id'];
    	header("Location:home.php");
    }else{
      $error[] = "L'email o la password non sono corretti";
   }
};
?>


<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta charset="utf-8">
    	<link rel="stylesheet" href="./styles/login.css">
    	<link rel="icon" type="image/png" href="images/favicon.png">
    	<title> Netfflix - Accedi </title>
	</head>
	<body>
    	<div class="top">
        	<div class="overlay"></div>
        	<div class="logo">
            	<img src="images/netfflix.png">
        	</div>

    		<div class="contenuto">
            	<form name="login" method="post">
                	<h1> Recensisci film, serie tv e tanto altro</h1>
                	<h2> Accedi </h2> 
            
            	    <?php
                	    if (isset($error)){
                    	    foreach($error as $error){
                        	    echo "<span class='error'>$error</span>";
                        	};
                    	};
                	?>

	                <input type='email' name='email' placeholder="Inserisci la tua email" required>
    	            <input type='password' name='password' placeholder="Inserisci la tua password" required>
        	        <input type='submit' class='submit' name='submit' value='Accedi'>

	                <div class='signup'>Prima volta su Netfflix? <a href="signup.php">Registrati</a></div>
    	            <p>Questa pagina non è protetta da Google reCAPTCHA per garantire che tu non sia un bot.</p>
        	    </form>
        	</div>
		</div>
        <footer> 
        	<div>Netfflix non è un marchio registrato</div>
        	<div>Powered by<a href="https://github.com/acelm0r"> Carmelo Pillera · O46001367</a></div>
        	<div><a href="https://perceivelab.github.io/web-programming-course/">Web Programming 2022</a></div>
        </footer>
   </body>
</html>