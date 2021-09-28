<div class="container font-poppins">
    <div class="px-3 mb-5">
        <div class="row" style="position: relative;">
            <a id="btn-back" href="<?=Path?>" style="z-index:10;"><img src="<?=Path?>/images/conferencias/btn_back.png"></a>
            <div class="col-lg-4 bg-black rounded-left p-0 text-md-center text-lg-left">
                <div class="p-5 container-title-registro">
                    <div class="px-3 pt-4">
                        <h1 class="text-danger font-37 line-height-32 font-poppins"><strong>Encuentra tu Nuevo Hogar</strong></h1>
                        <h2 class="font-37 line-height-32 text-white font-poppins" style="font-weight: 300;">En Nuestra Expo Virtual</h2>
                    </div>
                </div>
                <div style="position: absolute;bottom:0px;">
                    <img src="<?=Path?>/images/registro/imagen_registro.png">
                </div>
            </div>
            <div class="col-lg-8 bg-white rounded-right" style="position: relative;">
                <div class="p-5">
                    <h3 class="font-poppins font-18 text-center mb-3"><strong>¿Encontraste el hogar de tus sueños?</strong></h3>
                    <p class="text-center">Llena el formulario para ser contactado por uno de nuestros asesores, brindarte atención personalizada y continuar con el proceso.</p>
                    <div class="px-5 pt-3">
                        <form method="post" action="https://test.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8">
                            <input type=hidden name='captcha_settings' value='{"keyname":"CAPTCHAJAVER","fallback":"true","orgId":"00D530000008hIx","ts":""}'>
                            <input type=hidden name="oid" value="00D530000008hIx">
                            <input type=hidden name="retURL" value="<?=Path?>/registro/gracias">
                            <input class="form-control mb-4" type="text" name="00N3l00000Q7A57" id="00N3l00000Q7A57" placeholder="Fuente" required value="">
                            <!--  ----------------------------------------------------------------------  -->
                            <!--  NOTA: Estos campos son elementos de depuración opcionales. Elimine      -->
                            <!--  los comentarios de estas líneas si desea realizar una prueba en el      -->
                            <!--  modo de depuración.                                                     -->
                            <!--  <input type="hidden" name="debug" value=1>                              -->
                            <!--  <input type="hidden" name="debugEmail"                                  -->
                            <!--  value="adminsalesforce@javer.com.mx">                                   -->
                            <!--  ----------------------------------------------------------------------  -->
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <input class="form-control mb-4" type="text" name="first_name" id="first_name" placeholder="Nombre" required maxlength="40">
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control mb-4" type="text" name="last_name" id="last_name" placeholder="Apellido" required maxlength="80">
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control mb-4" type="text" name="phone" id="phone" placeholder="Teléfono" required maxlength="40">
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control mb-4" type="email" name="email" id="email" placeholder="Correo" required maxlength="80">
                                </div>
                                <div class="col-lg-6 align-self-start">
                                    <select class="form-control mb-4" name="00N3l00000Q7A5X" id="00N3l00000Q7A5X" required>
                                        <option>Zona de interés</option>
                                        <option value="UEN1">NUEVO LEON</option>
                                        <option value="UEN3">JALISCO</option>
                                        <option value="UEN4">AGUASCALIENTES</option>
                                        <option value="UEN4">DISTRITO FEDERAL</option>
                                        <option value="UEN4">ESTADO DE MEXICO</option>
                                        <option value="UEN4">QUERETARO</option>
                                        <option value="UEN4">GUANAJUATO</option>
                                        <option value="UEN4">QUINTANA ROO</option>
                                        <option value="UEN4">TAMAULIPAS</option>
                                    </select>
                                </div>
                                <?php /*
                                <div class="col-lg-6">
                                    <div class="form-check mb-3">
                                        <input type="checkbox" name="acepto" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label font-poppins font-10 text-secondary" for="exampleCheck1">Acepto las politicas de privacidad</label>
                                    </div>
                                </div>
                                */ ?>
                                <div class="col-lg-6">
                                    <div style="position:absolute;top:-30px;">
                                        <div class="g-recaptcha" data-sitekey="6Lcg2vQZAAAAAHpqmf6Pj_-t-doxKr1iwLWfQuWQ"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <button name="submit" class="btn btn-danger text-uppercase py-2 px-5 font-10 letter-spacing-1" type="submit"><strong>Registrarme</strong></button>
                                    <label class="font-poppins font-10 text-secondary">Politicas de Mundo Javer</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>