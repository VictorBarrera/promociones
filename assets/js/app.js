$.ajaxSetup({ cache: false });
$(function() {
    $('.money').attr('placeholder','$');
    $('.money').attr('data-a-sep',',');
    $('.money').attr('data-a-dec','.');
    $('.money').attr('data-a-sign','$ ');
    $('.money, .percent').addClass('right');
    $('.money').autoNumeric('init');
    $(".calendar").datepicker({ changeYear: true, changeMonth: true, dateFormat:"dd-mm-yy", dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ], monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic", ], dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], yearRange: "1915:<?php echo date('Y') ?>"});
    $(".sorter").attr('title','Ordenar');
    $(".sorter").tablesorter({sortReset   : true, sortRestart : true });
    $("#accordion" ).accordion();
    $("#ui_tabs" ).tabs();
    $(".triggersearch").keyup(function() { $.uiTableFilter( $('.finder') , this.value ) })
    $('button, button[type=button], input[type=submit], .btn').removeClass('ui-button')
    $('button, button[type=button], input[type=submit], .btn').addClass('btn btn-small btn-primary');
    $('input, textarea').placeholder;
    $('input[type=button], input').attr('autocomplete','off');
    $(".phone").mask('9999-9999');
    $(".input-date").mask('99-99-9999');
    $('.percent').mask("999%");
    $('select, inputinput[type=text], textarea').addClass('ui-widget-content ui-corner-all');
});
function decision( message, url ){ if(confirm(message) )    parent.location.href = url; }
function back_iframe (){ javascript:window.frames.history.go (-1)}
$('.btn').attr('data-loading-text','Procesando...');
$('.btn').click(function () {
    var btn = $(this)
    btn.button('loading')
    setTimeout(function () {
      btn.button('reset')
    }, 2000)
})
$('.alert').on('click',function(){
    $('.alert').fadeOut('slow');
});

$('body').mousemove(function(){
    setTimeout(function(){ $('.alert').fadeOut(9000); },2000);
});
function goto( url ){window.location.href = url; }
function date_to_human( date ){
    if (date=="" || !date )  { return; }

    var olddate = date.split('-'); var dia = olddate[2].split(' '); var newdate = dia[0]+'-'+olddate[1]+'-'+olddate[0]; return newdate;
}
function format_dollar( valor ){
    if (valor=='') {return '$ 00.00'};
    valu = Number(valor);

    var p = valu.toFixed(2).split(".");
    return "$ " + p[0].split("").reverse().reduce(function(acc, valu, i, orig) {
        return  valu + (i && !(i % 3) ? "," : "") + acc;
    }, "") + "." + p[1];
}
function format_percent( percent ){
    return percent+'%';
}
function clean_dollar( valor ){
    estevalor = $.trim( valor );
    estevalor = estevalor.replace('$','')
    return Number( estevalor.replace(',','') )
}
function clean_porcentaje( porcentaje ){
    estevalor = $.trim( porcentaje );
    return estevalor.replace('%','')
}
function calcular_prima_bruta( check, input_prima_neta, input_prima_bruta, input_impuesto ){
    if( $( '#'+check ).is(':checked') ) {
        estevalor = clean_dollar( $( '#'+input_prima_neta ).val() );
        pbruta   = (estevalor * iva) + estevalor;
        impuesto = (estevalor * iva);
    }else{
        estevalor = clean_dollar( $('#'+input_prima_neta).val() );
        pbruta   = estevalor
        impuesto = '';
    }
    $('#'+input_prima_bruta).val( format_dollar(pbruta) );
    $('#'+input_impuesto).val( format_dollar(impuesto) );
}
function calcular_prima_neta( check, input_prima_neta, input_prima_bruta, input_impuesto ){
    if( $('#'+check).is(':checked') ) {
        estevalor   = clean_dollar( $('#'+input_prima_bruta).val() );
        pneta       = estevalor/ (1+iva)
        impuesto    = (pneta * iva);
    }else{
        estevalor   = clean_dollar( $('#'+input_prima_bruta).val() );
        pneta       = estevalor;
        impuesto    = '';
    }
    $('#'+input_prima_neta).val( format_dollar(pneta) );
    $('#'+input_impuesto).val( format_dollar(impuesto) );
}
$("#nit, #licencia, #nit_cobro").mask("9999-999999-999-9");
$("#fecha_nacimiento").mask("99-99-9999");
$("#dui, #dui_cobro").mask("99999999-9");
$('#telefono_oficina, #telefono_cobro, #celular, #telefono_casa, #contacto_telefono, #contacto_celular, #toeditcelular, #toedittelefono ').mask('9999-9999');