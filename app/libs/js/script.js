var myVar;
var contador=0;
var camion_1={top:973,left:1728,paso:1};
var carro_1={top:248,left:914,paso:1};
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
	/*if(typeof estado_activo !== typeof undefined){
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
	}*/
	$(".estado").on('change',function(){
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
	var area_mapa=$('#area_mapa').width();
	var mapa=$('#mapa').width();
	if(mapa>area_mapa){
		var scrollPosition = (mapa - area_mapa)/2;
		$('#area_mapa').scrollLeft(scrollPosition);
	}
});
window.addEventListener("resize", function(){
	//altura_wrapper_fixed2();
	//location.reload();
	var area_mapa=$('#area_mapa').width();
	var mapa=$('#mapa').width();
	if(mapa>area_mapa){
		var scrollPosition = (mapa - area_mapa)/2;
		$('#area_mapa').scrollLeft(scrollPosition);
	}
},false);

$(window).on("load",function(){
//	altura_wrapper_fixed2();
	myVar = setInterval(animacion_inicial, 100);
});

/*
function altura_wrapper_fixed2(){
	altura_ventana=$(window).height();
    altura_footer=$("footer").height();
    altura_header=$("header").height();
    altura_wrapper=altura_ventana-altura_footer-altura_header;
    $(".wrapper").css({'min-height':altura_wrapper});
	if($('body').is('#index')){
		altura_mapa=altura_ventana-altura_footer;
		$('#area_mapa').css({'height':altura_mapa});
	}
}*/

function animacion_inicial() {
	contador++;
	switch (contador) {
		case 3:
			$('#regalo').addClass('active');
			$('#edificio_2').addClass('active');
			$('#edificio_3').addClass('active');
			$('#edificio_4').addClass('active');
			$('#edificio_7').addClass('active');
			$('#edificio_8').addClass('active');
			break;
		case 9:
			$('#corporativo').addClass('active');
			break;
		case 15:
			$('#nuevoleon').addClass('active');
			break;
		case 18:
			$('#queretaro').addClass('active');
			break;
		case 21:
			$('#edomex').addClass('active');
			break;
		case 24:
			$('#tamaulipas').addClass('active');
			break;
		case 27:
			$('#aguascalientes').addClass('active');
			break;
		case 30:
			$('#jalisco').addClass('active');
			break;
		case 33:
			$('#quintanaroo').addClass('active');
			break;
		case 36:
			$('#globo').addClass('active');
			break;
		case 39:
			$('.pin').addClass('active');
			break;
	
		default:
			break;
	}
	camion_1_animacion();
	if(contador>28 && carro_1.paso<13){
		carro_1_animacion();
	}
}

