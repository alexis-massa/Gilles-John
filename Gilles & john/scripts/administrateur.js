/* 
Ce script permet l'affichage des différents panels présent sur la page administrateur : 
- Paramètrage des produits
- Paramètrage des utilisateurs 
*/
$(document).ready(function () {
    /* Affichage du panel paramètrage des produits 
    quand le span button-produit est cliqué */ 
    $("#button-produits").click(function () {
        if ($(".Produits").not(":visible")) //s'avoir si le panel est deja afficher
        {
            $(".utilisateurs").hide();
            $(".Produits").show();
            $("#button-utilisateurs").css("color","white");
            $("#button-produits").css("color","orange");
        }
    });

    $("#button-utilisateurs").click(function () {
        /* Affichage du panel paramètrage des utilisateurs 
        quand le span button-utilisateur est cliqué */ 
        if ($(".utilisateurs").not(":visible")) //s'avoir si le panel est deja afficher
        {
            $(".Produits").hide();
            $(".utilisateurs").show();
            $("#button-produits").css("color","white");
            $("#button-utilisateurs").css("color","orange");
        }
    });

});