<div class="container font-poppins">
    <div class="px-3 mb-5">
        <div class="row" style="position: relative;">
            <div class="col-lg-4 col-md-4 bg-black rounded-left p-0 text-md-center text-lg-left overflow-hidden">
                <div class="p-5 container-title-registro">
                    <div class="pl-5 pr-4">
                        <h1 class="text-danger font-30 line-height-32 font-poppins"><strong>Encuentra tu nuevo hogar</strong></h1>
                        <h2 class="font-30 line-height-32 text-white font-poppins" style="font-weight: 300;">en nuestra Expo Virtual y gana regalos ecológicos</h2>
                    </div>
                </div>
                <div class="img-registro-main">
                    <img src="<?=Path?>/images/registro/imagen_preregistro.png">
                </div>
            </div>
            <div class="col-lg-8 col-md-8 bg-white rounded-right registro-form" style="position: relative;">
                <a id="btn-back" href="<?=Path?>" style="z-index:10;"><img src="<?=Path?>/images/conferencias/btn_back.png"></a>
                <div class="p-5 padding-registro">
                    <h3 class="font-poppins font-18 text-center mb-3"><strong>¿Encontraste el hogar de tus sueños?</strong></h3>
                    <p class="text-center font-18">Llena el formulario para ser contactado por uno de nuestros asesores, brindarte atención personalizada y continuar con el proceso.</p>
                    <div class="px-5 pt-3 padding-registro">
                        <form method="post" action="https://test.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" onsubmit="return validar(this)">
                            <input type="hidden" name='captcha_settings' value='{"keyname":"CAPTCHAJAVER","fallback":"true","orgId":"00D530000008hIx","ts":""}'>
                            <input type="hidden" name="oid" value="00D530000008hIx">
                            <input type="hidden" name="retURL" value="<?=Path?>/registro/gracias">
                            <input type="hidden" name="00N3l00000Q7A57" id="00N3l00000Q7A57" placeholder="Fuente" required value="Mundo Javer">
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
                                    <select class="form-control mb-4 font-10" name="00N3l00000Q7A5X" id="00N3l00000Q7A5X" required>
                                        <option>Zona de interés</option>
                                        <option value="UEN1 - NUEVO LEON">NUEVO LEON</option>
                                        <option value="UEN3 - JALISCO">JALISCO</option>
                                        <option value="UEN4 - AGUASCALIENTES">AGUASCALIENTES</option>
                                        <option value="UEN4 - DISTRITO FEDERAL">DISTRITO FEDERAL</option>
                                        <option value="UEN4 - ESTADO DE MEXICO">ESTADO DE MEXICO</option>
                                        <option value="UEN4 - QUERETARO">QUERETARO</option>
                                        <option value="UEN4 - GUANAJUATO">GUANAJUATO</option>
                                        <option value="UEN4 - QUINTANA ROO">QUINTANA ROO</option>
                                        <option value="UEN4 - TAMAULIPAS">TAMAULIPAS</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="containter-captcha" style="position:absolute;top:-30px;">
                                        <div class="g-recaptcha" data-sitekey="6Lcg2vQZAAAAAHpqmf6Pj_-t-doxKr1iwLWfQuWQ"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 button-registro">
                                    <button name="submit" class="btn btn-success text-uppercase py-2 px-5 font-10 letter-spacing-1" type="submit"><strong>Regístrate</strong></button>
                                    <a class="font-poppins font-10 text-secondary d-block mt-2" href="https://www.javer.com.mx/avisos-de-privacidad#clientes">Ver Aviso de Privacidad</a>
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