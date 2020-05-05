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
    <script src="https://kit.fontawesome.com/63ffd472bc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/magasin.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

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

            //$req_produits = 'SELECT * FROM produit INNER JOIN image ON image.id_img = produit.id_img INNER JOIN stock ON stock.id_prod = produit.id_prod ORDER BY produit.id_prod ASC;';
            $req_produits = 'SELECT * FROM produit ORDER BY produit.id_prod ASC;';





            $req_image = $db_pdo->prepare('SELECT chemin_img FROM image WHERE id_img = ?');
            $idImg = '';
            $req_image->bindParam(1, $idImg);
            
            
            
            // Résultat de la requète dans une variable
            $result = pg_exec($db_connection, $req_produits);
            //S'il y a un résultat (pas d'erreur dans la requete)
            if ($result) {
                //Si le résultat fait plus que 0 lignes
                if (pg_num_rows($result) > 0) {
                    //On parcourt toutes les lignes et on les ajoute dans un tableau associatif
                    while ($produit = pg_fetch_assoc($result)) {
                        //Opérations sur la requête ici :
                                                
                        echo $produit['id_img'];
                        $idImg = $produit['id_img'];
                        $req_image->execute();

                       $image = $req_image->fetch();

            ?>

                        <div class="col-sm-4 col-md-3">
                            <form method="POST" action="gilets.php?action=add&id=<?php echo $produit['id_prod']; ?>">
                                <div class="products">
                                    <img src="<?php echo $image['chemin_img']; ?>" class="img-responsive">
                                    <h4 class="text-info"><?php echo $produit['nom_prod']; ?></h4>
                                    <h4><?php echo $produit['prix_vente']; ?></h4>
                                    <input type="text" name="quantity" class="form-control" value="1">
                                    <input type="hidden" name="name" class="form-control" value="<?php echo $produit['nom_prod']; ?>">
                                    <input type="hidden" name="price" class="form-control" value="<?php //echo $produit['prix_vente']; ?>">
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
</body>

</html>