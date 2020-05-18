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
    <script src="../../scripts/administrateur.js"></script>
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
                <div class="alert alert-success alert-produits" role="alert">
                    A simple success alert—check it out!
                 </div> 
                <section class="Produits">
                    <div class="ajoutProduits">
                        <form action="" method="POST">
                            <h4>Ajout de produit</h4>
                            <input type="text" name="nomProd" id="nomProd" placeholder="nom produit" required>
                            <!-- <input type="text" name="IdProd" id="IdProd" placeholder="ID produit" value="" required disabled> -->
                            <span>Type produit: </span>
                            <select name="typeProd" id="typeProd">
                                <option value="gilet">gilet</option>
                                <option value="accessoire">accessoire</option>
                            </select>
                            <input type="text" name="cheminImg" id="cheminImg" placeholder="ex:img/produit/1.png"
                                required>
                            <input type="text" name="titreImg" id="titreImg" placeholder="Titre de l'image" required>
                            <span>Couleur produit: </span>
                            <select name="couleurProd" id="couleurProd">
                                <?php
                            while( $res_couleur = $req_couleur->fetch()){ ?>
                                <option value="<?php echo $res_couleur['lib_coul'] ?>">
                                    <?php echo $res_couleur['lib_coul'] ?></option>
                                <?php } ?>
                            </select> <br>
                            <span>Taille produit</span>
                            <select name="tailleProd" id="tailleProd">
                                <?php
                            while( $res_taille = $req_taille->fetch()){ ?>
                                <option value="<?php echo $res_taille['lib_taille'] ?>">
                                    <?php echo $res_taille['lib_taille'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="text" name="qte_StockProd" id="qte_StockProd"
                                placeholder="Quantitée disponible" required>
                            <input type="text" name="prix_VenteProd" id="prix_VenteProd" placeholder="Prix du produit"
                                required>
                            <input type="submit" name="submit" value="Valider produit">
                            <?php
                            if (isset($_POST['submit'])) {

                                //Requete selected couleur
                                $SelectedCoul = $_POST['couleurProd'];
                                $req_selectCouleur = $db_pdo->query("SELECT id_coul FROM couleur where lib_coul = '$SelectedCoul'");
                                $res_selectCouleur = $req_selectCouleur->fetch();

                                //Requete selected taille
                                $SelectedTaille = $_POST['tailleProd'];
                                $req_selectTaille = $db_pdo->query("SELECT id_taille FROM taille where lib_taille = '$SelectedTaille'");
                                $res_selectTaille = $req_selectTaille->fetch();

                                //INSERT INTO IMAGE
                                $req_insertImg = $db_pdo->prepare("INSERT INTO image(chemin_img,titre_img)
                                VALUES(?,?)");
                                $req_insertImg->execute(array($_POST['cheminImg'],$_POST['titreImg']));

                                //Requete Image
                                $req_image = $db_pdo->query("SELECT max(id_img) FROM image");
                                $res_lastIdImg = $req_image->fetch();

                                //INSERT INTO PRODUIT
                                $req_insertProd = $db_pdo->prepare("INSERT INTO produit(nom_prod,typ_prod,id_img)
                                VALUES(?,?,?)");
                                $req_insertProd->execute(array($_POST['nomProd'],$_POST['typeProd'],$res_lastIdImg[0]));

                                //Requete ID PROD
                                $req_prod = $db_pdo->query("SELECT max(id_prod) FROM produit");
                                $res_lastIdProd = $req_prod->fetch();

                                //INSERT INTO STOCK
                                $req_insertStock = $db_pdo->prepare("INSERT INTO stock(id_prod,id_coul,id_taille,qte_stock,prix_vente)
                                VALUES(?,?,?,?,?)");
                                $req_insertStock->execute(array($res_lastIdProd[0],$res_selectCouleur['id_coul'],$res_selectTaille['id_taille'],$_POST['qte_StockProd'],$_POST['prix_VenteProd']));

                            }
                            ?>
                        </form>
                    </div>

                    <div class="modifProduits">
                        <?php 
                        //Requete produit
                        $req_Produit = $db_pdo->query("SELECT * FROM produit");
                        $res_Produit = $req_Produit->fetch();
                        $selectedProd = '';
                        ?>
                        <form action="" method="post">                           
                            <h4>Modification de produit</h4>

                            <select name="selectProd" id="selectProd">
                            <?php
                                while( $res_Produit = $req_Produit->fetch()){ ?>
                                    <option value="<?php $res_Produit['id_prod']?>">
                                    <?php echo $res_Produit['id_prod'] . " | " . $res_Produit['nom_prod'] . " | " .$res_Produit['typ_prod'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="number" name="enterProdId" id="enterProdId" placeholder="ID Produit">
                            <input type="text" name="modifProdNom" id="modifProdNom" placeholder="Nom Produit">
                            <input type="text" name="modifProdType" id="modifProdType" placeholder="Type Produit">
                            <input type="text" name="modifProdQte" id="modifProdQte" placeholder="Quantité Produit">
                            <input type="text" name="modifProdPrix" id="modifProdPrix" placeholder="Prix Produit">
                            <button type="submit" name="ModifProdSubmit" value="Modifier produit">Modifier produit</button>

                            <?php
                                if (isset($_POST['ModifProdSubmit'])) {
                                    $idProd = $_POST['enterProdId'];

                                    $nomProd = $_POST['modifProdNom'];
                                    $typeProd = $_POST['modifProdType'];

                                    $req_modifProdUpdate = $db_pdo->prepare("UPDATE produit SET nom_prod = ?, typ_prod = ? WHERE id_prod = $idProd;");
                                    $req_modifProdUpdate->bindParam(1, $nomProd);
                                    $req_modifProdUpdate->bindParam(2, $typeProd);
                                    $req_modifProdUpdate->execute();
                                    $res_modifProdUpdate = $req_modifProdUpdate->fetch();

                                    $qteProd = $_POST['modifProdQte'];
                                    $prixProd = $_POST['modifProdPrix'];

                                    $req_modifStockUpdate = $db_pdo->prepare("UPDATE stock SET qte_stock = ?, prix_vente = ? WHERE id_prod = $idProd;");
                                    $req_modifStockUpdate->bindParam(1, $qteProd);
                                    $req_modifStockUpdate->bindParam(2, $prixProd);
                                    $req_modifStockUpdate->execute();
                                    $res_modifStockUpdate = $req_modifStockUpdate->fetch();
                                }
                            ?>
                        </form>
                    </div>
                </section>


                <section class="utilisateurs">
                <?php 
                //Requete utilisateurs
                $req_Utils = $db_pdo->query("SELECT * FROM utilisateur");
                $res_Utils = $req_Utils->fetch();
                ?>
                    <div class="ajouterUtil">
                        <form action="" method="post">
                            <h4>Ajouter un utilisateur</h4>

                            <input type="text" name="ajoutUtiNom" id="ajoutUtiNom" placeholder="Nom utilisateur">
                            <input type="text" name="ajoutUtiMail" id="ajoutUtiMail" placeholder="Mail utilisateur">
                            <input type="text" name="ajoutUtiLogin" id="ajoutUtiLogin" placeholder="Login utilisateur">
                            <input type="password" name="ajoutUtiMDP" id="ajoutUtiMDP" placeholder="MDP utilisateur">
                            <input type="password" name="ajoutUtiMDPConfim" id="ajoutUtiMDPConfim" placeholder="Confirm MDP">
                            <input type="text" name="ajoutUtiRole" id="ajoutUtiRole" placeholder="Role utilisateur">
                            <button type="submit" name="ajoutUtiSubmit" value="Ajouter utilisateur">Ajouter utilisateur</button>
                            
                            <?php
                                if (isset($_POST['ajoutUtiSubmit'])) {
                                    if ($_POST['ajoutUtiMDP'] == $_POST['ajoutUtiMDPConfim']) {
                                        //INSERT INTO UTILISATEUR
                                        $req_insertUti = $db_pdo->prepare("INSERT INTO utilisateur(nom_uti,mail_uti,login_uti,mdp_uti,role_uti,abo_uti)
                                        VALUES(?,?,?,?,?,?)");
                                        $req_insertUti->execute(array($_POST['ajoutUtiNom'],$_POST['ajoutUtiMail'],$_POST['ajoutUtiLogin'],$_POST['ajoutUtiMDPConfim'],
                                        $_POST['ajoutUtiRole'],"FALSE"));
                                    }
                                }
                            ?>
                        </form>
                    </div>

                    <div class="modifierUtil">
                        <form action="" method="post">
                            <?php 
                                $req_UtilsID = $db_pdo->query("SELECT max(id_uti) FROM utilisateur");
                                $res_UtilsID = $req_UtilsID->fetch();
                            ?>
                            <h4>Modifier utilisateur</h4>
                            <select name="selectUtil" id="selectUtil">
                                <?php
                                while($res_Utils = $req_Utils->fetch()){ ?>
                                 <option value="<?php $res_Utils['id_prod']?>">
                                    <?php echo $res_Utils['id_uti'] . " | " . $res_Utils['nom_uti'] . " | " . $res_Utils['mail_uti'] . " | " .$res_Utils['login_uti'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="number" name="enterProdId" id="enterProdId" placeholder="ID Produit">
                            <input type="text" name="modifUtilNom" id="modifUtilNom" placeholder="Nom Produit">
                            <input type="text" name="modifProdType" id="modifProdType" placeholder="Type Produit">
                            <input type="text" name="modifProdQte" id="modifProdQte" placeholder="Quantité Produit">
                            <input type="text" name="modifProdPrix" id="modifProdPrix" placeholder="Prix Produit">
                            <button type="submit" name="ModifProdSubmit" value="Modifier produit">Modifier produit</button>
                            <?php

                            ?>
                        </form>
                    </div>
                </section>
            </div>                      
        </div> 
    </main>
</body>

</html>