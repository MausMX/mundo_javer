$(function() {
	$('#detalle').on('hidden.bs.modal', function() {
		location.hash = '';
	    $("#detalle .modal-body").html("");
	    $(this).removeData('bs.modal');
	});
	$('a.external').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $(".modal-content").load(url);
    });
    $('.confirmation').on('click', function () {
        return confirm('¿Estas seguro de eliminar este registro?');
    });
    $('a.ancla').click(function(e){				
		e.preventDefault();		//evitar el eventos del enlace normal
		var strAncla=$(this).attr('href'); //id del ancla
			$('body,html').stop(true,true).animate({				
				scrollTop: $(strAncla).offset().top
			},1000);
	});
	altura_wrapper_fixed();
});
window.addEventListener("resize", function(){
	altura_wrapper_fixed();
	//location.reload();
},false);

$(window).load(function(){
});

function altura_wrapper_fixed(){
    altura_ventana=$(window).height();
    altura_footer=$("footer").height();
    altura_header=$("header").height();
    altura_wrapper=altura_ventana-altura_footer-altura_header;
    $(".wrapper").css({'min-height':altura_wrapper});
}

var usuario='';
function statusChangeCallback(response){
	if(response.status === 'connected'){
		$(".login_facebook").hide();
		loginAPI();
	}
}
function checkLoginState(){
	FB.getLoginStatus(function(response){
		statusChangeCallback(response);
	});
}
function loginAPI(){
	FB.api('/me?fields=id,name,address,birthday,email,gender', function(usuario){
		var parametros = {
                "idFb" : usuario.id,
                "nombre" : usuario.name,
                "genero" : usuario.gender,
                "correo" : usuario.email,
                "activo" : 1,
                "idTipo" : 2,
        };
		$.ajax({
			data:  parametros,
            type: 'POST',
            url: Path+"/usuarios/save/",
            dataType: 'json',
            success: function(data){
				$('#status').html('<div title="'+usuario.name+'" class="avatar" style="background: url(https://graph.facebook.com/v2.11/'+usuario.id+'/picture?height=400&width=400);background-size: cover;background-position: top center;"></div> ');
            }
        });
	});
}

window.fbAsyncInit = function(){
	FB.init({
		appId      : '569439123390154',
		cookie     : true, 
		xfbml      : true,
		version    : 'v2.11'
	});
	checkLoginState();
};
(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11&appId=569439123390154&autoLogAppEvents=1';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));