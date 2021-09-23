<div class="container font-poppins btn-fraccionamiento mb-5">
    <div class="row" style="position: relative;">
		<div class="col-6 d-block">
        	<a class="btn btn-danger pl-2 pr-3 text-uppercase font-10 poppins py-2 prev-frac" href="<?= $prevfrac;?>">
        		<i class="fas fa-caret-left pr-3"></i><strong>Anterior Fraccionamiento</strong>
        	</a>
		</div>
		<div class="col-6 d-flex" style="justify-content:right;">
			<a class="btn btn-danger pl-3 pr-2 text-uppercase font-10 poppins py-2 next-frac" href="<?= $nextfrac;?>">
        		<strong>Siguiente Fraccionamiento</strong><i class="fas fa-caret-right pl-3"></i>
        	</a>
		</div>
	</div>
</div>
<div class="container font-poppins desarrollo">
    <div class="px-3 mb-5">
        <div class="row" style="position: relative;">
            <a id="btn-back" href="<?=Path?>" style="z-index:10;"><img src="<?=Path?>/images/conferencias/btn_back.png"></a>
            <div class="col-lg-12 bg-black rounded-left p-0 text-md-center text-lg-left slider-detalle">
				<div id="slider" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner">
				   <?
				   		$x=0;
	            		foreach ($slide as $key => $value) {
							//echo $value;	(trae las imagenes)
							if($x==0){echo '<div class="carousel-item active"><img class="d-block w-100" src="'.Path.$value.'"></div>';}
							else{echo '<div class="carousel-item"><img class="d-block w-100" src="'.Path.$value.'"></div>';}
							$x++;
						}
	            	?>    
				  </div>
				  <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
				    <span class="fas fa-chevron-circle-left " aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
				    <span class="fas fa-chevron-circle-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
            </div>
           <div class="col-lg-12 bg-white" style="position: relative;">
                <div class="p-5">
                    <div class="px-5 py-3">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                					<img src="<? echo Path.$logo?>"> 
                                </div>
                                <div class="col-lg-7">
                                    <p class="font-23 poppins"><?=$descripcion;?></p>                                   
                                </div>  
                                <div class="col-lg-4">
                                </div>
                                <div class="col-lg-8 d-flex">
                                    <div class="col-lg-1 pr-0">
                                    	<img src="<?=Path?>/images/desarrollo/alvento/location.png">
                                    </div>
                                    <div class="col-lg-4 pl-0 pr-0">
	                                	<p class="mb-0 font-17 bold DA291C">Ubicación:</p>
	                                	<p class="mt-0 font-17 location-name"><?=$ubicacion;?></p>
                                   	</div> 
                                   	<div class="col-lg-2 pr-0 pl-0 img-ingresos">
                                    	<img src="<?=Path?>/images/desarrollo/alvento/ingresos.png">
                                    </div>
                                    <div class="col-lg-4 pl-2">
	                                	<p class="mb-0 font-17 bold DA291C">Ingresos:</p>
	                                	<p class="mt-0 font-17 location-name"><?=$leyenda2;?></p>
                                   	</div>                                     
                                </div>                                 
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 bg-white pl-0 pr-0">
            	<iframe style="width:100%;height:700px; border:0px;" src="<?=$tour_virtual;?>"></iframe>
            </div>
           <div class="col-lg-12 bg-white py-5" style="position: relative;">
           		<div class="col-lg-12 interes-desarrollo mb-5">
	       			<p class="mb-0 font-30 poppins bold DA291C">¿Te interesa este fraccionamiento?</p>
	       		</div>
	       		<div class="col-lg-4 offset-2 f-left">
	       			<div class="col-lg-12 pr-0 pl-0 mb-3">
		            	<p class="mb-0 font-18 poppins bold">Visita la Oficina de Venta</p>
	                </div>
		       		<div class="col-lg-1 pr-0 pl-0 f-left text-center">
	                	<img src="<?=Path?>/images/desarrollo/alvento/location_red.png">
	                </div>
	                <div class="col-lg-11 pl-2 f-left mb-4">
		            	<p class="mb-0 font-16 poppins"><?= $calle;?></p>
	                </div>
	                <div class="col-lg-11 pl-2">
                    <a class="btn btn-danger pl-3 pr-4 text-uppercase font-10 poppins py-2" target="_blank" href="<?= $maps?>"><img class="pr-1 logo-location-maps" src="<?=Path?>/images/desarrollo/location_google.png"><strong>Abrir en google maps</strong></a>
	                </div>
	            </div>
	            <div class="col-lg-4 f-left offset-1">
	       			<div class="col-lg-12 pr-0 pl-0 mb-4">
		            	<p class="mb-0 font-18 poppins bold">Contacta a uno de nuestros asesores</p>
	                </div>
		       		<div class="col-lg-11 pl-2">
                    	<a class="btn btn-danger pl-3 pr-4 text-uppercase font-10 poppins py-2" href="<?=Path?>"><img class="pr-1 logo-wp-btn" src="<?=Path?>/images/desarrollo/wp-btn.png"><strong>Contactar asesor</strong></a>
	                </div>
	            </div>
	       		
           </div>
        </div>
    </div>
</div>