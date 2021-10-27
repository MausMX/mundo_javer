<?php if(!isset($_SESSION['gracias']) and !isset($_SESSION['abandono_close'])){ ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>function timestamp() { var response = document.getElementById("g-recaptcha-response"); if (response == null || response.value.trim() == "") {var elems = JSON.parse(document.getElementsByName("captcha_settings")[0].value);elems["ts"] = JSON.stringify(new Date().getTime());document.getElementsByName("captcha_settings")[0].value = JSON.stringify(elems); } } setInterval(timestamp, 500); </script>
    <script>function timestamp() { var response = document.getElementById("g-recaptcha-response-1"); if (response == null || response.value.trim() == "") {var elems = JSON.parse(document.getElementsByName("captcha_settings")[1].value);elems["ts"] = JSON.stringify(new Date().getTime());document.getElementsByName("captcha_settings")[1].value = JSON.stringify(elems); } } setInterval(timestamp, 500); </script>
    <link rel="stylesheet" href="https://use.typekit.net/avv6anh.css">
    <?php $ahora=date("YmdHis")?>
    <div id="abandono-block" class="font-poppins bg-radial" style="width:550px;min-height:100%;position:absolute;right:0;">
        <div id="btn-back-abandono" style="position:absolute;top:0px;right:0px;z-index:161;cursor:pointer;"><img src="<?=Path?>/images/conferencias/btn_back.png"></div>
        <div style="padding:50px 60px 0px;">
            <h1 style="font-size:42px;line-height:32px;font-weight:bold;color:#ffffff;text-align:center;margin-bottom:25px;" class="font-poppins">¡Espera!</h1>
            <h2 style="font-size:28px;line-height:32px;font-weight:bold;color:#ffffff;text-align:center;margin-bottom:20px;" class="font-poppins">No te vayas sin registrarte.</h2>
            <h3 style="font-size:18px;text-align:center;margin-bottom:25px;font-weight:bold;" class="font-poppins">Tenemos increíbles regalos para ti.<br> Regístrate, Escritura y Gana.</h3>
            <form method="post" action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" onsubmit="return validar_abandono(this)">
                <input type=hidden name='captcha_settings' value='{"keyname":"MUNDOJAVER","fallback":"true","orgId":"00Do0000000b6Io","ts":""}'>
                <input type="hidden" name="oid" value="00Do0000000b6Io">
                <input type="hidden" name="retURL" value="<?=Path?>/registro/gracias?id=<?=$ahora?>">
                <input type="hidden" name="00N3l00000Q7A57" id="00N3l00000Q7A57" placeholder="Fuente" required value="Mundo Javer">
                <input type="hidden" name="programas" id="programas" value="<?=$ahora?>">
                <input type="hidden" name="00N3l00000Q7A5X" id="00N3l00000Q7A5X" class="form-control zona_interes" placeholder="Zona de interés">
                <!-- <input type="hidden" name="debug" value=1>
                <input type="hidden" name="debugEmail" value="carlos.jug@maus.mx"> -->
                <table style="width:100%;">
                    <tr>
                        <td>
                            <input type="text" name="first_name" id="first_name" placeholder="Nombre" required maxlength="40" style="font-family:poppins,sans-serif;background:#ffffff;font-size:14px;color:#666666;border:1px solid #666;width:100%;margin-bottom:10px;border-radius:5px;padding:3px 8px;">
                        </td>
                        <td>&nbsp;&nbsp;</td>
                        <td>
                            <input type="text" name="phone" id="phone" placeholder="Teléfono" required minlength="10" maxlength="10" style="font-family:poppins,sans-serif;background:#ffffff;font-size:14px;color:#666666;border:1px solid #666;width:100%;margin-bottom:10px;border-radius:5px;padding:3px 8px;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="email" name="email" id="email" placeholder="Correo" required maxlength="80" style="font-family:poppins,sans-serif;background:#ffffff;font-size:14px;color:#666666;border:1px solid #666;width:100%;margin-bottom:10px;border-radius:5px;padding:3px 8px;">
                        </td>
                        <td></td>
                        <td>
                            <select class="estado" name="00N3l00000Q7A4v" id="00N3l00000Q7A4v" required style="font-family:poppins,sans-serif;background:#ffffff;font-size:14px;color:#666666;border:1px solid #666;width:100%;margin-bottom:10px;border-radius:5px;padding:6px 8px 6px 6px;">
                                <!-- <option>Estado</option>
                                <option value="Aguascalientes">Aguascalientes</option>
                                <option value="Ciudad de México">Ciudad de México</option>
                                <option value="Estado de México">Estado de México</option>
                                <option value="Guanajuato">Guanajuato</option>
                                <option value="Jalisco">Jalisco</option>
                                <option value="Nuevo León">Nuevo León</option>
                                <option value="Querétaro">Querétaro</option>
                                <option value="Quintana Roo">Quintana Roo</option>
                                <option value="Tamaulipas">Tamaulipas</option> -->
                                <option value="">--Estado--</option>
                                <option value="Aguascalientes">Aguascalientes</option>
                                <option value="Baja California">Baja California</option>
                                <option value="Baja California Sur">Baja California Sur</option>
                                <option value="Campeche">Campeche</option>
                                <option value="Chiapas">Chiapas</option>
                                <option value="Chihuahua">Chihuahua</option>
                                <option value="Ciudad de México">Ciudad de México</option>
                                <option value="Coahuila">Coahuila</option>
                                <option value="Colima">Colima</option>
                                <option value="Durango">Durango</option>
                                <option value="Estado de México">Estado de México</option>
                                <option value="Guanajuato">Guanajuato</option>
                                <option value="Guerrero">Guerrero</option>
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Jalisco">Jalisco</option>
                                <option value="Michoacán">Michoacán</option>
                                <option value="Morelos">Morelos</option>
                                <option value="Nayarit">Nayarit</option>
                                <option value="Nuevo León">Nuevo León</option>
                                <option value="Oaxaca">Oaxaca</option>
                                <option value="Puebla">Puebla</option>
                                <option value="Querétaro">Querétaro</option>
                                <option value="Quintana Roo">Quintana Roo</option>
                                <option value="San Luis Potosí">San Luis Potosí</option>
                                <option value="Sinaloa">Sinaloa</option>
                                <option value="Sonora">Sonora</option>
                                <option value="Tabasco">Tabasco</option>
                                <option value="Tamaulipas">Tamaulipas</option>
                                <option value="Tlaxcala">Tlaxcala</option>
                                <option value="Veracruz">Veracruz</option>
                                <option value="Yucatán">Yucatán</option>
                                <option value="Zacatecas">Zacatecas</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <div class="containter-captcha">
                    <div id="recaptcha-abandono" class="g-recaptcha" data-sitekey="6LcKQOocAAAAAMz5X3c9pxRyCRKNaNKQO0uI4p19" style="transform:scale(0.70);-webkit-transform:scale(0.70);transform-origin:0 0;-webkit-transform-origin:0 0;zoom:1.3;"></div>
                </div>
                <button id="btn-registro-registro" name="submit" style="font-weight:bold;font-size:14px;background-color:#69AF1F;color:#ffffff;display:inline-block;text-align:center;vertical-align:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;border:1px solid transparent;padding:.375rem .75rem;border-radius:.25rem;transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;letter-spacing:1px;width:100%;" type="submit">REGÍSTRATE</button>
                <div style="text-align:center;"><a style="font-size:10px;color:#ffffff;margin:15px 0px;display:block;" class="font-poppins" target="_blank" href="https://www.javer.com.mx/avisos-de-privacidad#clientes">Ver Aviso de Privacidad</a></div>
                <p style="font-size:10px;color:#ffffff;line-height:12px;">
                    <span style="color:#FF0000;">*</span> Los beneficios de Mundo Javer aplican para nuevos registros a partir del 1ro de octubre 2021. Si ya cuentas con un registro previo a esta fecha o estás en contacto con un asesor para tu vivienda, regístrate en Mundo Javer y recibirás un regalo especial de ahorro energético para tu vivienda.
                </p>
            </form>
        </div>
        <div style="text-align:center;"><img width="50%" src="<?=Path?>/images/abandono/regalo_abandono.png"></div>
    </div>
    <style>
        #abandono{background:rgba(0,0,0,.9);position:fixed;top:0px;right:0px;width:100%;z-index:1000;min-height:100%;}
        #abandono > div{position:absolute;width: 100%;min-height:100%;}
        #abandono .font-sweet-sans-pro {font-family: sweet-sans-pro, sans-serif;}
        #abandono .font-poppins{font-family:poppins, sans-serif;}
        #abandono .bg-radial{
            /*background: top right radial-gradient(#42A6EF, #254DA7);-ms-radial-gradient:top right radial-gradient(#42A6EF, #254DA7);*/
            /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#42a6ef+0,2989d8+50,207cca+51,254da7+100 */
            /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#42a6ef+0,254da7+100 */
            background: #42a6ef; /* Old browsers */
            background: -moz-radial-gradient(center, ellipse cover,  #42a6ef 0%, #254da7 100%); /* FF3.6-15 */
            background: -webkit-radial-gradient(center, ellipse cover,  #42a6ef 0%,#254da7 100%); /* Chrome10-25,Safari5.1-6 */
            background: radial-gradient(ellipse at center,  #42a6ef 0%,#254da7 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#42a6ef', endColorstr='#254da7',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        }
    </style>
    <script>
        function validar_abandono(a) {
            var response = grecaptcha.getResponse(s('#recaptcha-abandono').attr('data-widget-id'));
            if(response.length == 0){
                alert("Captcha no verificado");
                return false;
                event.preventDefault();
            } else {
                //alert("Captcha verificado");
                return true;
            }
        }
        $(".estado").on('change',function(){
            switch ($(this).val()) {
                case 'Nuevo León':
                    $('.zona_interes').val('UEN1 - NUEVO LEON');
                    break;
                case 'Jalisco':
                    $('.zona_interes').val('UEN3 - JALISCO');
                    break;
                case 'Aguascalientes':
                    $('.zona_interes').val('UEN4 - AGUASCALIENTES');
                    break;
                case 'Ciudad de México':
                    $('.zona_interes').val('UEN4 - DISTRITO FEDERAL');
                    break;
                case 'Estado de México':
                    $('.zona_interes').val('UEN4 - ESTADO DE MEXICO');
                    break;
                case 'Querétaro':
                    $('.zona_interes').val('UEN4 - QUERETARO');
                    break;
                case 'Guanajuato':
                    $('.zona_interes').val('UEN4 - GUANAJUATO');
                    break;
                case 'Quintana Roo':
                    $('.zona_interes').val('UEN4 - QUINTANA ROO');
                    break;
                    case 'Tamaulipas':
                    $('.zona_interes').val('UEN4 - TAMAULIPAS');
                    break;
                default:
                    break;
            }
        });
    </script>
<? }else{ ?>
    <style>
        #abandono{display:none;}
    </style>
<? } ?>