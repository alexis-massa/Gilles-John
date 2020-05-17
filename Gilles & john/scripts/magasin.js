var grd = function () {
    //Changement des boutons radio
    $("input[type='radio']").click(function () {
        var previousValue = $(this).attr('previousValue');
        var name = $(this).attr('name');
        if (previousValue == 'checked') {
            $(this).removeAttr('checked');
            $(this).attr('previousValue', false);
        } else {
            $("input[name=" + name + "]:radio").attr('previousValue', false);
            $(this).attr('previousValue', 'checked');
        }
    });
};

//Devrait renvoyer les valeurs des couleurs / tailles choisies mais ne fonctionne pas
var checked = function () {
    //Récupérer les valeurs
    $("input[type='radio']").click(function () {
        console.clear();

        var radiosCoul = document.getElementsByName('radio_coul');
        var radiosTaille = document.getElementsByName('radio_taille');
        var couls = [];
        var tailles = [];

        for (var i = 0; i < radiosCoul.length; i++) {
            if (radiosCoul[i].checked) {
                couls.push(radiosCoul[i].value);
            }
        }
        for (var i = 0; i < radiosTaille.length; i++) {
            if (radiosTaille[i].checked) {
                tailles.push(radiosTaille[i].value);
            }
        }
        console.log(couls);
        console.log(tailles);
    });
};

grd('radio_coul');
grd('radio_taille');
checked();