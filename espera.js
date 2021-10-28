$('body').append('<div id="abandono" style="display:none;"></div>')
$('#abandono').load('https://www.mundojaver.com.mx/index/abandono');

/*$.ajax({
    url: 'https://www.mundojaver.com.mx/index/abandono',
    dataType: 'html',
    success: function(html) {
        $('#abandono').html(html)
    }
});*/
  
$(document).mouseleave(function () {
    $('#abandono').show();
});
$(document).on('click','#btn-back-abandono',function(){
    $('#abandono').css({'display':'none'});
    $.ajax({
        url: 'https://www.mundojaver.com.mx/index/abandono_close',
        dataType: 'html',
        success: function(html) {
            $('#abandono').remove();
        }
    });
});