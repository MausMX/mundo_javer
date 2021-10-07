<?php $ahora=date("YmdHis")?>
<div class="container font-poppins pre-regis">
    <div class="row mb-5 container-gracias-center" style="position: relative;">
        <div class="col-lg-4 col-md-4 bg-black rounded-left p-0 text-md-center text-lg-left">
            <a id="btn-back" class="d-block d-lg-none d-md-none d-xl-none" href="<?=Path?>" style="z-index:10;"><img src="<?=Path?>/images/conferencias/btn_back.png"></a>
            <div class="p-5 container-title-registro">
                <div class="pl-5 pr-4"><h1 class="text-danger font-30 line-height-32 font-poppins"><strong>Encuentra tu nuevo hogar</strong></h1></div>
                <div class="pl-5 pr-4"><h2 class="font-30 line-height-32 text-white font-poppins" style="font-weight: 300;">y gana regalos increíbles</h2><br></div>
            </div>
            <div class="img-registro-main" style="position: absolute;bottom:0px;"><img src="<?=Path?>/images/registro/imagen_preregistro.png"></div>
        </div>
        <div class="col-lg-8 col-md-8 bg-white rounded-right registro-form" style="position: relative;">
            <a id="btn-back" class="d-none d-lg-block d-md-block d-xl-block" href="<?=Path?>" style="z-index:10;"><img src="<?=Path?>/images/conferencias/btn_back.png"></a>
            <div class="p-5 padding-registro">
                <h3 class="font-poppins font-18 text-center mb-4"><strong>¡Te avisaremos cuando comience Mundo Javer!</strong></h3>
                <p class="text-center">Compártenos tus datos, sé uno de los primeros en encontrar el hogar de tus sueños y descubrir todos los regalos ecológicos que tendremos para ti.</p>
                <div class="px-5 pt-4 padding-registro">
                    <form method="post" action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" onsubmit="return validar(this)">
                        <input type="hidden" name='captcha_settings' value='{"keyname":"CAPTCHAJAVER","fallback":"true","orgId":"00Do0000000b6Io","ts":""}'>
                        <input type="hidden" name="oid" value="00Do0000000b6Io">
                        <input type="hidden" name="retURL" value="<?=Path?>/preregistro/gracias?id=<?=$ahora?>">
                        <input type="hidden" name="00N3l00000Q7A57" id="00N3l00000Q7A57" placeholder="Fuente" required value="Mundo Javer">
                        <input type="hidden" name="00N3l00000Q7A5X" id="00N3l00000Q7A5X" class="form-control" placeholder="Zona de interés">
                        <input type="hidden" name="programas" id="programas" class="form-control" placeholder="Zona de interés" value="<?=$ahora?>">
                        <!--  ----------------------------------------------------------------------  -->
                        <!--  NOTA: Estos campos son elementos de depuración opcionales. Elimine      -->
                        <!--  los comentarios de estas líneas si desea realizar una prueba en el      -->
                        <!--  modo de depuración.                                                     -->
                        <!--  <input type="hidden" name="debug" value=1>                              -->
                        <!--  <input type="hidden" name="debugEmail"                                  -->
                        <!--  value="adminsalesforce@javer.com.mx">                                   -->
                        <!--  ----------------------------------------------------------------------  -->
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6"><input class="form-control mb-4" type="text" name="first_name" id="first_name" placeholder="Nombre" required maxlength="40"></div>
                            <div class="col-lg-6 col-md-6"><input class="form-control mb-4" type="text" name="last_name" id="last_name" placeholder="Apellidos" required maxlength="80"></div>
                            <div class="col-lg-6 col-md-6"><input class="form-control mb-4" type="text" name="mobile" id="mobile" placeholder="WhatsApp" required minlength="10" maxlength="10"></div>
                            <div class="col-lg-6 col-md-6"><input class="form-control mb-4" type="email" name="email" id="email" placeholder="Correo" required maxlength="80"></div>
                            <div class="col-lg-6 col-md-6 align-self-start">
                                <select class="form-control mb-4 font-10 estado" name="00N3l00000Q7A4v" id="00N3l00000Q7A4v" required>
                                    <option>Estado</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Ciudad de México">Ciudad de México</option>
                                    <option value="Estado de México">Estado de México</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Nuevo León">Nuevo León</option>
                                    <option value="Querétaro">Querétaro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6"><div class="containter-captcha" style="position:absolute;top:-30px;"><div class="g-recaptcha" data-sitekey="6Lcg2vQZAAAAAHpqmf6Pj_-t-doxKr1iwLWfQuWQ"></div></div></div>
                            <div class="col-lg-6 col-md-6 button-registro">
                                <button id="btn-registro-preregistro" name="submit" class="btn btn-success text-uppercase py-2 px-5 font-10 letter-spacing-1" type="submit"><strong>Regístrate</strong></button>
                                <a class="font-poppins font-10 text-secondary d-block mt-2" href="https://www.javer.com.mx/avisos-de-privacidad#clientes">Ver Aviso de Privacidad</a>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <p class="text-secondary font-10" style="line-height:12px;">
                                    <span class="text-danger">*</span> Los beneficios de Mundo Javer aplican para nuevos registros a partir del 1ro de octubre 2021. Si ya cuentas con un registro previo a esta fecha o estás en contacto con un asesor para tu vivienda, regístrate en Mundo Javer y recibirás un regalo especial de ahorro energético para tu vivienda.
                                </p>
                            </div>
                        </div>
                    </form>
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