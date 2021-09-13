<?php class Email {
    
    public function  __construct() {
    }
	
	static public function contacto($datos = array()){
		// Estas son cabeceras que se usan para evitar que el correo llegue a SPAM:
		$headers = "From: Nombre <tu@dominio.com>\r\n";
		$headers .= 'Bcc: carlos@jug.mx' . "\r\n";
		$headers .= "X-Mailer: PHP5\n";
		$headers .= 'MIME-Version: 1.0' . "\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// Definir el correo de destino:
		if($datos["email"])
			$dest .=" ,".strip_tags($datos["email"]);
		// Aqui definimos el asunto y armamos el cuerpo del mensaje
		
		$asunto = "Formulario de contacto: ";
		$contenido = "	<br /><br /><table>
							<tr>
								<td>Nombre</td><td>".strip_tags(html_entity_decode($datos['nombre']))."</td>
							</tr>
							<tr>
								<td>Email</td><td>".strip_tags(html_entity_decode($datos['email']))."</td>
							</tr>
							<tr>
								<td>Empresa</td><td>".strip_tags(html_entity_decode($datos['empresa']))."</td>
							</tr>
							<tr>
								<td>Teléfono}</td><td>".strip_tags(html_entity_decode($datos['telefono']))."</td>
							</tr>
							<tr>
								<td>Comentarios</td><td>".strip_tags(html_entity_decode($datos['comentarios']))."</td>
							</tr>
						</table>";
		
		
		$html = "<div style='margin-left:auto; margin-right:auto; width:630px;'>";
		// $html .= "<img style='display:block;' src='".Path."/images/email/email_header.jpg' />";
		$html .= "<div style='width:591px; padding-left:15px; padding-right:15px; font-size:12px; line-height:17px; color:#555;'>".$contenido."</div>";
		// $html .= "<img style='display:block;' src='".Path."/images/email/email_footer.jpg' />";
		$html .= "</div>";
		
		if(mail($dest,$asunto,$html,$headers)){
			$_SESSION["msj"]="Correo enviado satisfactoriamente, a la brevedad nos pondremos en contacto.";
		}else{
			$_SESSION["msj"]="No pudimos enviar tu correo inténtalo de nuevo mas tarde.";
		}
		
    }

	static public function forgotpass($datos = array()){
		require '../flavor/helpers/PHPMailer/PHPMailerAutoload.php';
    	$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = '';
		$mail->SMTPAuth = true;
		$mail->Username = '';
		$mail->Password = '';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = '465';
		$mail->CharSet = "UTF-8";
		
		$mail->setFrom('correo@tudominio.com', 'Nombre del titular de la cuenta');
		$mail->addAddress('correo@tudominio.com', 'Nombre del titular de la cuenta');
		$mail->addBCC('correo@tudominio.com', 'Nombre del titular de la cuenta');
		$mail->isHTML(true);
		$mail->Subject = 'Notificacion - Recuperacion de contraseña';
		$html = "	<div style='margin-left:auto; margin-right:auto; width:630px;'>";
		$html .= "	<div align='center'><img width='250' style='display:block;' src='".Path."/images/assets/callejon.jpg' /></div><br><br>";
		$html .= "	<div style='width:591px; padding-left:15px; padding-right:15px; font-size:12px; line-height:17px; color:#555;'>";
		$html .= "		<h1>Recuperación de contraseña</h1><hr>";
		$html .= "		Tu nueva contraseña de acceso es: <b>".$datos["newpass"]."</b>";
		$html .= "		<br><br><hr><br>Nuestro sistema podras verlo en: ".Path.".<br><br>Si aun no cuentas con tus datos de acceso ve con uno de los encargados para que te de de alta o selecciona la opcion de recuperar contraseña.";
		$html .= "	</div>";
		$mail->Body    = $html;
		if(!$mail->send()) {
		    echo 'El correo no se pudo enviar.';
		    echo 'Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Mensaje enviado correctamente.';
		}
    }
	
	static public function buzon($datos = array(),$casa = array()){
    	require '../flavor/helpers/PHPMailer/PHPMailerAutoload.php';
    	$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = '';
		$mail->SMTPAuth = true;
		$mail->Username = '';
		$mail->Password = '';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = '465';
		$mail->CharSet = "UTF-8";
		
		$mail->setFrom('correo@tudominio.com', 'Nombre del titular de la cuenta');
		$mail->addAddress('correo@tudominio.com', 'Nombre del titular de la cuenta');
		$mail->addReplyTo('correo@tudominio.com', 'Nombre del titular de la cuenta');
		$mail->addBCC('correo@tudominio.com', 'Nombre del titular de la cuenta');
		$mail->isHTML(true);
		$mail->Subject = $datos["asunto"];
		$mail->Body    = $datos["contenido"]." <br><br>idCondomino: ".$_SESSION['condomino_callejon']["idCondomino"]."<br><br>Condomino: ".$_SESSION['condomino_callejon']["nombre"]." ".$_SESSION['condomino_callejon']["app"]." ".$_SESSION['condomino_callejon']["apm"]."<br><br>Correo: ".$_SESSION['condomino_callejon']["email"]."<br><br>ID Casa: ".$_SESSION['condomino_callejon']["idCasa"]."<br><br>Domicilio: {$casa['calle']} #{$casa['numero']}";
		if(!$mail->send()) {
		    echo 'El correo no se pudo enviar.';
		    echo 'Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Mensaje enviado correctamente.';
		}
	}
	
	//como usarlo 
    //Email::forgotpass($datos);
    
    static public function test(){
    	require '../flavor/helpers/PHPMailer/PHPMailerAutoload.php';
    	$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = '';
		$mail->SMTPAuth = true;
		$mail->Username = '';
		$mail->Password = '';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = '465';
		$mail->CharSet = "UTF-8";
		
		$mail->setFrom('correo@tudominio.com', 'Nombre del titular de la cuenta');
		$mail->addAddress('correo@tudominio.com', 'Nombre del titular de la cuenta');
		$mail->addBCC('correo@tudominio.com', 'Nombre del titular de la cuenta');
		$mail->addReplyTo('correo@tudominio.com', 'Nombre del titular de la cuenta');
		$mail->isHTML(true);
		$mail->Subject = 'Es una prueba del envio de correos';
		$mail->Body    = 'Usemos html a ver si lo interpreta bien <b>En negritas!</b>';
		$mail->AltBody = 'Este es el texto plano para vistas preliminares del contenido';
		if(!$mail->send()) {
		    echo 'El correo no se pudo enviar.';
		    echo 'Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Mensaje enviado correctamente.';
		}
	}
    
    //Email::contacto($this->data);
}?>