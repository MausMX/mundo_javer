<?php $ahora=date("YmdHis")?>
<div class="container font-poppins reg-complete">
    <div class="px-3 mb-5">
        <div class="row" style="position: relative;">
            <div class="col-lg-4 col-md-4 bg-black rounded-left p-0 text-md-center text-lg-left bg-radial">
            <a id="btn-back" class="d-block d-lg-none d-md-none d-xl-none" href="<?=Path?>" style="z-index:161;"><img src="<?=Path?>/images/conferencias/btn_back.png"></a>
                <div class="pt-5 pb-0 px-3 container-title-registro">
                    <div class="pl-0 pr-0">
                        <h1 class="text-white text-center font-32 line-height-32 font-poppins mb-3"><strong>1. REGÍSTRATE</strong></h1>
                        <h2 class="text-white text-center font-28 line-height-32 font-poppins"><strong>2. Escritura 3. ¡Gana!</strong></h2>
                    </div>
                </div>
                <div class="img-registro-main px-3">
                    <img src="<?=Path?>/images/registro/regalo_registro.png">
                </div>
            </div>
            <div class="col-lg-8 col-md-8 bg-white rounded-right registro-form" style="position: relative;">
            <a id="btn-back" class="d-none d-lg-block d-md-block d-xl-block" href="<?=Path?>" style="z-index:161;"><img src="<?=Path?>/images/conferencias/btn_back.png"></a>
                <div class="p-5 padding-registro">
                    <h3 class="font-poppins font-18 text-center mb-3"><strong>¡Llena el formulario, Escritura y Gana!</strong></h3>
                    <div class="px-5 pt-3 padding-registro">
                        <form method="post" action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" onsubmit="return validar(this)">
                            <input type="hidden" name='captcha_settings' value='{"keyname":"CAPTCHAJAVER","fallback":"true","orgId":"00Do0000000b6Io","ts":""}'>
                            <input type="hidden" name="oid" value="00Do0000000b6Io">
                            <input type="hidden" name="retURL" value="<?=Path?>/registro/gracias?id=<?=$ahora?>">
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
                                <div class="col-lg-6 col-md-6"><input class="form-control mb-4" type="text" name="phone" id="phone" placeholder="Teléfono" required minlength="10" maxlength="10"></div>
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
                                <div class="col-lg-6 col-md-6">
                                    <div class="containter-captcha" style="position:absolute;top:-30px;">
                                        <div class="g-recaptcha" data-sitekey="6Lcg2vQZAAAAAHpqmf6Pj_-t-doxKr1iwLWfQuWQ"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 button-registro">
                                    <button id="btn-registro-registro" name="submit" class="btn btn-success w-100 text-uppercase py-2 px-5 font-14 letter-spacing-1 font-weight-bold" type="submit">Regístrate</button>
                                    <a class="font-poppins font-10 text-secondary d-block mt-2" href="https://www.javer.com.mx/avisos-de-privacidad#clientes">Ver Aviso de Privacidad</a>
                                    <a class="font-poppins font-14 text-success d-block mt-2 font-weight-bold" href="<?=Path?>/registro/pasos_regalo">Ver pasos para ganar</a>
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
</div>
<style>
    .g-recaptcha   {
        transform: scale(0.70);
        -webkit-transform:scale(0.70);
        transform-origin: 0 0;
        -webkit-transform-origin: 0 0;
        zoom: 1.3;
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