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
		}).done(function(data2) {
			
			$("footer").before('<div class="container contacto_whatsappf"><div class="detalle animation"><div class="cerrar"><i class="fa fa-close text-danger" aria-hidden="true"></i></div><div class="titulo">Selecciona una zona:</div><div class="contenido"><ul class="tel-wp"></ul></div></div><a target="_blank" class="d-inline-block" href="'+Path+'/index/whatsapp/"><img src="'+Path+'/images/footer/ico_whatsapp.png"></a></div>');
			var name="";
			for(var i=0;i<data2.length;i++){
				switch (data2[i].nombre) {
				  case 'tamaulipas':
				    	name="Tamaulipas";
				    break;
				  case 'queretaro':
				   		 name="Querétaro";
				    break;
				  case 'estado_de_mexico':
				    	name="Estado de México";
				    break;
				  case 'aguascalientes':
				    	name="Aguascalientes";
				    break;
				  case 'nuevo_leon':
				    	name="Nuevo León";
				    break;
				}
				$(".tel-wp").append("<li><a target='_blank' href='"+Path+"/index/whatsapp/"+data2[i].nombre+"/'>"+name+"</a></li>");
			}
			/*<div class="detalle animation"><div class="cerrar"><i class="fa fa-close text-danger" aria-hidden="true"></i></div><div class="titulo">Selecciona una zona:</div><div class="contenido"><ul><li><a href="https://www.javer.maus.mx/mundo-javer-2021/desarrollos/ciudades/el-salto">EL SALTO</a></li><li><a href="https://www.javer.maus.mx/mundo-javer-2021/desarrollos/ciudades/tlajomulco-zuniga">TLAJOMULCO DE ZUÑIGA</a></li><li><a href="https://www.javer.maus.mx/mundo-javer-2021/desarrollos/ciudades/tonala">TONALÁ</a></li><li><a href="https://www.javer.maus.mx/mundo-javer-2021/desarrollos/ciudades/zapopan">ZAPOPAN</a></li></ul></div></div>*/
			console.log("contamos con asesores este día22222222222222s___"+data2[0].nombre);
			/*$("footer").append('<div class="contacto_whatsapp"><a target="_blank" class="d-inline-block" href="'+Path+'/index/whatsapp/'+estado_activo+'/"><img src="'+Path+'/images/footer/ico_whatsapp.png"></a></div>');
			$(".btn-contacta").append('<a class="btn btn-danger pl-3 pr-4 text-uppercase font-10 poppins py-2" href="'+Path+'/index/whatsapp/'+estado_activo+'/"><img class="pr-1 logo-wp-btn" src="'+Path+'/images/desarrollo/WhatsApp_Icon_72x72.png"><strong>Contactar asesor</strong></a>');*/
		}).fail(function(xhr, status, error) {
			console.log("No contamos con asesores este díasss333333333333ssssssss"+xhr.responseText);
		}); 
	//} 
});

