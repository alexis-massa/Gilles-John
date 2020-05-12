<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gilles & John - Tableau de bord administrateur</title>
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
    <link rel="stylesheet" href="../../css/administrateur.css">
</head>

<body>
    <?php 
        // Connections à la BDD (pas toucher)
        $db_connection = pg_connect("host=localhost dbname=PPE_Groupe5 user=postgres password=postgre");
        //Connection par PDO pour les requêtes préparées
        $db_pdo = new PDO("pgsql:host=localhost; dbname=PPE_Groupe5", "postgres", "postgre");

        //Requete couleur
        $req_couleur = $db_pdo->query("SELECT lib_coul FROM couleur");
        $res_couleur = $req_couleur->fetch();

        //Requete taille
        $req_taille = $db_pdo->query("SELECT lib_taille FROM taille");
        $res_taille = $req_taille->fetch();
    ?>
    <main>
        <aside class="sidebar">
            <h1>admin panel</h1>
            <hr>
            <h2>Main</h2>
            <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z"
                    clip-rule="evenodd" />
            </svg>
            <span id="button-utilisateurs">Paramétrages des utilisateurs</span> <br>
            <svg class="bi bi-tools" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M0 1l1-1 3.081 2.2a1 1 0 01.419.815v.07a1 1 0 00.293.708L10.5 9.5l.914-.305a1 1 0 011.023.242l3.356 3.356a1 1 0 010 1.414l-1.586 1.586a1 1 0 01-1.414 0l-3.356-3.356a1 1 0 01-.242-1.023L9.5 10.5 3.793 4.793a1 1 0 00-.707-.293h-.071a1 1 0 01-.814-.419L0 1zm11.354 9.646a.5.5 0 00-.708.708l3 3a.5.5 0 00.708-.708l-3-3z"
                    clip-rule="evenodd" />
                <path fill-rule="evenodd"
                    d="M15.898 2.223a3.003 3.003 0 01-3.679 3.674L5.878 12.15a3 3 0 11-2.027-2.027l6.252-6.341A3 3 0 0113.778.1l-2.142 2.142L12 4l1.757.364 2.141-2.141zm-13.37 9.019L3.001 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"
                    clip-rule="evenodd" />
            </svg>
            <span id="button-produits">Paramétrages des produits</span>
        </aside>

        <div class="header">
            <div class="head">
                <h3>Tableau de bord</h3>
                <span>Nom Admin</span>
                <svg class="bi bi-person" width="1.8em" height="1.8em" viewBox="0 0 16 16" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z"
                        clip-rule="evenodd" />
                </svg>
            </div>

            <div class="corps">
                <section class="Produits">
                    <div class="ajoutProduits">
                        <h4>Ajout de produit</h4>
                        <input type="text" name="nomProd" id="nomProd" placeholder="nom produit">
                        <span>Type produit: </span>
                        <select name="typeProd" id="typeProd">
                            <option value="gilet">gilet</option>
                            <option value="accessoire">accessoire</option>
                        </select>
                        <input type="text" name="idImg" id="idImg" placeholder="Id de l'image">
                        <input type="text" name="cheminImg" id="cheminImg" placeholder="ex:img/produit/1.png">
                        <input type="text" name="titreImg" id="titreImg" placeholder="Titre de l'image">
                        <span>Couleur produit: </span>
                        <select name="couleurProd" id="couleurProd">
                            <?php
                            while( $res_couleur = $req_couleur->fetch()){ ?>
                            <option value="<?php echo $res_couleur['lib_coul'] ?>"><?php echo $res_couleur['lib_coul'] ?></option>
                            <?php } ?>
                        </select> <br>
                        <span>Taille produit</span>
                        <select name="tailleProd" id="tailleProd">
                            <?php
                            while( $res_taille = $req_taille->fetch()){ ?>
                            <option value="<?php echo $res_taille['lib_taille'] ?>"><?php echo $res_taille['lib_taille'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" name="qte_StockProd" id="qte_StockProd" placeholder="Quantitée disponible">
                        <input type="text" name="prix_VenteProd" id="prix_VenteProd" placeholder="Prix du produit">
                        <input type="button" value="Valider produit">
                        </div>

                        <div class="modifProduits">
                            <h4>Modification de produit</h4>
                        </div>
                    </section>


                    <section class="utilisateurs">
                        Section utilisateurs en TRAVAUX
                    </section>
            </div>

        </div>
    </main>
<script src="../../js/administrateur.js"></script>                                
</body>

</html>