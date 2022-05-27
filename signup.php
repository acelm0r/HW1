<?php
include 'config.php';

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
    if(strlen($_POST["password"]) > 5){
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
        $query = " SELECT * FROM USERS WHERE email = '$email' && password = '$pass' ";
        $res = mysqli_query($conn, $query);
        if(mysqli_num_rows($res) > 0){
            $error[] = "L'email è già associata ad un profilo Netfflix!";
        } else{
            if($pass != $cpass){
                $error[] = "Le due password non corrispondono!";
            }else{
            $insert = "INSERT INTO USERS (username, email, password) VALUES('$username','$email','$pass')";
            mysqli_query($conn, $insert);
            header("Refresh:3; Location:'login.php'"); 
              echo '<script>alert("Registrazione effettuata con successo!")</script>';
            }
        } 
   } else {
            $error[] = "La password deve avere minimo 6 caratteri!";
   }
}
;
?>

<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' href='./styles/signup.css'>
        <link rel='icon' type='image/png' href="./images/favicon.png">
        <script src="./scripts/signup.js" defer="true"></script>
        <title>Netfflix - Iscriviti</title>
    </head>
    <body>
        <div class="top">
            <div class="overlay"></div>
            <div class="logo">
                <img src="images/netfflix.png">
            </div>

            <div class="contenuto"> 
                <form name='signup' method='post' enctype='multipart/form-data' autocomplete='off'>
                    <h1>Benvenuto</h1>
                    <h2>Iscriviti</h2>
                    <?php
                        if(isset($error)){
                        foreach($error as $error){
                        echo '<span class="error">'.$error.'</span>';
                            };
                        };
                    ?>
                    <input type='text' name='username' placeholder="Username" required>
                    <input type='email' name='email' placeholder="Email" required>
                    <input type='password' name='password' placeholder="Password" required>
                    <input type='password' name='cpassword' placeholder="Conferma la password" required>
                    <input type='submit' class='submit' name='submit' value='Registrati'>
                    <div class="login">Hai già un account Netfflix? <a href="login.php">Accedi</a></div>
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