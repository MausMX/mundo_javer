$(function() {
	$('#detalle').on('hidden.bs.modal',function(){location.hash='';$("#detalle .modal-body").html("");$(this).removeData('bs.modal');});
	$('#detalle').on('show.bs.modal', function(event){var href=$(event.relatedTarget).attr("href");$('#detalle .modal-content').load(href,function(){$("#loading").hide();});});

	$('#youtube').on('hidden.bs.modal',function(){location.hash='';$("#youtube .modal-content iframe").attr("src",'');$(this).removeData('bs.modal');});
	$('#youtube').on('show.bs.modal', function(event){var href=$(event.relatedTarget).attr("href");$('#youtube .modal-content iframe').attr('src',href);});

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

$(window).on("load",function(){
	altura_wrapper_fixed();	
});

$('.bxslider_detalle').bxSlider({
  auto: true,
  stopAutoOnClick: true,
  pager: false
});


function altura_wrapper_fixed(){
    altura_ventana=$(window).height();
    altura_footer=$("footer").height();
    altura_header=$("header").height();
    //contenedor=((altura_ventana/2)-($(".container-gracias-center").height()));
	contenedor=((altura_ventana-$(".container-gracias-center").height())/2)-altura_header;
    altura_wrapper=altura_ventana-altura_footer-altura_header;
    $(".wrapper").css({'min-height':altura_wrapper});
    if ($(window).width() > 767){
    $(".container-gracias-center").css({'padding-top':contenedor});
    }else{
    $(".container-gracias-center").css({'padding-top':"0px"});
    }
    if($('body').is('#index')){
		altura_mapa=altura_ventana-altura_footer;
		$('#area_mapa').css({'height':altura_mapa});
	}
}
$(document).ready(function(){
	if(typeof estado_activo !== typeof undefined){
		$.ajax({
			//data:  parametros,
			type: 'POST',
			url: Path+"/index/whatsapp_disponible/"+estado_activo+"/",
			dataType: 'json',
		}).done(function(data) {
			console.log("No contamos con asesores este díasssssssss");
			$("footer").append('<div class="contacto_whatsapp"><a target="_blank" class="d-inline-block" href="'+Path+'/index/whatsapp/'+estado_activo+'/"><img src="'+Path+'/images/footer/ico_whatsapp.png"></a></div>');
			$(".btn-contacta").append('<a class="btn btn-danger pl-3 pr-4 text-uppercase font-10 poppins py-2" href="'+Path+'/index/whatsapp/'+estado_activo+'/"><img class="pr-1 logo-wp-btn" src="'+Path+'/images/desarrollo/WhatsApp_Icon_72x72.png"><strong>Contactar asesor</strong></a>');
		}).fail(function() {
			console.log("No contamos con asesores este díasssssssssss");
		}); 
	} 
	//if(typeof estado_activo !== typeof undefined){
		$.ajax({
			//data:  parametros,
			type: 'POST',
			url: Path+"/index/estados_disponibles/jalisco",
			dataType: 'json',
		}).done(function(data) {
			
			console.log("No contamos con asesores este día22222222222222s");
			/*$("footer").append('<div class="contacto_whatsapp"><a target="_blank" class="d-inline-block" href="'+Path+'/index/whatsapp/'+estado_activo+'/"><img src="'+Path+'/images/footer/ico_whatsapp.png"></a></div>');
			$(".btn-contacta").append('<a class="btn btn-danger pl-3 pr-4 text-uppercase font-10 poppins py-2" href="'+Path+'/index/whatsapp/'+estado_activo+'/"><img class="pr-1 logo-wp-btn" src="'+Path+'/images/desarrollo/WhatsApp_Icon_72x72.png"><strong>Contactar asesor</strong></a>');*/
		}).fail(function() {
			console.log("No contamos con asesores este díasss333333333333ssssssss");
		}); 
	//} 
});

