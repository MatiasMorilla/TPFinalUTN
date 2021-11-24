<?php 

	namespace Controllers;

	use Models\Mail as Mail;

	class MailController{

		public function SendGreatings($to){

			$text = "<h3>Oferta finalizada</h3>
					<p>La publicacion a la que se encontraba postulado ha finalizado, muchas gracias por su participacion <p>
					<b>-Equipo UTN Bolsa Laboral-</b>";
			
			$email = new Mail($to, "Finalizacion de oferta", $text);
			$email->send();
		}

		public function SendDeclineInfo($to, $info){

			$text = "<h3>Postulacion rechazada</h3>
					<p> $info </p>
					<b>-Equipo UTN Bolsa Laboral-</b>";
			
			$email = new Mail($to, "Lo lamentamos, su postulacion fue rechazada", $text);
			$email->send();
		}
	}


 ?>