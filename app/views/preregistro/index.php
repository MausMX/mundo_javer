<div class="container font-poppins">
    <div class="row mb-5 container-gracias-center" style="position: relative;">
        <div class="col-lg-4 col-md-4 bg-black rounded-left p-0 text-md-center text-lg-left">
            <a id="btn-back" class="d-block d-lg-none d-md-none d-xl-none" href="<?=Path?>" style="z-index:10;"><img src="<?=Path?>/images/conferencias/btn_back.png"></a>
            <div class="p-5 container-title-registro">
                <div class="pl-5 pr-4"><h1 class="text-danger font-30 line-height-32 font-poppins"><strong>Encuentra tu nuevo hogar</strong></h1></div>
                <div class="pl-5 pr-4"><h2 class="font-30 line-height-32 text-white font-poppins" style="font-weight: 300;">en nuestra Expo Virtual y gana regalos ecológicos</h2></div>
            </div>
            <div class="img-registro-main"><img src="<?=Path?>/images/registro/imagen_preregistro.png"></div>
        </div>
        <div class="col-lg-8 col-md-8 bg-white rounded-right registro-form" style="position: relative;">
            <a id="btn-back" class="d-none d-lg-block d-md-block d-xl-block" href="<?=Path?>" style="z-index:10;"><img src="<?=Path?>/images/conferencias/btn_back.png"></a>
            <div class="p-5 padding-registro">
                <h3 class="font-poppins font-18 text-center mt-5 mb-4"><strong>¡Te avisamos cuando comience Mundo Javer!</strong></h3>
                <p class="text-center">Compártenos tus datos y sé uno de los primeros en encontrar el hogar de tus sueños y descubre todos los regalos ecológicos que tendremos para ti.</p>
                <div class="px-5 pt-4 padding-registro">
                    <form method="post" action="https://test.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8">
                        <input type="hidden" name='captcha_settings' value='{"keyname":"CAPTCHAJAVER","fallback":"true","orgId":"00D530000008hIx","ts":""}'>
                        <input type="hidden" name="oid" value="00D530000008hIx">
                        <input type="hidden" name="retURL" value="<?=Path?>/preregistro/gracias">
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
                            <div class="col-lg-6 col-md-6"><input class="form-control mb-4" type="text" name="phone" id="phone" placeholder="WhatsApp" required maxlength="40"></div>
                            <div class="col-lg-6 col-md-6"><input class="form-control mb-4" type="email" name="email" id="email" placeholder="Correo" required maxlength="80"></div>
                            <div class="col-lg-6 col-md-6"><div class="containter-captcha" style="position:absolute;top:-30px;"><div class="g-recaptcha" data-sitekey="6Lcg2vQZAAAAAHpqmf6Pj_-t-doxKr1iwLWfQuWQ"></div></div></div>
                            <div class="col-lg-6 col-md-6 button-registro">
                                <button name="submit" class="btn btn-success text-uppercase py-2 px-5 font-10 letter-spacing-1" type="submit"><strong>Registrarme</strong></button>
                                <label class="font-poppins font-10 text-secondary">Politicas de Mundo Javer</label>
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