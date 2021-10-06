<div class="container font-poppins">
    <div class="px-3 mb-5">
        <div class="row" style="position: relative;">
            <img class="d-none d-lg-block d-xl-block" src="<?=Path?>/images/pasos_regalo/regalo_pasos.png" style="position: absolute;z-index: 99999;left: -48px;top: 60px;width: 40%;">
            <div class="col-lg-4 col-md-4 bg-black rounded-left p-0 text-md-center text-lg-left overflow-hidden bg-radial">
                <div class="img-registro-main px-3">
            		<img class="d-block d-lg-none d-xl-none" src="<?=Path?>/images/pasos_regalo/regalo_pasos.png" style="position: absolute;z-index: 99999;left: -48px;top: -41px;width: 40%;">
                </div>
            </div>
            <div class="col-lg-8 col-md-8 bg-white rounded-right registro-form" style="position: relative;">
                <a id="btn-back" href="<?=Path?>" style="z-index:10;"><img src="<?=Path?>/images/conferencias/btn_back.png"></a>
                <div class="p-4 padding-registro">
                	<div class="px-5 py-4">
		                 <h1 class="text-success font-30 line-height-32 font-poppins mb-4"><strong>¿Quieres saber cómo obtener uno de los regalos de Mundo javer?</strong></h1>
		                 <p class="font-poppins font-30 mb-4">
	                          Sigue los siguientes pasos:
						</p>
					</div>
					<div class="col-12">
						<div class="col-12 d-flex">
							<div class="col-1 font-44 text-success bold line-height-44">1</div>
							<div class="col-11">
								<p class="mb-0 bold font-18">Regístrate</p>
								<p class="mb-0 font-18 line-height-22">Sé parte de Mundo Javer, navega en el mapa, conoce las opciones que tenemos para ti y recibe atención personalizada.</p>
							</div>
							
						</div>
						<div class="col-12 d-flex py-4">
							<div class="col-1 font-44 text-success bold line-height-44">2</div>
							<div class="col-11">
								<p class="mb-0 bold font-18">Escritura</p>
								<p class="mb-0 font-18 line-height-22">Sé parte de Mundo Javer, navega en el mapa, conoce las opciones que tenemos para ti y recibe atención personalizada.</p>
							</div>
							
						</div>
						<div class="col-12 d-flex py-4">
							<div class="col-1 font-44 text-success bold line-height-44">3</div>
							<div class="col-11">
								<p class="mb-0 bold font-18">¡Gana!</p>
								<p class="mb-0 font-18 line-height-22">Sé parte de Mundo Javer, navega en el mapa, conoce las opciones que tenemos para ti y recibe atención personalizada.</p>
							</div>
						</div>
						<div class="col-12 d-flex py-4">
							<div class="col-12">
								<a class="btn btn-success py-2 px-4 font-10 mt-2 btn-continuar text-uppercase" href="<?=Path?>"><strong>Regístrate</strong></a>
							</div>
						</div>	                    
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .g-recaptcha   {
        transform: scale(0.80);
        -webkit-transform:scale(0.80);
        transform-origin: 0 0;
        -webkit-transform-origin: 0 0;
    }
</style>
<script>
    function validar(a) {
        var response = grecaptcha.getResponse();
        if(response.length == 0){
            alert("Captcha no verificado");
            return false;
            event.preventDefault();
        } else {
            //alert("Captcha verificado");
            return true;
        }
    }
</script>