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
    contenedor=((altura_ventana/2)-($(".container-gracias-center").height()));
    altura_wrapper=altura_ventana-altura_footer-altura_header;
    console.log(altura_ventana+"----footer"+altura_footer+"-----header:"+altura_header+"----container"+$(".container-gracias-center").height());
    $(".wrapper").css({'min-height':altura_wrapper});
    $(".container-gracias-center").css({'padding-top':contenedor});
}