<?php
//	require( 'secure.php' );
class Email_model extends CI_Model {
	public

	function __construct() {
		parent::__construct();
		define( 'email', 'email_lib/' );
	}
	public
	function sendmail( $template, $data ) {
		global $lang;
		$data['base_url'] = base_url();
		include( email . $template . '.php' );
		require_once 'mailer/PHPMailerAutoload.php';
		$mail = new PHPMailer(TRUE);
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.stackmail.com";
			$mail->Port = 465;
		   $mail->AddAddress( 'blindsey@lincollc.net' );
			$mail->AddAddress( 'chris@lincollc.net' );
			$mail->AddAddress( 'sharma.himanshu0405@gmail.com' );
			$mail->Username = "contact@craftnotion.com";
			$mail->Password = "active12345";
			$mail->SetFrom( 'contact@craftnotion.com', "CRAFTNOTION" );
			$mail->AddReplyTo( "contact@craftnotion.com", "CRAFTNOTION" );
		$mail->Subject = $data[ 'subject' ];
		
		$mail->Body = $message;
		$mail->AltBody = $message;
		$mail->IsHTML(true);
		return $mail->Send();

	}
}
?>