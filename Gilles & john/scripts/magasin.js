console.log('test');
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
