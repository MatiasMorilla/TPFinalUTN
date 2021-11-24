<?php 
	namespace Models;

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;


	require_once 'PHPMailer/Exception.php';
	require_once 'PHPMailer/PHPMailer.php';
	require_once 'PHPMailer/SMTP.php';

	class Mail{

		private $to;
		private $subject;
		private $text;
		private $mail;

		public function __construct($to, $subject, $text){

			$this->mail = new PHPMailer(true);

			try {
	    	//Server settings
		    $this->mail->isSMTP();                                            //Send using SMTP
		    $this->mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		    $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		    $this->mail->Username   = 'utnbolsalaboral@gmail.com';                     //SMTP username
		    $this->mail->Password   = 'php12345';                               //SMTP password
		    $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		    $this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		    //Recipients
		    $this->mail->setFrom('utnbolsalaboral@gmail.com', 'UTN Bolsa Laboral');
		    $this->mail->addAddress($to);     //Add a recipient
		    

		    //Content
		    $this->mail->isHTML(true);                                  //Set email format to HTML
		    $this->mail->Subject = $subject;
		    $this->mail->Body    = $text;
		    $this->mail->AltBody = $text;

	    	
			} catch (Exception $e) {
		    	echo "Error al construir el mail";
			}
		}

		public function send(){

			try{
				$this->mail->send();
				return true;
			}
			catch(Exception $e){

				return false;
			}
		}

		
	}


 ?>