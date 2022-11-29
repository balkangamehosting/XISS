<?php
# Disallow direct access
if (!_ROUTING_)	die("Error (NO ROUTING) :: Direct access not allowed...");

/**
 * Mail 
 * 
 * Mail functionality...
 * 
 */
class Mail extends API
{	
	/**
	 * Sent email - system to user
	 * 
	 * @param string $to Address
	 * @param string $subject Subject
	 * @param message $message Message
	 * @return boolean
	 */
	public function system_mail($to, $subject='', $message)
	{
		$subject = wordwrap($subject, 70, "\r\n");
		
		$headers = 'From: "' .  MAIL_SYSTEM . '" <'.MAIL_SYSTEM.'>' ."\r\n" . 
			'Sender: ' . WS_SITENAME . '<'.MAIL_SYSTEM.'>' ."\r\n" . 
			'MIME-Version: 1.0' . "\r\n" .
			'Content-type: text/plain; charset=UTF-8' . "\r\n";
		
		/*
		$headers  = 'From: "ECGNetwork" <no-reply@ecgnetwork.co>' . "\r\n";
		$headers .= 'Sender: "ECGNetwork" <no-reply@ecgnetwork.co>' . "\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
		$headers .= 'X-MimeOLE: PHP/' . phpversion() . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n" ;
		$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\r\n";
		$headers .= "Content-Transfer-Encoding: 8bit\r\n";
		$headers .= "X-Priority: 3\r\n";
		$headers .= "X-MSMail-Priority: Normal\r\n";
		*/
		
		# Replaces link breaks and clears tabs..
		if (mail($to, WS_SITENAME . ': '. "=?utf-8?B?".base64_encode($subject)."?=", 
				$text = str_replace("\n.", "\r\n", $message) . 
					"\r\n\n" . '-------' . "\r\n" . WS_URL, $headers))
			return true;
		else
			return false;
	}
}