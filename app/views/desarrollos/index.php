<div class="container font-poppins btn-fraccionamiento mb-5">
    <div class="row" style="position: relative;">
		<div class="col-6 d-block">
        	<a class="btn btn-danger pl-2 pr-3 text-uppercase font-10 poppins py-2 prev-frac" href="<?= Path.$prevfrac;?>">
        		<i class="fas fa-caret-left pr-3 icon-previ"></i><strong>Anterior Fraccionamiento</strong>
        	</a>
		</div>
		<div class="col-6 d-flex" style="justify-content:right;">
			<a class="btn btn-danger pl-3 pr-2 text-uppercase font-10 poppins py-2 next-frac" href="<?= Path.$nextfrac;?>">
        		<strong>Siguiente Fraccionamiento</strong><i class="fas fa-caret-right pl-3 icon-netx"></i>
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
           <div class="col-12 col-lg-12 bg-white" style="position: relative;">
                <div class="p-5 padding-line">
                    <div class="px-5 py-3 padding-extra">
                            <div class="row align-items-center">
                                <div class="col-8 offset-2 offset-md-0 offset-lg-0 offset-xl-0 col-lg-4 col-xl-4 col-md-4 d-flex div-logo-des">
                					<img src="<? echo Path.$logo?>"> 
                                </div>
                                <div class="col-12  col-md-8 col-lg-8">
                                    <p class="font-23 poppins desc-desarrollo"><?=$descripcion;?></p>                                   
                                </div>  
                                <!--<div class=" col-12 col-lg-4">
                                </div>-->
                                <!--<div class="col-12 col-lg-8 offset-lg-4 d-lg-flex d-xl-flex d-block">
                                	<div class="col-10 offset-2 col-lg-6 p-0 d-flex info-ubicacion">                                    
	                                    <div class="col-2 col-lg-2 pr-0 img-ubicacion">
	                                    	<img src="<?=Path?>/images/desarrollo/alvento/location.png">
	                                    </div>
	                                    <div class="col-10 col-lg-10 col-xl-10 col-lg-10 pl-2 pr-0 contenido-ubicacion">
		                                	<p class="mb-0 font-17 bold DA291C">Ubicación:</p>
		                                	<p class="mt-0 font-17 location-name"><?=$ubicacion;?></p>
	                                   	</div> 
	                                </div>
                                	<div class="col-10 offset-2 col-lg-6 p-0 d-flex info-ingresos">                                    
	                                   	<div class="col-2 col-lg-2 pr-0 pl-0 img-ingresos">
	                                    	<img src="<?=Path?>/images/desarrollo/alvento/ingresos.png">
	                                    </div>
	                                    <div class="col-10 col-lg-10 col-xl-10 pl-2">
		                                	<p class="mb-0 font-17 bold DA291C">Ingresos:</p>
		                                	<p class="mt-0 font-17 location-name"><?=$leyenda2;?></p>
	                                   	</div>
	                                </div>                                     
                                </div>--> 
                                <div class="col-12 col-lg-8 offset-lg-4 col-xl-8 offset-xl-4 col-md-8 offset-md-4 d-md-flex d-lg-flex d-xl-flex d-block">
                                	<div class="col-12 col-lg-6 col-xl-6 col-md-6 p-0 d-flex info-ubicacion">                                    
	                                    <div class="col-12 col-lg-12 pr-0 img-ubicacion">
	                                    	<div class="f-left">
	                                    		<img src="<?=Path?>/images/desarrollo/alvento/location.png">
	                                    	</div>	
	                                    	<div class="f-left pl-2">                                    
			                                	<p class="mb-0 font-17 bold DA291C">Ubicación:</p>
			                                	<p class="mt-0 font-17 location-name"><?=$ubicacion;?></p>
			                                </div>
	                                   	</div> 
	                                </div>
                                	<div class="col-12 col-lg-6 col-xl-6 col-md-6 p-0 d-flex info-ingresos">                                    
	                                   	<div class="col-12 col-lg-12 pr-0 pl-0 img-ingresos">
	                                    	<div class="f-left">
	                                    		<img src="<?=Path?>/images/desarrollo/alvento/ingresos.png">
	                                    	</div>	
	                                    	<div class="f-left pl-2">                                    
			                                	<p class="mb-0 font-17 bold DA291C">Ingresos:</p>
			                                	<p class="mt-0 font-17 location-name"><?=$leyenda2;?></p>
			                                </div>
	                                   	</div>
	                                </div>                                     
                                </div>                                
                            </div>
                    </div>
                </div>
            </div>
            <?
            if($tour_virtual!="#N/A"){
            ?>
            <div class="col-lg-12 bg-white pl-0 pr-0">
            	<iframe style="width:100%;height:700px; border:0px;" src="<?=$tour_virtual;?>"></iframe>
            </div>
           	<?
            }
            ?>
           <div class="col-lg-12 bg-white py-5 rounded-bottom" style="position: relative;">
           		<div class="col-lg-12 interes-desarrollo mb-5">
	       			<p class="mb-0 font-30 poppins bold DA291C">¿Te interesa este fraccionamiento?</p>
	       		</div>
	       		<div class="col-lg-4 offset-lg-2 col-md-5 col-xl-4 offset-xl-2 offset-md-1 f-left">
	       			<div class="col-lg-12 pr-0 pl-0 mb-3 oficina-title">
		            	<p class="mb-0 font-18 poppins bold">Visita la Oficina de Venta</p>
	                </div>
		       		<div class="col-lg-1 col-xl-1 col-md-1 pr-0 pl-0 f-left text-center d-none d-lg-block d-xl-block d-md-block">
	                	<img src="<?=Path?>/images/desarrollo/alvento/location_red.png">
	                </div>
	                <div class="col-lg-11 col-xl-11 col-md-11 pl-2 f-left mb-4 d-none d-lg-block d-xl-block d-md-block">
		            	<p class="mb-0 font-16 poppins"><?= $calle;?></p>
	                </div>
	                <div class="col-lg-11  col-xl-11 col-md-11 pl-2 btn-location">
                    <a class="btn btn-danger pl-3 pr-4 text-uppercase font-10 poppins py-2" target="_blank" href="<?= $maps?>"><img class="pr-1 logo-location-maps" src="<?=Path?>/images/desarrollo/location_google.png"><strong>Abrir en google maps</strong></a>
	                </div>
	            </div>
	            <div class="col-lg-4 f-left offset-lg-0 col-md-6 col-xl-4">
	       			<div class="col-lg-12 pr-0 pl-0 mb-4 title-asesores">
		            	<p class="mb-0 font-18 poppins bold">Contacta a uno de nuestros asesores</p>
	                </div>
		       		<div class="col-lg-11 pl-2 btn-contacta">
	                </div>
	            </div>
	       		
           </div>
        </div>
    </div>
</div>