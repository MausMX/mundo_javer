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
var carro_2={top:574,left:659,paso:2};
$(window).on("load",function(){
	altura_wrapper_fixed();	
	$("#carro_1").after('<div id="carro_2" class="active" ><div id="carro_2_1" style="opacity: 0;"></div><div id="carro_2_2" style="opacity: 0;"></div><div id="carro_2_3" style="opacity: 0;"></div><div id="carro_2_4" style="opacity: 0;"></div></div>');

	myVar2 = setInterval(animacion_inicial2, 100);
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
		if($('body').hasClass('movil')){
			altura_mapa=altura_mapa+60;
		}
		$('#area_mapa').css({'height':altura_mapa});
	}
}
$(document).ready(function(){
	$("button.navbar-toggler").click(function(){
		var isVisible = $( ".collapse" ).is( ":visible" );
		if(!isVisible){
			$(".btn-fraccionamiento").css("z-index","140");
			$("a#btn-back").css("z-index","140");
		}
		else{
			$(".btn-fraccionamiento").css("z-index","152");
			$("a#btn-back").css("z-index","152");
		}
	});
	
	
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
			$(".btn-contacta").append('<a class="btn btn-danger pl-3 pr-4 text-uppercase font-10 poppins py-2" href="'+Path+'/index/whatsapp/'+estado_activo+'/"><img class="pr-1 logo-wp-btn" src="'+Path+'/images/desarrollo/WhatsApp_Icon_72x72.png"><strong>Contactar asesor</strong></a>');
		}); 
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
				$("footer").before("<script>(function () {let js = document.createElement('script');js.type = 'text/javascript';js.async = 1;js.src = 'https://go.botmaker.com/rest/webchat/p/PQ2XODBE2N/init.js';document.body.appendChild(js);})();</script>");               
			}else{
				if(wp_active!=0){
					ordenarAsc(data2, 'nombre');
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
						$(".tel-wp").append("<li><a target='_blank' href='"+Path+"/index/whatsapp/"+data2[i].nombre+"/'>"+name+"</a></li>");
					}
				}
			}
		}).fail(function(xhr, status, error) {
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
	if(carro_2.paso==1 && carro_2.top>=258 && carro_2.left>=934){
		carro_2.paso=2;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'1'});
		$('#carro_2_3').css({'opacity':'0'});
		$('#carro_2_4').css({'opacity':'0'});
	}else if(carro_2.paso==2 && carro_2.top<=200 && carro_2.left>=1050){
		carro_2.paso=3;
		$('#carro_2_1').css({'opacity':'1'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'0'});
		$('#carro_2_4').css({'opacity':'0'});
	}else if(carro_2.paso==3 && carro_2.top<=140 && carro_2.left<=930){
		carro_2.paso=4;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'0'});
		$('#carro_2_4').css({'opacity':'1'});
	}else if(carro_2.paso==4 && carro_2.top>=422 && carro_2.left<=366){
		carro_2.paso=5;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'1'});
		$('#carro_2_4').css({'opacity':'0'});
	}else if(carro_2.paso==5 && carro_2.top>=530 && carro_2.left>=582){
		carro_2.paso=6;
		//$('#carro_1').css({'z-index':'15'});
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'0'});
		$('#carro_2_4').css({'opacity':'1'});
	}else if(carro_2.paso==6 && carro_2.top>=570 && carro_2.left<=502){
		carro_2.paso=7;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'1'});
		$('#carro_2_4').css({'opacity':'0'});
	}else if(carro_2.paso==7 && carro_2.top>=606 && carro_2.left>=574){
		carro_2.paso=8;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'0'});
		$('#carro_2_4').css({'opacity':'1'});
	}else if(carro_2.paso==8 && carro_2.top>=722 && carro_2.left<=342){
		carro_2.paso=9;
		$('#carro_2_1').css({'opacity':'0'});
		$('#carro_2_2').css({'opacity':'0'});
		$('#carro_2_3').css({'opacity':'1'});
		$('#carro_2_4').css({'opacity':'0'});
	}else if(carro_2.paso==9 && carro_2.top>=838 && carro_2.left>=574){
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
	}
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
			carro_2.top=carro_2.top-2;
			carro_2.left=carro_2.left-4;
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
			carro_2.top=carro_2.top+2;
			carro_2.left=carro_2.left+4;
			break;
		case 8:
			carro_2.top=carro_2.top+2;
			carro_2.left=carro_2.left-4;
			break;
		case 9:
			carro_2.top=carro_2.top+2;
			carro_2.left=carro_2.left+4;
			break;
		case 10:
			carro_2.top=carro_2.top+2;
			carro_2.left=carro_2.left-4;
			break;
		case 11:
			carro_2.top=carro_2.top+2;
			carro_2.left=carro_2.left+4;
			break;
		case 12:
			carro_2.top=carro_2.top+2;
			carro_2.left=carro_2.left-4;
			break;
	}
	//$('#carro_2').css({'top':carro_2.top+'px','left':carro_2.left+'px'});
}
