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
var myVar2;
var contador2=0;
var carro_2={top:500,left:895,paso:1};
$(window).on("load",function(){
	altura_wrapper_fixed();	
	$("#carro_1").after('<div id="carro_2" class="active" ><div id="carro_2_1" style="opacity: 0;"></div><div id="carro_2_2" style="opacity: 0;"></div><div id="carro_2_3" style="opacity: 0;"></div><div id="carro_2_4" style="opacity: 0;"></div></div>');
	if($('body').is('#index') ){
	myVar2 = setInterval(animacion_inicial2, 100);
	}
});


/*$('.bxslider_detalle').bxSlider({
  auto: true,
  stopAutoOnClick: true,
  pager: false
});*/


function altura_wrapper_fixed(){
    altura_ventana=$(window).height();
    altura_footer=$("footer").height();
    if($("header").length==0){
    	altura_header=0;
	    altura_wrapper=Math.round(altura_ventana)-Math.round(altura_footer)-Math.round(altura_header);
	    $(".wrapper").css({'min-height':altura_wrapper}); 
    }else{
    	altura_header=$("header").height();
    	    //contenedor=((altura_ventana/2)-($(".container-gracias-center").height()));
		contenedor=((altura_ventana-$(".container-gracias-center").height())/2)-altura_header;
   		 altura_wrapper=altura_ventana-altura_footer-altura_header;
    }

    $(".wrapper").css({'min-height':altura_wrapper});
    if ($(window).width() > 767){
    $(".container-gracias-center").css({'padding-top':contenedor});
    }else{
    $(".container-gracias-center").css({'padding-top':"0px"});
    }
    if($('body').is('#index')){
		if($('body').hasClass('movil')){
			/*altura_mapa=altura_ventana-altura_footer;
			altura_mapa=altura_mapa+60;
			$('#area_mapa').css({'height':altura_mapa});*/
		}
	}
}
$(document).ready(function(){
	
	$("button.navbar-toggler").click(function(){
		var isVisible = $( ".collapse" ).is( ":visible" );
		if(!isVisible){
			$(".btn-fraccionamiento").css("z-index","140");
			$("a#btn-back").css("z-index","140");
			$(".nuevoleon.pin").css("z-index","150");
		}
		else{
			$(".btn-fraccionamiento").css("z-index","152");
			$("a#btn-back").css("z-index","152");
			$(".nuevoleon.pin").css("z-index","151");
		}
	});
	
	if(wp_active==0){
		if(typeof estado_activo !== typeof undefined){
			$.ajax({
				//data:  parametros,
				type: 'POST',
				url: Path+"/index/whatsapp_disponible/"+estado_activo+"/",
				dataType: 'json',
			}).done(function(data) {
				var nameW="";
				switch (estado_activo) {
						  case 'Tamaulipas':
						    	nameW="tamaulipas";
						    break;
						  case 'Querétaro':
						   		 nameW="queretaro";
						    break;
						  case 'Estado de México':
						    	nameW="estado_de_mexico";
						    break;
						  case 'Aguascalientes':
						    	nameW="aguascalientes";
						    break;
						  case 'Jalisco':
						    	nameW="jalisco";
						  break;
						   case 'Quintana Roo':
						    	name="quintana_roo";
						  break;
						  case 'Nuevo León':
						    	nameW="nuevo_leon";
						    break;
						}
				if(wp_active==0){
					//$("footer").append('<div class="contacto_whatsapp"><a id="btn-whatsapp-'+nameW+'" target="_blank" class="d-inline-block" href="'+Path+'/index/whatsapp/'+estado_activo+'/"><img src="'+Path+'/images/footer/ico_whatsapp.png"></a></div>');
					//$(".btn-contacta").append('<a class="btn btn-danger pl-3 pr-4 text-uppercase font-10 poppins py-2" href="'+Path+'/index/whatsapp/'+estado_activo+'/"><img class="pr-1 logo-wp-btn" src="'+Path+'/images/desarrollo/WhatsApp_Icon_72x72.png"><strong>Contactar asesor</strong></a>');
					$(".interes-desarrollo").after('<div class=" col-lg-12 f-left col-md-12 col-xl-12 text-center mb-4"><div class="col-lg-12 pr-0 pl-0 mb-4 title-asesores"><p class="mb-0 font-30 poppins bold line-height-26">Contacta a uno de nuestros asesores</p> </div><div class="col-lg-12 pl-2 btn-contacta"><a id="btn-whatsapp-'+nameW+'-'+desarrollo_activo+'" class="btn btn-danger pl-3 pr-4 text-uppercase font-10 poppins py-2" href="'+Path+'/index/whatsapp/'+estado_activo+'/"><img id="btn-whatsapp-img-'+nameW+'-'+desarrollo_activo+'" class="pr-1 logo-wp-btn" src="'+Path+'/images/desarrollo/WhatsApp_Icon_72x72.png"><strong id="btn-whatsapp-texto'+nameW+'-'+desarrollo_activo+'">Contactar asesor</strong></a></div></div>');
				}
			}).fail(function() {
				//console.log("No contamos con asesores este díasssssssssss");
				$("footer").before("<script>(function () {let js = document.createElement('script');js.type = 'text/javascript';js.async = 1;js.src = 'https://go.botmaker.com/rest/webchat/p/PQ2XODBE2N/init.js';document.body.appendChild(js);})();</script>");
				//$(".btn-contacta").append('<a class="btn btn-danger pl-3 pr-4 text-uppercase font-10 poppins py-2" href="'+Path+'/index/whatsapp/'+estado_activo+'/"><img class="pr-1 logo-wp-btn" src="'+Path+'/images/desarrollo/WhatsApp_Icon_72x72.png"><strong>Contactar asesor</strong></a>');
			}); 
		}
	}
	function ordenarAsc(p_array_json, p_key) {
	   p_array_json.sort(function (a, b) {
	      return a[p_key] > b[p_key];
	   });
	}
	//if(typeof estado_activo !== typeof undefined){
		$.ajax({
			type: 'POST',
			url: Path+"/index/estados_disponibles/",
			dataType: 'json',
		}).done(function(data2) {
			if(data2.length==0){
				if(wp_active!=0){
				$("footer").before("<script>(function () {let js = document.createElement('script');js.type = 'text/javascript';js.async = 1;js.src = 'https://go.botmaker.com/rest/webchat/p/PQ2XODBE2N/init.js';document.body.appendChild(js);})();</script>");
				}               
			}else{
				if(wp_active!=0){
					ordenarAsc(data2, 'nombre');
					if(gracias!=1){
					$("footer").after('<div class="contacto_whatsappf"><div class="detalle animation numE_'+data2.length+'"><div class="cerrar"><i class="fa fa-close text-danger" aria-hidden="true"></i></div><div class="titulo">Selecciona un Estado:</div><div class="contenido"><ul class="tel-wp"></ul></div></div><a class="d-inline-block" href="#"><img src="'+Path+'/images/footer/ico_whatsapp.png"></a></div>');
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
						  case 'Jalisco':
						    	name="jalisco";
						  break;
						  case 'jalisco':
						    	name="Jalisco";
						  break;
						   case 'quintana_roo':
						    	name="Quintana Roo";
						  break;
						  case 'nuevo_leon':
						    	name="Nuevo León";
						    break;
						}
						$(".tel-wp").append("<li><a id='footer-btn-whatsapp-"+data2[i].nombre+"' target='_blank' href='"+Path+"/index/whatsapp/"+data2[i].nombre+"/'>"+name+"</a></li>");
					}
					}
				}
			}
		}).fail(function(xhr, status, error) {
				if(gracias==1){
					$(".contacto_whatsappf").remove();
				}
			console.log("No contamos con asesores este díasss333333333333ssssssss"+xhr.responseText);
		}); 
	//} 

});
function animacion_inicial2() {
	contador2++;
	//camion_2_animacion();
	if(contador2>28 && carro_2.paso<13){
		carro_2_animacion();
	}
}
	function carro_2_animacion() {
	$('#carro_2').addClass('active');
	if(carro_2.paso==1 && carro_2.top>=500 && carro_2.left>=895){
		carro_2.paso=2;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'1'});
		$('#carro_2_3').css({'opacity':'0'});
		$('#carro_2_4').css({'opacity':'0'});
	}else if(carro_2.paso==2 && carro_2.top<=497 && carro_2.left>=930){
		carro_2.paso=3;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'1'});
		$('#carro_2_4').css({'opacity':'0'});
	}else if(carro_2.paso==3 && carro_2.top<=590 && carro_2.left>=1108){
		carro_2.paso=4;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'0'});
		$('#carro_2_4').css({'opacity':'1'});
	}else if(carro_2.paso==4 && carro_2.top>=622 && carro_2.left<=983){
		carro_2.paso=5;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'1'});
		$('#carro_2_4').css({'opacity':'0'});
	}else if(carro_2.paso==5 && carro_2.top>=785 && carro_2.left>=1193){
		carro_2.paso=6;
		//$('#carro_1').css({'z-index':'15'});
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'0'});
		$('#carro_2_4').css({'opacity':'1'});
	}else if(carro_2.paso==6 && carro_2.top>=1080 && carro_2.left<=732){
		carro_2.paso=7;
		$('#carro_2_1').css({'opacity':'1'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'0'});
		$('#carro_2_4').css({'opacity':'0'});
	}else if(carro_2.paso==7 && carro_2.top<=994 && carro_2.left<=528){
		carro_2.paso=8;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'1'});
		$('#carro_2_3').css({'opacity':'0'});
		$('#carro_2_4').css({'opacity':'0'});
	}else if(carro_2.paso==8 && carro_2.top<=1015 && carro_2.left>=545){
		carro_2.paso=9;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'0'});
		$('#carro_2_4').css({'opacity':'0'});
	}/*else if(carro_2.paso==9 && carro_2.top>=838 && carro_2.left>=574){
		carro_2.paso=10;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'0'});
		$('#carro_2_4').css({'opacity':'1'});
	}else if(carro_2.paso==10 && carro_2.top>=936 && carro_2.left<=378){
		carro_2.paso=11;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'1'});
		$('#carro_2_4').css({'opacity':'0'});
	}else if(carro_2.paso==11 && carro_2.top>=1084 && carro_2.left>=674){
		carro_2.paso=12;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'0'});
		$('#carro_2_4').css({'opacity':'1'});
	}else if(carro_2.paso==12 && carro_2.top>=1120 && carro_2.left<=602){
		carro_2.paso=13;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'0'});
		$('#carro_2_4').css({'opacity':'0'});
	}*/
	switch (carro_2.paso) {
		case 1:
			carro_2.top=carro_2.top+2;
			carro_2.left=carro_2.left+4;
			break;
		case 2:
			carro_2.top=carro_2.top-2;
			carro_2.left=carro_2.left+4;
			break;
		case 3:
			carro_2.top=carro_2.top+2;
			carro_2.left=carro_2.left+4;
			break;
		case 4:
			carro_2.top=carro_2.top+2;
			carro_2.left=carro_2.left-4;
			break;
		case 5:
			carro_2.top=carro_2.top+2;
			carro_2.left=carro_2.left+4;
			break;
		case 6:
			carro_2.top=carro_2.top+2;
			carro_2.left=carro_2.left-4;
			break;
		case 7:
			carro_2.top=carro_2.top-2;
			carro_2.left=carro_2.left-4;
			break;
		case 8:
			carro_2.top=carro_2.top-2;
			carro_2.left=carro_2.left+4;
			break;	
	}
	$('#carro_2').css({'top':carro_2.top+'px','left':carro_2.left+'px'});
}
