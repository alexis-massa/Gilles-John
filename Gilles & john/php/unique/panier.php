<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gilles & John - Votre panier</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/63ffd472bc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/panier.css">
</head>

<body>
    <?php include '../commun/header.php' ?>

    <main>

        <?php

        session_start();
        $product_ids = array();

        //Vérifier que le bouton d'ajout au panier à été activé
        if (filter_input(INPUT_POST, 'add_to_cart')) {
            //Si le panier existe déja
            if (isset($_SESSION['shopping_cart'])) {
                //Combien de produit deja dans le panier
                $count = count($_SESSION['shopping_cart']);
                //Tableau clé - id produit (se repérer dans les produits)
                $product_ids = array_column($_SESSION['shopping_cart'], 'id');

                //Si le produit n'est pas dans le panier
                if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {
                    //On l'ajoute
                    $_SESSION['shopping_cart'][$count] = array(
                        'id' => filter_input(INPUT_GET, 'id'),
                        'name' => filter_input(INPUT_POST, 'name'),
                        'price' => filter_input(INPUT_POST, 'price'),
                        'couleur' => filter_input(INPUT_POST, 'radio_coul'),
                        'taille' => filter_input(INPUT_POST, 'radio_taille'),
                        'quantity' => filter_input(INPUT_POST, 'quantity')
                    );
                }
                //Sinon (le produit est deja dans le panier), 
                else {
                    //On parcourt les clé de produits
                    for ($i = 0; $i < count($product_ids); $i++) {
                        //Quand les clés sont identique (les produits ajouté-enregistré correspondent)
                        if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) {
                            //On ajoute la quantité demandée à la quantité déja enregistrée
                            $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                        }
                    }
                }
            } else {
                //Si le panier n'existe pas créer un produit avec la clé 0
                //Créer array avec les valeurs du formulaire, qui commence à la clé et on le rempli avec les valeurs
                $_SESSION['shopping_cart'][0] = array(
                    'id' => filter_input(INPUT_GET, 'id'),
                    'name' => filter_input(INPUT_POST, 'name'),
                    'price' => filter_input(INPUT_POST, 'price'),
                    'couleur' => filter_input(INPUT_POST, 'radio_coul'),
                    'taille' => filter_input(INPUT_POST, 'radio_taille'),
                    'quantity' => filter_input(INPUT_POST, 'quantity')
                );
            }
        }

        if (filter_input(INPUT_GET, 'action') == 'delete') {
            //Parcourir les produits du panier jusqu'a une correspondance avec l'id cliqué
            foreach ($_SESSION['shopping_cart'] as $key => $produit) {
                if ($produit['id'] == filter_input(INPUT_GET, 'id')) {
                    //Enlever le produit correspondant
                    unset($_SESSION['shopping_cart'][$key]);
                }
            }
            //Mettre à jour le tableau de clés
            $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
        }

        //pre_r($_SESSION);
        function pre_r($array)
        {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }

        ?>

        <!-- Panier -->
        <div style="clear:both">
            <br>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th colspan="5">
                            <h3>Détails du panier</h3>
                        </th>
                    </tr>
                    <tr>
                        <th width="30%">Nom</th>
                        <th width="10%">Quantité</th>
                        <th width="15%">Couleur</th>
                        <th width="15%">Taille</th>
                        <th width="10%">Prix</th>
                        <th width="10%">Total</th>
                        <th width="10%">Action</th>
                    </tr>
                    <?php
                    if (!empty($_SESSION['shopping_cart'])) {
                        $total = 0;
                        foreach ($_SESSION['shopping_cart'] as $key => $produit) {

                    ?>
                            <tr>
                                <td><?php echo $produit['name']; ?></td>
                                <td><?php echo $produit['quantity']; ?></td>
                                <td><?php echo $produit['couleur']; ?></td>
                                <td><?php echo $produit['taille']; ?></td>
                                <td><?php echo number_format($produit['price'] * $produit['price'], 2); ?></td>
                                <td>
                                    <a href="panier.php?action=delete&id=<?php echo $produit['id']; ?>">
                                        <div class="btn-danger">Retirer</div>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $total = $total + ($produit['quantity'] * $produit['price']);
                        }
                        ?>
                        <tr>
                            <td colspan="3">Total</td>
                            <td><?php echo number_format($total, 2); ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <?php
                                if (isset($_SESSION['shopping_cart'])) {
                                    if (count($_SESSION['shopping_cart'])) {
                                ?>
                                        <a href="#" class="button">Valider</a>
                                <?php
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>

    </main>

    <?php include '../commun/footer.php' ?>
</body>

</html>