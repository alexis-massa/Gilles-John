var grd = function () {
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
grd('radio_coul');
grd('radio_taille');

var checked = function () {
    $("input[type='radio']").click(function () {
        var valeurs = [[], []];

        
        var radiosCoul = document.getElementsByName('radio_coul');
        var radiosTaille = document.getElementsByName('radio_taille');

        for (var j = 0; j < radiosCoul.length; j++) {
            if (radiosCoul[j].checked) {
                valeurCoul = radiosCoul[j].value;
            }
        }
        for (var k = 0; k < radiosTaille.length; k++) {
            if (radiosTaille[k].checked) {
                valeurTaille = radiosTaille[k].value;
            }
        }
        valeurs.push(valeurCoul, valeurTaille);
        console.log(valeurs);
        console.log('---------------');
    });
}
