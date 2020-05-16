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
        if (isset($_REQUEST['login_uti'], $_REQUEST['email_uti'], $_REQUEST['mdp_uti'])) {

            $username = stripslashes($_REQUEST['login_uti']);
            $username = pg_escape_string($conn, $username);

            $email = stripslashes($_REQUEST['email_uti']);
            $email = pg_escape_string($conn, $email);

            $password = stripslashes($_REQUEST['mdp_uti']);
            $password = pg_escape_string($conn, $password);

            $query = "INSERT into `Utilisateurs` (login_uti, email_uti, mdp_uti)
              VALUES ('$username', '$email', '" . hash('sha256', $password) . "')";

            $res = $req_utilisateurs($conn, $query);
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

        $db_connection = pg_connect("host=localhost dbname=PPE_Groupe5 user=postgres password=postgre");
        
            $db_pdo = new PDO("pgsql:host=localhost; dbname=PPE_Groupe5", "postgres", "postgre");

        if ($conn === false) {
            die("ERREUR : Impossible de se connecter. " . pg_last_error());
        }
        session_start();
        if (isset($_POST['login_uti'])) {
            $username = stripslashes($_REQUEST['login_uti']);
            $username = pg_escape_string ($conn, $username);
            $password = stripslashes($_REQUEST['mdp_uti']);
            $password = pg_escape_string ($conn, $password);
            $req_utilisateurs = "SELECT * FROM `users` WHERE username='$username' and password='" . hash('sha256', $password) . "'";
            $result = $req_utilisateurs($conn, $query) or die(pg_last_error());
            $rows = pg_num_rows($result);
            if ($rows == 1) {
                $_SESSION['login_uti'] = $username;
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
        </form>
            <?php if (!empty($message)) { ?>
                <p class="errorMessage"><?php echo $message; ?></p>
                <div class="sucess">
                    <h1>Bienvenue <?php echo $_SESSION['login_uti']; ?>!</h1>
                <p>C'est votre tableau de bord.</p>
                <a href="logout.php">Déconnexion</a>
            </div>
    </body>
</html>