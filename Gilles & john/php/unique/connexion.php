<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="connexion.css" />
    </head>
    <body>
        <?php
        if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])) {

            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($conn, $username);

            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($conn, $email);

            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn, $password);

            $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email', '" . hash('sha256', $password) . "')";

            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
            }
        } else {
            ?>
            <form class="box" action="" method="post">
                <h1 class="box-logo box-title"></h1>
                <h1 class="box-title">S'inscrire</h1>
                <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
                <input type="text" class="box-input" name="email" placeholder="Email" required />
                <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
                <input type="submit" name="submit" value="S'inscrire" class="box-button" />
                <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
            </form>
        <?php } ?>
        <?php
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'registration');

        $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if ($conn === false) {
            die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
        }
        session_start();
        if (isset($_POST['username'])) {
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($conn, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn, $password);
            $query = "SELECT * FROM `users` WHERE username='$username' and password='" . hash('sha256', $password) . "'";
            $result = mysqli_query($conn, $query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            if ($rows == 1) {
                $_SESSION['username'] = $username;
                header("Location: index.php");
            } else {
                $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            }
        }
        ?>
        <form class="box" action="" method="post" name="login">
            <h1 class="box-logo box-title"></h1>
            <h1 class="box-title">Connexion</h1>
            <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
            <input type="password" class="box-input" name="password" placeholder="Mot de passe">
            <input type="submit" value="Connexion " name="submit" class="box-button">
            <p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
            <?php if (!empty($message)) { ?>
                <p class="errorMessage"><?php echo $message; ?></p>
                ?>
                <div class="sucess">
                    <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
                <p>C'est votre tableau de bord.</p>
                <a href="logout.php">Déconnexion</a>
            </div>
    </body>
</html>