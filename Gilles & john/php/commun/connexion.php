
        <p>
            Pseudo <br><input type="id" name="id" /><br>
            Mot de passe<br> <input type="password" name="mdp" /><br>
            Adresse mail <br><input type="mel" name="adresse mail"/><br>
            <br>
            <input type="submit" value="Valider" />
        </p>
    </form>

    Entrez votre identifiant et votre mot de passe.<br>
    <br>
    <form action="login.php" method="post">
        <p>
            <input type="id" name="id" /><br>
            <input type="password" name="mdp" />
            <input type="submit" value="Valider" />
        </p>
    </form>
    <br>
    <p><b>Inscrivez vous <a href="inscription.html">ici.
                </a>

        <?php
        if (isset($_POST['id']) AND $_POST['id'] == "" )
        if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] == "" )
        {
        ?>

        <h1>Accès:</h1>
        <p><strong><a style="color:#BBBBBB" href=""><FONT size="3pt"><b>Espace administrateur</b></FONT></a></strong></p>

        <p>
            Cette page est reservee aux administrateurs.
        </p>
                    
        <?php
        }
        else
        {
        echo '<p>Mot de passe incorrect</p>';
        }
        ?>
                    
        <?php
        if (isset($_POST['id']) AND $_POST['id'] == "" )
        if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] == "" )
        {
        ?>