function camion_1_animacion() {
	$('#camion').addClass('active');
	
	if(camion_1.paso==1 && camion_1.top<=671 && camion_1.left<=1124){
		camion_1.paso=2;
		$('#camion').css({'z-index':'15'});
		$('#camion1').css({'opacity':'0'});
		$('#camion2').css({'opacity':'0'});
		$('#camion3').css({'opacity':'0'});
		$('#camion4').css({'opacity':'1'});
	}else if(camion_1.paso==2 && camion_1.top<=607 && camion_1.left>=1220){
		camion_1.paso=3;
		$('#camion1').css({'opacity':'1'});
		$('#camion2').css({'opacity':'0'});
		$('#camion3').css({'opacity':'0'});
		$('#camion4').css({'opacity':'0'});
	}else if(camion_1.paso==3 && camion_1.top<=289 && camion_1.left<=606){
		camion_1.paso=4;
		$('#camion').css({'z-index':'5'});
		$('#camion1').css({'opacity':'0'});
		$('#camion2').css({'opacity':'0'});
		$('#camion3').css({'opacity':'0'});
		$('#camion4').css({'opacity':'1'});
	}else if(camion_1.paso==4 && camion_1.top<=533 && camion_1.left>=910){
		camion_1.paso=5;
		$('#camion1').css({'opacity':'0'});
		$('#camion2').css({'opacity':'0'});
		$('#camion3').css({'opacity':'1'});
		$('#camion4').css({'opacity':'0'});
	}else if(camion_1.paso==5 && camion_1.top>=443 && camion_1.left>=1540){
		camion_1.paso=6;
		$('#camion').css({'z-index':'15'});
		$('#camion1').css({'opacity':'0'});
		$('#camion2').css({'opacity':'1'});
		$('#camion3').css({'opacity':'0'});
		$('#camion4').css({'opacity':'0'});
	}else if(camion_1.paso==6 && camion_1.top>=507 && camion_1.left<=1412){
		camion_1.paso=7;
		$('#camion').css({'z-index':'5'});
		$('#camion1').css({'opacity':'0'});
		$('#camion2').css({'opacity':'0'});
		$('#camion3').css({'opacity':'1'});
		$('#camion4').css({'opacity':'0'});
	}else if(camion_1.paso==7 && camion_1.top>=829 && camion_1.left>=2040){
		camion_1.paso=8;
		$('#camion').css({'z-index':'15'});
		$('#camion1').css({'opacity':'0'});
		$('#camion2').css({'opacity':'1'});
		$('#camion3').css({'opacity':'0'});
		$('#camion4').css({'opacity':'0'});
	}else if(camion_1.paso==8 && camion_1.top>=973 && camion_1.left<=1728){
		camion_1.paso=1;
		camion_1.top=973;
		camion_1.left=1728;
		$('#camion').css({'z-index':'15'});
		$('#camion1').css({'opacity':'1'});
		$('#camion2').css({'opacity':'0'});
		$('#camion3').css({'opacity':'0'});
		$('#camion4').css({'opacity':'0'});
	}
	switch (camion_1.paso) {
		case 1:
			camion_1.top=camion_1.top-2;
			camion_1.left=camion_1.left-4;
			$('#camion').css({'top':camion_1.top+'px','left':camion_1.left+'px','z-index':'25'});
			break;
		case 2:
			camion_1.top=camion_1.top-2;
			camion_1.left=camion_1.left+4;
			$('#camion').css({'top':camion_1.top+'px','left':camion_1.left+'px'});
			break;
		case 3:
			camion_1.top=camion_1.top-2;
			camion_1.left=camion_1.left-4;
			$('#camion').css({'top':camion_1.top+'px','left':camion_1.left+'px'});
			break;
		case 4:
			camion_1.top=camion_1.top-2;
			camion_1.left=camion_1.left+4;
			$('#camion').css({'top':camion_1.top+'px','left':camion_1.left+'px'});
			break;
		case 5:
			camion_1.top=camion_1.top+2;
			camion_1.left=camion_1.left+4;
			$('#camion').css({'top':camion_1.top+'px','left':camion_1.left+'px'});
			break;
		case 6:
			camion_1.top=camion_1.top+2;
			camion_1.left=camion_1.left-4;
			$('#camion').css({'top':camion_1.top+'px','left':camion_1.left+'px'});
			break;
		case 7:
			camion_1.top=camion_1.top+2;
			camion_1.left=camion_1.left+4;
			$('#camion').css({'top':camion_1.top+'px','left':camion_1.left+'px'});
			break;
		case 8:
			camion_1.top=camion_1.top+2;
			camion_1.left=camion_1.left-4;
			$('#camion').css({'top':camion_1.top+'px','left':camion_1.left+'px'});
			break;
	}
}

