//BASKET HIDE- SHOW
$(document).ready(function () {
    $("#basket_shop").click(function () {
        if ($("#container-shop-basket").is(":visible")) {
            $("#container-shop-basket").slideUp(200);
            $("#basket_shop").css("color", "black");
        } else {
            $("#container-shop-basket").slideDown(300);
            $("#basket_shop").css("color", "orange");
        }
    });

    $(".hamburger").click(function () {
        if ($(".mobile-elements").is(":visible")) {
            $(".mobile-elements").slideUp(200);
            $(".mobile-elements").css("color", "black");
        } else {
            $(".mobile-elements").slideDown(300);
            $(".mobile-elements").css("color", "orange");
        }
    });
});