<!--<div class="container font-poppins btn-fraccionamiento mb-5">
    <div class="row" style="position: relative;">
		<div class="col-6 d-block">
        	<a class="btn btn-danger pl-2 pr-3 text-uppercase font-10 poppins py-2 prev-frac" href="<?= $nextfrac;?>">
        		<i class="fas fa-caret-left pr-3"></i><strong>Anterior Fraccionamiento</strong>
        	</a>
		</div>
		<div class="col-6 d-flex" style="justify-content:right;">
			<a class="btn btn-danger pl-3 pr-2 text-uppercase font-10 poppins py-2 next-frac" href="<?= $nextfrac;?>">
        		<strong>Siguiente Fraccionamiento</strong><i class="fas fa-caret-right pl-3"></i>
        	</a>
		</div>
	</div>
</div>-->
<div class="container font-poppins ciudades"> 
    <div class="px-3 mb-5">
        <div class="row" style="position: relative;">
            <a id="btn-back" href="<?=Path?>" style="z-index:10;"><img src="<?=Path?>/images/conferencias/btn_back.png"></a>
             <div class="col-lg-12 bg-black rounded-left p-0 text-md-center text-lg-left ciudades-detalle">
				<div class="title-ciudad px-5 py-5 my-2">
					<p class="mb-0 font-12 text-estado text-danger font-sweet-sans-pro"><?= $estado?></p>
					<p class="mb-0 font-44 text-ciudad bold c-white"><?= $city?></p>
				</div>
            </div>
            <div class="col-lg-12 bg-white" style="position: relative;">
                <div class="p-5">
                    <div class="px-2 py-3">
                            <div class="row align-items-center justify-content-center">
                            	<? foreach ($info as $key => $value) {?>
	                                <div class="col-lg-6">
	                					<img src="<? echo Path.$value->imgciudad?>"> 
	                					<div class="col-lg-12 text-center">
	                						<p class="font-30 bold"><?= $value->nombre;?></p>
	                						<div class="row mb-3">
		                						<div class="col-lg-2 pr-0">
			                                    	<img src="<?=Path?>/images/desarrollo/alvento/location.png">
			                                    </div>
			                                    <div class="col-lg-4 pl-0 pr-0">
				                                	<p class="mb-0 font-14 bold DA291C text-left">Ubicación:</p>
				                                	<p class="mt-0 font-14 location-name text-left"><?= $value->ubicacion;?></p>
			                                   	</div> 
			                                   	<div class="col-lg-2 pr-0 pl-0 img-ingresos text-right">
			                                    	<img src="<?=Path?>/images/desarrollo/alvento/ingresos.png">
			                                    </div>
			                                    <div class="col-lg-4 pl-2">
				                                	<p class="mb-0 font-14 bold DA291C text-left">Ingresos:</p>
				                                	<p class="mt-0 font-14 location-name text-left"><?= $value->leyenda2;?></p>
			                                   	</div>             
		                					</div>
	                    					<a class="btn btn-danger pl-3 pr-3 text-uppercase font-10 poppins py-2" href="<?=Path?>/desarrollos/<?= $value->id;?>"><strong>VER DETALLE DE FRACCIONAMIENTO</strong></a>
	                					</div>
	                                </div>
	                             <? }?>                                
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>