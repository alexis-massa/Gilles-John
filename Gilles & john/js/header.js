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
});