<div class="container font-poppins">
    <div class="px-3 mb-5">
        <div class="row" style="position: relative;">
            <a id="btn-back" href="<?=Path?>" style="z-index:10;"><img src="<?=Path?>/images/conferencias/btn_back.png"></a>
            <div class="col-lg-4 bg-black rounded-left p-0 text-md-center text-lg-left">
                <div class="p-5 container-title-registro">
                    <div class="px-3">
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
                    <h3 class="font-poppins font-18 text-center mb-3"><strong>¡Te avisamos cuando comience Mundo Javer!</strong></h3>
                    <p class="text-center">Compártenos tus datos y sé uno de los primeros en encontrar el hogar de tus sueños y descubrir las recompensas que tenemos para ti.</p>
                    <div class="px-5 pt-3">
                        <form method="post" action="https://test.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8">
                            <input type=hidden name='captcha_settings' value='{"keyname":"CAPTCHAJAVER","fallback":"true","orgId":"00D530000008hIx","ts":""}'>
                            <input type=hidden name="oid" value="00D530000008hIx">
                            <input type=hidden name="retURL" value="<?=Path?>/preregistro/gracias">
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
                                    <input class="form-control mb-4" type="text" name="last_name" id="last_name" placeholder="Apellidos" required maxlength="80">
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control mb-4" type="text" name="phone" id="phone" placeholder="WhatsApp" required maxlength="40">
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control mb-4" type="email" name="email" id="email" placeholder="Correo" required maxlength="80">
                                </div>
                                <?php /*
                                <div class="col-lg-6">
                                    <select class="form-control mb-4" id="00N3l00000Q7A54" name="00N3l00000Q7A54" title="FraccionamientoInterno" required>
                                        <option value="">--Ninguno--</option>
                                        <option value="ACACIAS">ACACIAS</option>
                                        <option value="ALBERI RESIDENCIAL">ALBERI RESIDENCIAL</option>
                                        <option value="ALBORETO RESIDENCIAL">ALBORETO RESIDENCIAL</option>
                                        <option value="ALVENTO">ALVENTO</option>
                                        <option value="ARBOLADA">ARBOLADA</option>
                                        <option value="ARCOS 7">ARCOS 7</option>
                                        <option value="ARCOS DEL SOL">ARCOS DEL SOL</option>
                                        <option value="ARCOS DEL SOL SECTOR ELITE">ARCOS DEL SOL SECTOR ELITE</option>
                                        <option value="ARRAYANES HABITAT II">ARRAYANES HABITAT II</option>
                                        <option value="BARRIO ESTRELLA">BARRIO ESTRELLA</option>
                                        <option value="BELCANTO">BELCANTO</option>
                                        <option value="BELCANTO II">BELCANTO II</option>
                                        <option value="BELLATERRA">BELLATERRA</option>
                                        <option value="BELLA VISTA 2º SECTOR FOMERREY">BELLA VISTA 2º SECTOR FOMERREY</option>
                                        <option value="BELLA VISTA 3ER SECTOR">BELLA VISTA 3ER SECTOR</option>
                                        <option value="BELLO AMANECER RESIDENCIAL">BELLO AMANECER RESIDENCIAL</option>
                                        <option value="BOSQUE BOREAL">BOSQUE BOREAL</option>
                                        <option value="BOSQUE DE LOS NOGALES">BOSQUE DE LOS NOGALES</option>
                                        <option value="BOSQUE REAL">BOSQUE REAL</option>
                                        <option value="BOSQUES DE CASTILLA">BOSQUES DE CASTILLA</option>
                                        <option value="BOSQUES DE LERMA">BOSQUES DE LERMA</option>
                                        <option value="BOSQUES DE SAN JUAN">BOSQUES DE SAN JUAN</option>
                                        <option value="BOSQUES DE SAN JUAN 2">BOSQUES DE SAN JUAN 2</option>
                                        <option value="BOSQUES DE SAN JUAN 3">BOSQUES DE SAN JUAN 3</option>
                                        <option value="BOSQUES DE SAN JUAN IV">BOSQUES DE SAN JUAN IV</option>
                                        <option value="BOSQUES DE SAN JUAN V">BOSQUES DE SAN JUAN V</option>
                                        <option value="BOSQUES LA HUASTECA">BOSQUES LA HUASTECA</option>
                                        <option value="BULGARIA 533 WELT">BULGARIA 533 WELT</option>
                                        <option value="CAMPANARIO">CAMPANARIO</option>
                                        <option value="CIMA SERENA">CIMA SERENA</option>
                                        <option value="CIMA SERENA II">CIMA SERENA II</option>
                                        <option value="CUMBRE ALTA">CUMBRE ALTA</option>
                                        <option value="CUMBRES ALLEGRO">CUMBRES ALLEGRO</option>
                                        <option value="CUMBRES ALLEGRO DPTOS">CUMBRES ALLEGRO DPTOS</option>
                                        <option value="CUMBRES ANDARA">CUMBRES ANDARA</option>
                                        <option value="CUMBRES BRITANIA">CUMBRES BRITANIA</option>
                                        <option value="CUMBRES PLATINO">CUMBRES PLATINO</option>
                                        <option value="EDUARDO LOARCA CASTILLO IV ETAPA">EDUARDO LOARCA CASTILLO IV ETAPA</option>
                                        <option value="EL MANANTIAL">EL MANANTIAL</option>
                                        <option value="ESTRELLA ELITE">ESTRELLA ELITE</option>
                                        <option value="FUENTES DE BALVANERA">FUENTES DE BALVANERA</option>
                                        <option value="GENERICO RD">GENERICO RD</option>
                                        <option value="HACIENDA DEL BOSQUE">HACIENDA DEL BOSQUE</option>
                                        <option value="HACIENDA EL PALMAR">HACIENDA EL PALMAR</option>
                                        <option value="HACIENDA MOMPANI">HACIENDA MOMPANI</option>
                                        <option value="HACIENDA MONTEBELLO">HACIENDA MONTEBELLO</option>
                                        <option value="HIMALAYA">HIMALAYA</option>
                                        <option value="JARDINES DE ALEJANDRIA">JARDINES DE ALEJANDRIA</option>
                                        <option value="JARDINES DE BUGAMBILIAS">JARDINES DE BUGAMBILIAS</option>
                                        <option value="JARDINES DE CASTALIAS">JARDINES DE CASTALIAS</option>
                                        <option value="JARDINES DE GIRASOLES">JARDINES DE GIRASOLES</option>
                                        <option value="JARDINES DE MAGNOLIAS">JARDINES DE MAGNOLIAS</option>
                                        <option value="JARDINES DE MAGNOLIAS II">JARDINES DE MAGNOLIAS II</option>
                                        <option value="JOLLAS DE ANAHUAC">JOLLAS DE ANAHUAC</option>
                                        <option value="LAS AGUILAS">LAS AGUILAS</option>
                                        <option value="LAS HADAS">LAS HADAS</option>
                                        <option value="LAS LUCES">LAS LUCES</option>
                                        <option value="LAS QUINTAS">LAS QUINTAS</option>
                                        <option value="LOMA REAL">LOMA REAL</option>
                                        <option value="LOMBARDIA RESIDENCIAL">LOMBARDIA RESIDENCIAL</option>
                                        <option value="LOS ABEDULES">LOS ABEDULES</option>
                                        <option value="LOS ALAMOS">LOS ALAMOS</option>
                                        <option value="LOS CANTAROS">LOS CANTAROS</option>
                                        <option value="LOS CANTAROS MTY">LOS CANTAROS MTY</option>
                                        <option value="LOS CARACOLES">LOS CARACOLES</option>
                                        <option value="LOS COMETAS">LOS COMETAS</option>
                                        <option value="LOS ENCINOS">LOS ENCINOS</option>
                                        <option value="LOS MOLINOS">LOS MOLINOS</option>
                                        <option value="MAGNOLIAS III">MAGNOLIAS III</option>
                                        <option value="MASSARO">MASSARO</option>
                                        <option value="MILA RESIDENCIAL">MILA RESIDENCIAL</option>
                                        <option value="MILENIUM RESIDENCIAL">MILENIUM RESIDENCIAL</option>
                                        <option value="MIRAFLORES">MIRAFLORES</option>
                                        <option value="MIRASOL RESIDENCIAL">MIRASOL RESIDENCIAL</option>
                                        <option value="MONTE BEISTEGUI">MONTE BEISTEGUI</option>
                                        <option value="NEXXUS CRISTAL">NEXXUS CRISTAL</option>
                                        <option value="NEXXUS DIAMANTE">NEXXUS DIAMANTE</option>
                                        <option value="NEXXUS PLATINO">NEXXUS PLATINO</option>
                                        <option value="PASEO COTO TONALA">PASEO COTO TONALA</option>
                                        <option value="PASEO DE GUADALUPE">PASEO DE GUADALUPE</option>
                                        <option value="PASEO DE LOS NOGALES">PASEO DE LOS NOGALES</option>
                                        <option value="PASEO KUSAMIL">PASEO KUSAMIL</option>
                                        <option value="PASEO NIKTE">PASEO NIKTE</option>
                                        <option value="PASEO SAN JUNIPERO">PASEO SAN JUNIPERO</option>
                                        <option value="PASEOS DEL SUR">PASEOS DEL SUR</option>
                                        <option value="PEDREGAL DEL RIO">PEDREGAL DEL RIO</option>
                                        <option value="PIRAMIDES">PIRAMIDES</option>
                                        <option value="PORTAREAL">PORTAREAL</option>
                                        <option value="PORTOALTO">PORTOALTO</option>
                                        <option value="PORTO SECTOR FLORENCIA">PORTO SECTOR FLORENCIA</option>
                                        <option value="PRIVADA ALTUS">PRIVADA ALTUS</option>
                                        <option value="PRIVADA ALTUS II">PRIVADA ALTUS II</option>
                                        <option value="PRIVADA CEREZO">PRIVADA CEREZO</option>
                                        <option value="PRIVADA LOS PRADOS">PRIVADA LOS PRADOS</option>
                                        <option value="PRIVADA MONTEJO">PRIVADA MONTEJO</option>
                                        <option value="PRIVADA RIVIERA">PRIVADA RIVIERA</option>
                                        <option value="PRIVADA SANTA ANITA">PRIVADA SANTA ANITA</option>
                                        <option value="PRIVADAS BORNEO">PRIVADAS BORNEO</option>
                                        <option value="PRIVADAS CARANDAY">PRIVADAS CARANDAY</option>
                                        <option value="PRIVADAS CUMBRES DIAMANTE">PRIVADAS CUMBRES DIAMANTE</option>
                                        <option value="PRIVADAS DE ANAHUAC INGLÉS">PRIVADAS DE ANAHUAC INGLÉS</option>
                                        <option value="PRIVADAS DE ANAHUAC SEC. FRANCES">PRIVADAS DE ANAHUAC SEC. FRANCES</option>
                                        <option value="PRIVADAS DE ANAHUAC SECTOR IRLANDES">PRIVADAS DE ANAHUAC SECTOR IRLANDES</option>
                                        <option value="PRIVADAS DE LA MONTAÑA">PRIVADAS DE LA MONTAÑA</option>
                                        <option value="PRIVADAS DEL ANGEL">PRIVADAS DEL ANGEL</option>
                                        <option value="PRIVADAS DE LA REYNA">PRIVADAS DE LA REYNA</option>
                                        <option value="PRIVADAS DEL CANADA">PRIVADAS DEL CANADA</option>
                                        <option value="PRIVADAS DEL CONTRY">PRIVADAS DEL CONTRY</option>
                                        <option value="PRIVADAS DE LINCOLN">PRIVADAS DE LINCOLN</option>
                                        <option value="PRIVADAS DEL PONIENTE">PRIVADAS DEL PONIENTE</option>
                                        <option value="PRIVADAS DE SAN MIGUEL">PRIVADAS DE SAN MIGUEL</option>
                                        <option value="PRIVADAS DIAMANTE">PRIVADAS DIAMANTE</option>
                                        <option value="PRIVADAS MASÁI">PRIVADAS MASÁI</option>
                                        <option value="PRIVADAS OCANIA">PRIVADAS OCANIA</option>
                                        <option value="PRIVADA VIA SIETE">PRIVADA VIA SIETE</option>
                                        <option value="PRIVALIA AMBIENTA">PRIVALIA AMBIENTA</option>
                                        <option value="PRIV CANADA SEC VANCOUVER">PRIV CANADA SEC VANCOUVER</option>
                                        <option value="PUNTA CASTILLA">PUNTA CASTILLA</option>
                                        <option value="PUNTA ESTRELLA">PUNTA ESTRELLA</option>
                                        <option value="QUINTA VERSALLES">QUINTA VERSALLES</option>
                                        <option value="REAL DE LA LOMA">REAL DE LA LOMA</option>
                                        <option value="REAL DEL SOL">REAL DEL SOL</option>
                                        <option value="REAL DEL SOL ADJUDICADO">REAL DEL SOL ADJUDICADO</option>
                                        <option value="REAL DE PALMAS">REAL DE PALMAS</option>
                                        <option value="RESIDENCIAL APODACA">RESIDENCIAL APODACA</option>
                                        <option value="RESIDENCIAL PRIVADA LAS PLAZAS">RESIDENCIAL PRIVADA LAS PLAZAS</option>
                                        <option value="RESIDENCIAL VALLE AZUL">RESIDENCIAL VALLE AZUL</option>
                                        <option value="RESIDENZA III">RESIDENZA III</option>
                                        <option value="RESIDENZA PRIVADAS">RESIDENZA PRIVADAS</option>
                                        <option value="RINCONADA DE SAN ANTONIO II">RINCONADA DE SAN ANTONIO II</option>
                                        <option value="RINCONADA LAGO DE GUADALUPE">RINCONADA LAGO DE GUADALUPE</option>
                                        <option value="RINCONADAS DEL SOL">RINCONADAS DEL SOL</option>
                                        <option value="RUISEÑORES">RUISEÑORES</option>
                                        <option value="RUISEÑORES 2">RUISEÑORES 2</option>
                                        <option value="SANDARA RESIDENCIAL">SANDARA RESIDENCIAL</option>
                                        <option value="SAN MIGUELITO 2º SECTOR">SAN MIGUELITO 2º SECTOR</option>
                                        <option value="TORRE LUNA">TORRE LUNA</option>
                                        <option value="TREBOLES">TREBOLES</option>
                                        <option value="VALLE DE LA SILLA">VALLE DE LA SILLA</option>
                                        <option value="VALLE DE LINCOLN">VALLE DE LINCOLN</option>
                                        <option value="VALLE DE LINCOLN 4TA ET 2DA Y 3A">VALLE DE LINCOLN 4TA ET 2DA Y 3A</option>
                                        <option value="VALLE DE LINCOLN ADJUDICADO">VALLE DE LINCOLN ADJUDICADO</option>
                                        <option value="VALLE DE LINCOLN SEC ELITE">VALLE DE LINCOLN SEC ELITE</option>
                                        <option value="VALLE DE LINCOLN SEC SAN AGUSTIN">VALLE DE LINCOLN SEC SAN AGUSTIN</option>
                                        <option value="VALLE DE LINCOLN SEC SAN JOSE">VALLE DE LINCOLN SEC SAN JOSE</option>
                                        <option value="VALLE DE LINCOLN SEC SANTA LUCIA">VALLE DE LINCOLN SEC SANTA LUCIA</option>
                                        <option value="VALLE DE LINCOLN SECTOR MINAS">VALLE DE LINCOLN SECTOR MINAS</option>
                                        <option value="VALLE DE LINCOLN SECTOR SAN JOSE 2DA ETAPA">VALLE DE LINCOLN SECTOR SAN JOSE 2DA ETAPA</option>
                                        <option value="VALLE DEL NORTE">VALLE DEL NORTE</option>
                                        <option value="VALLE DEL NORTE ADJUDICADO">VALLE DEL NORTE ADJUDICADO</option>
                                        <option value="VALLE DEL NORTE SECTOR JARDIN">VALLE DEL NORTE SECTOR JARDIN</option>
                                        <option value="VALLE DEL NORTE SECTOR MONTAÑA">VALLE DEL NORTE SECTOR MONTAÑA</option>
                                        <option value="VALLE DE LOS ENCINOS">VALLE DE LOS ENCINOS</option>
                                        <option value="VALLE DE LOS ENCINOS II">VALLE DE LOS ENCINOS II</option>
                                        <option value="VALLE DE LOS MOLINOS">VALLE DE LOS MOLINOS</option>
                                        <option value="VALLE DEL ROBLE">VALLE DEL ROBLE</option>
                                        <option value="VALLE DEL SOL">VALLE DEL SOL</option>
                                        <option value="VALLE DE SAN BLAS">VALLE DE SAN BLAS</option>
                                        <option value="VALLE DE SANTA ELENA">VALLE DE SANTA ELENA</option>
                                        <option value="VALLE DE SANTA MARIA">VALLE DE SANTA MARIA</option>
                                        <option value="VALLE DE SANTA MARIA ADJUDICADO">VALLE DE SANTA MARIA ADJUDICADO</option>
                                        <option value="VALLE DE SANTIAGO">VALLE DE SANTIAGO</option>
                                        <option value="VALLE DE SANTIAGO III">VALLE DE SANTIAGO III</option>
                                        <option value="VALLE DE SANTIAGO SECTOR II">VALLE DE SANTIAGO SECTOR II</option>
                                        <option value="VALLE DE TEJEDA II">VALLE DE TEJEDA II</option>
                                        <option value="VALLE DE TEJEDA III">VALLE DE TEJEDA III</option>
                                        <option value="VALLE DE TONANTZIN">VALLE DE TONANTZIN</option>
                                        <option value="VALLE DE TONANTZIN II">VALLE DE TONANTZIN II</option>
                                        <option value="VALLE DE TONANTZIN III">VALLE DE TONANTZIN III</option>
                                        <option value="VALLE SANTA ISABEL">VALLE SANTA ISABEL</option>
                                        <option value="VILLALTA">VILLALTA</option>
                                        <option value="VILLALTA MTY">VILLALTA MTY</option>
                                        <option value="VILLA MONTAÑA">VILLA MONTAÑA</option>
                                        <option value="VILLA MONTAÑA ETAPA IV">VILLA MONTAÑA ETAPA IV</option>
                                        <option value="VILLAS DE ANAHUAC ALPES">VILLAS DE ANAHUAC ALPES</option>
                                        <option value="VILLAS DEL JARAL">VILLAS DEL JARAL</option>
                                        <option value="VILLAS DE LORETO II">VILLAS DE LORETO II</option>
                                        <option value="VILLAS DEL PUERTECITO">VILLAS DEL PUERTECITO</option>
                                        <option value="VILLAS DEL RIO">VILLAS DEL RIO</option>
                                        <option value="VILLAS LA PIEDAD">VILLAS LA PIEDAD</option>
                                        <option value="VIÑEDOS">VIÑEDOS</option>
                                        <option value="VIÑEDOS DEL SUR">VIÑEDOS DEL SUR</option>
                                        <option value="VISTA HERMOSA">VISTA HERMOSA</option>
                                        <option value="VISTA MAGNA">VISTA MAGNA</option>
                                    </select>
                                </div>
                                */ ?>
                                <div class="col-lg-6">
                                    <div style="position:absolute;top:-30px;">
                                        <div class="g-recaptcha" data-sitekey="6Lcg2vQZAAAAAHpqmf6Pj_-t-doxKr1iwLWfQuWQ"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
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
</div>
<style>
    .g-recaptcha   {
        transform: scale(0.80);
        -webkit-transform:scale(0.80);
        transform-origin: 0 0;
        -webkit-transform-origin: 0 0;
    }
</style>