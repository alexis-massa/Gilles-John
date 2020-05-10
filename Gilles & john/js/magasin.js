$(".color").click(function(){
    $(".products span").removeClass("activeColor");
    $(this).addClass("activeColor");
    $(".product-pic").css("background-image", $(this).attr("data-pic"));
});
$(".taille").click(function(){
    $(".products span").removeClass("activeTaille");
    $(this).addClass("activeTaille");
    $(".prix").html($(this).attr("data-prix"));
});