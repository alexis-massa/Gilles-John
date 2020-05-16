<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gilles & John - Contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/63ffd472bc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/contact.scss">
</head>

<body>
    <?php include '../commun/header.php' ?>
    <h1 id="titre">Formulaire de contact</h1>
    <main>
        <form name="Formulaire de contact" action="mailto:achot.barseghyna@gmail.com" method="post" enctype="text/plain">
            <div class="row">
                <span>
                    <input class="clean-slide" id="prenom" type="text" placeholder="Votre prénom" pattern="[a-zA-Z]*" />
                    <label for="name">Prénom</label>
                </span>
                <span>
                    <input class="clean-slide" id="nom" type="text" placeholder="Votre nom" pattern="[a-zA-Z]*" />
                    <label for="name">Nom</label>
                </span>
            </div>
            <div class="row">
                <span>
                    <input class="clean-slide" id="email" type="email" placeholder="Votre email" />
                    <label for="email">Email</label>
                </span>
            </div>
            <div class="row">
                <span>
                    <input class="clean-slide" id="objet" type="text" placeholder="Objet du message" />
                    <label for="objet">Objet</label>
                </span>
            </div>
            <div class="row">
                <span>
                    <textarea name="message" id="message" cols="61" rows="10" placeholder="Message"></textarea>
                </span>
            </div>
            <input id="submit" type="submit" value="ENVOYER">
        </form>
    </main>

    <?php include '../commun/footer.php' ?>
    <script src="../../scripts/header.js"></script>
</body>

</html>