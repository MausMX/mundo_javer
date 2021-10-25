$('body').append('<div id="abandono" style="display:none;"></div>')
$('#abandono').load(Path+'/index/abandono');
/*
$.ajax({
    url: Path+'/index/abandono',
    dataType: 'html',
    success: function(html) {
        $('#abandono').html(html)
    }
});
  */
$(document).mouseleave(function () {
    $('#abandono').show();
});
$(document).on('click','#btn-back-abandono',function(){
    $('#abandono').css({'display':'none'});
});