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


function altura_wrapper_fixed(){
    altura_ventana=$(window).height();
    altura_footer=$("footer").height();
    altura_header=$("header").height();
    altura_wrapper=altura_ventana-altura_footer-altura_header;
    $(".wrapper").css({'min-height':altura_wrapper});
}