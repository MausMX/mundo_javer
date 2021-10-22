$('body').append('<div id="abandono" style="display:none;"></div>')
$('#abandono').load(Path+'/index/abandono');
$(document).mouseleave(function () {
    $('#abandono').show();
});
$(document).on('click','#btn-back-abandono',function(){
    $('#abandono').css({'display':'none'});
});