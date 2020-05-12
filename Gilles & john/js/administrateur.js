$(document).ready(function () {
    $("#button-produits").click(function () {
        if ($(".Produits").not(":visible"))
        {
            $(".utilisateurs").hide();
            $(".Produits").show();
            $("#button-utilisateurs").css("color","white");
            $("#button-produits").css("color","orange");
        }
    });

    $("#button-utilisateurs").click(function () {
        if ($(".utilisateurs").not(":visible")) 
        {
            $(".Produits").hide();
            $(".utilisateurs").show();
            $("#button-produits").css("color","white");
            $("#button-utilisateurs").css("color","orange");
        }
    });

});