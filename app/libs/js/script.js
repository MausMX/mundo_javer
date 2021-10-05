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
	if(typeof estado_activo !== typeof undefined){
		$.ajax({
			//data:  parametros,
			type: 'POST',
			url: Path+"/index/whatsapp_disponible/"+estado_activo+"/",
			dataType: 'json',
		}).done(function(data) {
			$("footer").append('<div class="contacto_whatsapp"><a target="_blank" class="d-inline-block" href="'+Path+'/index/whatsapp/'+estado_activo+'/"><img src="'+Path+'/images/footer/ico_whatsapp.png"></a></div>');
			$(".btn-contacta").append('<a class="btn btn-danger pl-3 pr-4 text-uppercase font-10 poppins py-2" href="'+Path+'/index/whatsapp/'+estado_activo+'/"><img class="pr-1 logo-wp-btn" src="'+Path+'/images/desarrollo/wp-btn.png"><strong>Contactar asesor</strong></a>');
		}).fail(function() {
			console.log("No contamos con asesores este día");
		});
	}
	$("#estado").on('change',function(){
		switch ($(this).val()) {
			case 'Nuevo León':
				$('#00N3l00000Q7A5X').val('UEN1 - NUEVO LEON');
				break;
			case 'Jalisco':
				$('#00N3l00000Q7A5X').val('UEN3 - JALISCO');
				break;
			case 'Aguascalientes':
				$('#00N3l00000Q7A5X').val('UEN4 - AGUASCALIENTES');
				break;
			case 'Ciudad de México':
				$('#00N3l00000Q7A5X').val('UEN4 - DISTRITO FEDERAL');
				break;
			case 'Estado de México':
				$('#00N3l00000Q7A5X').val('UEN4 - ESTADO DE MEXICO');
				break;
			case 'Querétaro':
				$('#00N3l00000Q7A5X').val('UEN4 - QUERETARO');
				break;
			case 'Guanajuato':
				$('#00N3l00000Q7A5X').val('UEN4 - GUANAJUATO');
				break;
			case 'Quintana Roo':
				$('#00N3l00000Q7A5X').val('UEN4 - QUINTANA ROO');
				break;
				case 'Tamaulipas':
				$('#00N3l00000Q7A5X').val('UEN4 - TAMAULIPAS');
				break;
			default:
				break;
		}
	});
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
    altura_wrapper=altura_ventana-altura_footer-altura_header;
    $(".wrapper").css({'min-height':altura_wrapper});
}