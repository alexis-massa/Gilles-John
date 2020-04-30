<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gilles & John - Gilets</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/cart.css">

    <link rel="stylesheet" href="https://mxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>

<body>
    <?php include '../commun/header.php' ?>

    <main>
        <div class="container">
            <?php
            // Connection à la BDD (pas toucher)
            $db_connection = pg_connect("host=localhost dbname=PPE_Groupe5 user=postgres password=postgre");

            //Fonction execution d'une requête
            function executer($param_connection, $param_req)
            {
                // Résultat de la requète dans une variable
                $result = pg_exec($param_connection, $param_req);
                //S'il y a un résultat (erreur dans la requete)
                if ($result) {
                    //Si le résultat fait plus que 0 lignes
                    if (pg_num_rows($result) > 0) {
                        //On parcours le résultat et on met les lignes dans un tableau
                        while ($resultat = pg_fetch_assoc($result)) {
                        }
                    }
                }
                return $resultat;
            }

            // Requète : récupère tout le contenu de la table produits
            $req_produits = 'SELECT * FROM produit ORDER BY id_prod ASC';

            $req_image = 'SELECT chemin_img FROM produit INNER JOIN image on image.id_img = produit.id_img WHERE id_prod = :produit';
            $image->bindParam(':produit', $produits['id_prod']);

            // Résultat de la requète dans une variable
            $produit = pg_exec($db_connection, $req_produits);

            //S'il y a un résultat (erreur dans la requete)
            if ($result) {
                //Si le résultat fait plus que 0 lignes
                if (pg_num_rows($result) > 0) {
                    //On parcours le résultat et on met les lignes dans un tableau
                    while ($product = pg_fetch_assoc($result)) {
                        //On affiche les produits
            ?>

                        <div class="col-sm-4 col-md-3">
                            <form method="POST" action="gilets.php?action=add&id=<?php echo $product['id_prod']; ?>">
                                <div class="products">
                                    <img src="<?php pg_exec($db_connection, $req_image) ?>">
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
</body>

</html>