function carro_1_animacion() {
	$('#carro_1').addClass('active');
	if(carro_1.paso==1 && carro_1.top>=258 && carro_1.left>=934){
		carro_1.paso=2;
		$('#carro_1_1').css({'opacity':'0'});
		$('#carro_1_2').css({'opacity':'1'});
		$('#carro_1_3').css({'opacity':'0'});
		$('#carro_1_4').css({'opacity':'0'});
	}else if(carro_1.paso==2 && carro_1.top<=200 && carro_1.left>=1050){
		carro_1.paso=3;
		$('#carro_1_1').css({'opacity':'1'});
		$('#carro_1_2').css({'opacity':'0'});
		$('#carro_1_3').css({'opacity':'0'});
		$('#carro_1_4').css({'opacity':'0'});
	}else if(carro_1.paso==3 && carro_1.top<=140 && carro_1.left<=930){
		carro_1.paso=4;
		$('#carro_1_1').css({'opacity':'0'});
		$('#carro_1_2').css({'opacity':'0'});
		$('#carro_1_3').css({'opacity':'0'});
		$('#carro_1_4').css({'opacity':'1'});
	}else if(carro_1.paso==4 && carro_1.top>=422 && carro_1.left<=366){
		carro_1.paso=5;
		$('#carro_1_1').css({'opacity':'0'});
		$('#carro_1_2').css({'opacity':'0'});
		$('#carro_1_3').css({'opacity':'1'});
		$('#carro_1_4').css({'opacity':'0'});
	}else if(carro_1.paso==5 && carro_1.top>=530 && carro_1.left>=582){
		carro_1.paso=6;
		//$('#carro_1').css({'z-index':'15'});
		$('#carro_1_1').css({'opacity':'0'});
		$('#carro_1_2').css({'opacity':'0'});
		$('#carro_1_3').css({'opacity':'0'});
		$('#carro_1_4').css({'opacity':'1'});
	}else if(carro_1.paso==6 && carro_1.top>=570 && carro_1.left<=502){
		carro_1.paso=7;
		$('#carro_1_1').css({'opacity':'0'});
		$('#carro_1_2').css({'opacity':'0'});
		$('#carro_1_3').css({'opacity':'1'});
		$('#carro_1_4').css({'opacity':'0'});
	}else if(carro_1.paso==7 && carro_1.top>=606 && carro_1.left>=574){
		carro_1.paso=8;
		$('#carro_1_1').css({'opacity':'0'});
		$('#carro_1_2').css({'opacity':'0'});
		$('#carro_1_3').css({'opacity':'0'});
		$('#carro_1_4').css({'opacity':'1'});
	}else if(carro_1.paso==8 && carro_1.top>=722 && carro_1.left<=342){
		carro_1.paso=9;
		$('#carro_1_1').css({'opacity':'0'});
		$('#carro_1_2').css({'opacity':'0'});
		$('#carro_1_3').css({'opacity':'1'});
		$('#carro_1_4').css({'opacity':'0'});
	}else if(carro_1.paso==9 && carro_1.top>=838 && carro_1.left>=574){
		carro_1.paso=10;
		$('#carro_1_1').css({'opacity':'0'});
		$('#carro_1_2').css({'opacity':'0'});
		$('#carro_1_3').css({'opacity':'0'});
		$('#carro_1_4').css({'opacity':'1'});
	}else if(carro_1.paso==10 && carro_1.top>=936 && carro_1.left<=378){
		carro_1.paso=11;
		$('#carro_1_1').css({'opacity':'0'});
		$('#carro_1_2').css({'opacity':'0'});
		$('#carro_1_3').css({'opacity':'1'});
		$('#carro_1_4').css({'opacity':'0'});
	}else if(carro_1.paso==11 && carro_1.top>=1084 && carro_1.left>=674){
		carro_1.paso=12;
		$('#carro_1_1').css({'opacity':'0'});
		$('#carro_1_2').css({'opacity':'0'});
		$('#carro_1_3').css({'opacity':'0'});
		$('#carro_1_4').css({'opacity':'1'});
	}else if(carro_1.paso==12 && carro_1.top>=1120 && carro_1.left<=602){
		carro_1.paso=13;
		$('#carro_1_1').css({'opacity':'0'});
		$('#carro_1_2').css({'opacity':'0'});
		$('#carro_1_3').css({'opacity':'0'});
		$('#carro_1_4').css({'opacity':'0'});
	}
	switch (carro_1.paso) {
		case 1:
			carro_1.top=carro_1.top+2;
			carro_1.left=carro_1.left+4;
			break;
		case 2:
			carro_1.top=carro_1.top-2;
			carro_1.left=carro_1.left+4;
			break;
		case 3:
			carro_1.top=carro_1.top-2;
			carro_1.left=carro_1.left-4;
			break;
		case 4:
			carro_1.top=carro_1.top+2;
			carro_1.left=carro_1.left-4;
			break;
		case 5:
			carro_1.top=carro_1.top+2;
			carro_1.left=carro_1.left+4;
			break;
		case 6:
			carro_1.top=carro_1.top+2;
			carro_1.left=carro_1.left-4;
			break;
		case 7:
			carro_1.top=carro_1.top+2;
			carro_1.left=carro_1.left+4;
			break;
		case 8:
			carro_1.top=carro_1.top+2;
			carro_1.left=carro_1.left-4;
			break;
		case 9:
			carro_1.top=carro_1.top+2;
			carro_1.left=carro_1.left+4;
			break;
		case 10:
			carro_1.top=carro_1.top+2;
			carro_1.left=carro_1.left-4;
			break;
		case 11:
			carro_1.top=carro_1.top+2;
			carro_1.left=carro_1.left+4;
			break;
		case 12:
			carro_1.top=carro_1.top+2;
			carro_1.left=carro_1.left-4;
			break;
	}
	$('#carro_1').css({'top':carro_1.top+'px','left':carro_1.left+'px'});
}