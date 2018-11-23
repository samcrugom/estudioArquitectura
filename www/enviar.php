<?php

//Capturo los datos que nos envían desde el formulario

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$tfno = $_POST["tfno"];
$mensaje = $_POST["mensaje"];
$privacidad = $_POST["privacidad"];

//Controlamos en primer lugar que hayan aceptado la Política de Privacidad

if ($privacidad == 1) {
	
	//Controlamos que los campos obligatorios estén rellenos
	
	if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
		
		//Preparamos el e-mail
		
		$to = "email_del_receptor@prueba.com";
		
		$subject = "Contacto desde la Web";
		
		$message = "<h3>Un usuario ha enviado esta consulta desde la web:</h3>";
		$message .= "<ul>";
		$message .= "<li>Nombre: " . $nombre . "</li>";
		$message .= "<li>E-Mail: " . $email . "</li>";
		$message .= "<li>Teléfono: " . $tfno . "</li>";
		$message .= "<li>Mensaje: " . $mensaje . "</li>";
		$message .= "</ul>";
		
		$headers = 'Reply-To: info@prueba.com' . "\r\n" .
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				
		//Enviamos el e-mail mediante la función nativa MAIL()
		
		$envio = @mail($to, $subject, $message, $headers);
		
		if ($envio) {
			echo "<p>El E-Mail se ha enviado correctamente</p>";
		} else {
			echo "<p>Ha ocurrido un error y el e-mail no ha podido ser enviado.</p>";
		}
		
	} else {
		echo "<p>Los campos marcados con * son obligatorios</p>";
	}
	
} else {
	echo "<p>Debes aceptar la Política de Privacidad</p>";
}

?>