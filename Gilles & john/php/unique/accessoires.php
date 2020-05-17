<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gilles & John - Accessoires</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/63ffd472bc.js" crossorigin="anonymous"></script>
    <script src="../../scripts/magasin.js"></script>
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/magasin.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Prêt à faire une requête en AJAX pour ne pas avoir à revenir sur la page de produits à chaque fois -->
    <!-- <script>
        var httpRequest = new XMLHttpRequest();


        httpRequest.onreadystatechange = traitementReponse;
        function traitementReponse() {
            // instructions de traitement de la réponse
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                // tout va bien, la réponse a été reçue
                if (httpRequest.status === 200) {
                    // parfait !
                    alert('ca marche normalement');
                } else if (httpRequest.status === 404) {
                    alert("erreur page not found");
                    // il y a eu un problème avec la requête
                }
            } else {
                // pas encore prête
            }

        };
        function addPanier($value) {
            httpRequest.open('POST', './panier.php?action=add&id=<?php echo $produit['id_prod']; ?>');
            httpRequest.send();
        }
    </script> -->
</head>

<body>
    <?php include '../commun/header.php' ?>

    <main>
        <div class="container">
            <?php
            // Connections à la BDD (pas toucher)
            $db_connection = pg_connect("host=localhost dbname=PPE_Groupe5 user=postgres password=postgre");
            //Connection par PDO pour les requêtes préparées
            $db_pdo = new PDO("pgsql:host=localhost; dbname=PPE_Groupe5", "postgres", "postgre");

            //Requete produit
            $req_produits = "SELECT * FROM produit WHERE typ_prod = 'accessoire' ORDER BY produit.id_prod ASC;";

            //Requete chemin images
            $idImg = '';

            $req_chemImg = $db_pdo->prepare('SELECT chemin_img FROM image WHERE id_img = ?;');
            $req_chemImg->bindParam(1, $idImg);

            //Requete titre images
            $req_titreImg = $db_pdo->prepare('SELECT titre_img FROM image WHERE id_img = ?;');
            $req_titreImg->bindParam(1, $idImg);

            $idProd = '';

            //Requete couleur
            $req_couleur = $db_pdo->prepare('SELECT distinct lib_coul FROM couleur INNER JOIN stock ON couleur.id_coul = stock.id_coul WHERE id_prod = ?;');
            $req_couleur->bindParam(1, $idProd);

            //Requete taille
            $req_taille = $db_pdo->prepare('SELECT distinct lib_taille FROM taille INNER JOIN stock ON taille.id_taille = stock.id_taille WHERE id_prod = ?;');
            $req_taille->bindParam(1, $idProd);

            //Valeur choisies
            $idCoul = '';
            $idTaille = '';
            //Requete prix de vente (stock)
            $req_prixVente = $db_pdo->prepare('SELECT prix_vente FROM stock WHERE id_prod = ? AND id_coul = (SELECT id_coul FROM couleur WHERE lib_coul = ?) AND id_taille = (SELECT id_taille FROM taille WHERE lib_taille = ?);');
            $req_prixVente->bindParam(1, $idProd);
            $req_prixVente->bindParam(2, $libCoul);
            $req_prixVente->bindParam(3, $libTaille);

            // Résultat de la requète dans une variable
            $result = pg_exec($db_connection, $req_produits);
            //S'il y a un résultat (pas d'erreur dans la requete)
            if ($result) {
                //Si le résultat fait plus que 0 lignes
                if (pg_num_rows($result) > 0) {
                    //On parcourt toutes les lignes et on les ajoute dans un tableau associatif
                    while ($produit = pg_fetch_assoc($result)) {
                        //Opérations sur la requête ici :

                        $idImg = $produit['id_img'];

                        //Exécution de la requête chemin image
                        $req_chemImg->execute();
                        $chemImage = $req_chemImg->fetch();

                        //Exécution de la requête titre image
                        $req_titreImg->execute();
                        $titreImage = $req_titreImg->fetch();

                        $idProd = $produit['id_prod'];

                        //Requete couleur
                        $req_couleur->execute();

                        //Requete taille
                        $req_taille->execute();
            ?>

                        <div class="col-sm-4 col-md-3 ">
                            <form method="POST" action="panier.php?action=add&id=<?php echo $produit['id_prod']; ?>">
                                <div class="products shadow p-3 mb-5 bg-white rounded">
                                    <img src="<?php echo $chemImage['chemin_img']; ?>" alt="<?php echo $titreImage['titre_img'] ?>" class="img-responsive">
                                    <h4 class="text-info"><?php echo $produit['nom_prod']; ?></h4>
                                    <?php
                                    //Tant qu'il y a des lignes dans la requete, on affiche option lib_coul
                                    while ($couleur = $req_couleur->fetch()) {
                                    ?>
                                        <label><?php echo $couleur['lib_coul']; ?></label><input type="radio" name="radio_coul" class="radio" value="<?php echo $couleur['lib_coul']; ?>" checked>

                                    <?php
                                        //On simule des valeurs pour la req_prixVente
                                        $libCoul = $couleur['lib_coul'];
                                    }
                                    //Tant qu'il y a des lignes dans la requete, on affiche option lib_taille
                                    while ($taille = $req_taille->fetch()) {
                                    ?>
                                        <label><?php echo $taille['lib_taille'] ?></label><input type="radio" name="radio_taille" class="radio" value="<?php echo $taille['lib_taille']; ?>" checked>
                                    <?php
                                        //On simule des valeurs pour la req_prixVente
                                        $libTaille = $taille['lib_taille'];
                                    }
                                    ?>
                                    <!-- <script>
                                    //     checked();
                                     </script> -->
                                    <?php
                                    //Recupere valeur couleur choisie
                                    //$libCoul = $_POST['couls'];
                                    //Recupere valeur taille choisie
                                    //$libTaille = $_POST['tailles'];

                                    // echo $libCoul;
                                    // echo $libTaille;


                                    //Exécution de la requête prix
                                    $req_prixVente->execute();
                                    while ($prixVente = $req_prixVente->fetch()) {
                                        //Afficher prix
                                    ?>
                                        <h4><?php echo $prixVente['prix_vente']; ?>€</h4>
                                    <?php
                                    }
                                    ?>

                                    <label>Quantité :</label><input type="text" name="quantity" class="form-control" value="1">
                                    <input type="hidden" name="name" class="form-control" value="<?php echo $produit['nom_prod']; ?>">
                                    <?php
                                    $req_prixVente->execute();
                                    while ($prixVente = $req_prixVente->fetch()) {
                                        //Récupérer prix
                                    ?>
                                        <input type="hidden" name="price" class="form-control" value="<?php echo $prixVente['prix_vente']; ?>">
                                    <?php
                                    }
                                    ?>

                                    <input type="submit" name="add_to_cart" class="btn btn-info" value="Ajouter au panier">
                                </div>
                            </form>
                        </div>

            <?php
                    }
                }
            }
            ?>
        </div>
    </main>

    <?php include '../commun/footer.php' ?>

    <script src="../../scripts/header.js"></script>
</body>

</html>