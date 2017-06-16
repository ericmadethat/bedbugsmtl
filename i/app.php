<?php defined('ETITE') or die;

class App
{
	// URI
	public static $uri	= '';
	public static $scheme	= 'http';
	public static $host	= '';
	public static $path	= '';
	public static $query	= '';
	public static $fragment	= '';
	
	// Variables
	public static $lang	= 'en';
	public static $id	= null;
	public static $mail	= false;
	
	// Initiate application
	public static function init()
	{
		// Start session
		session_start();
		self::$id	= md5( session_id() );
		
		// Get URI
		$uri	= 'http://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$uri	= strtolower( trim( urldecode( $uri ) ) );
		$uri	= str_replace( '"', '&quot;', $uri );
		$uri	= str_replace( '<', '&lt;', $uri );
		$uri	= str_replace( '>', '&gt;', $uri );
		$uri	= str_replace( 'index.php', '', $uri );
		$uri	= preg_replace( '/eval\((.*)\)/', '', $uri );
		$uri	= preg_replace( '/[\\\"\\\'][\\s]*javascript:(.*)[\\\"\\\']/', '""', $uri );
		
		// Parse URI
		self::$uri	= $uri;
		$pieces	= @parse_url( $uri );
		$pieces	= is_array( $pieces ) ? $pieces : array();
		self::$scheme	= 'http://';
		self::$host	= @ $pieces['host'];
		self::$path	= @ $pieces['path'];
		self::$query	= @ $pieces['query'];
		self::$fragment	= @ $pieces['fragment'];
		
		// Localhost stuff
		if (self::isLocal())
		{
			// Rewrite host
			self::$host	.= '/b/tite';
			self::$path	= str_replace('/b/tite', '', self::$path);
			
			// Set error reporting
			error_reporting( E_ALL );
		}
		
		$path	= @explode('/', self::$path);
		
		// Set language
		self::setLang( @$path[1] );
		
		// Send email
		self::mail();
	}
	
	public static function uri($path = '', $lang = false) {
		return self::$scheme . self::$host . ($lang ? '/'. self::$lang : '') .'/'. $path;
	}
	
	public static function setLang($path = null)
	{
		$lang	= $path;
		
		// Guess user's preferred language
		if (empty($lang)) {
			$lang	= Lang::guess();
		}
		
		switch ($lang)
		{
			case 'en':
			case 'fr':
				self::$lang	= $lang;
				break;
			
			default:
				self::$lang	= 'en';
		}
		
		// Redirect
		if ($path != self::$lang) {
			App::redirect(self::$lang, 302);
		}
		
		// Load language strings
		Lang::init( self::$lang );
	}
	
	public static function mail()
	{
		// Display mail sent message
		if (isset($_SESSION['mail']) && $_SESSION['mail'] != false) {
			self::$mail	= $_SESSION['mail'];
			$_SESSION['mail']	= false;
			return;
		}
		
		// Performance check
		if (!isset( $_POST[self::$id] )) {
			return;
		}
		
		// Retrieve form data
		$name	= (string) preg_replace('/[^a-z ]/i', '', @$_POST['name']);
		$email	= (string) preg_replace('/[^a-z0-9\+_\.\-@]/i', '', @$_POST['email']);
		$phone	= (string) preg_replace('/[^0-9\+\.\- ]/', '', @$_POST['phone']);
		$msg	= strip_tags(@$_POST['msg']);
		$msg	= 'This is a test. The original message was: "'. $msg .'"';
		$msg	= wordwrap($msg, 70, "\r\n");
		
		// Headers
		$to		= 'nguyen.eric4@gmail.com, francisamankrah@gmail.com';
		$headers	= 'From: '. $name .' <'. $email .'>' . "\r\n" .
						/*'Cc: Francis <francisamankrah@gmail.com>' . "\r\n" .*/
						'Reply-To: '. $name .' <'. $email .'>' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
		
		$mail	= mail(
			$to,
			'Packtite Test mail',
			$msg,
			$headers
		);
		
		// Set mail sent flag
		//$_SESSION['mail']	= $mail ? 'Mail sent. ' : 'Mail NOT sent. ';
		//$_SESSION['mail']	.= 'Details: '. $name .', '. $email .', '. $phone .', saying "'. $msg .'"';
		//$_SESSION['mail']	.= '<br />To Do: display thank you message in "'. $lang .'".';
		//$_SESSION['mail']	= 'Thank you!';
		$_SESSION['mail']	= $mail ? 1 : 2;
		
		// Redirect to contact page
		self::redirect(self::uri('#contact', true), 302);
	}
	
	static public function load($f)
	{
		// Check
		if (!file_exists($f)) {
			return '';
		}
		
		// Retrieve file
		ob_start();
		require $f;
		$html	= ob_get_contents();
		ob_end_clean();
		
		return $html;
	}
	
	static public function inc($p)
	{
		$p	= ETITE . DIRECTORY_SEPARATOR .'i'. DIRECTORY_SEPARATOR . $p;
		if (!file_exists($p)) {
			return '';
		}
		
		require $p;
	}
	
	public static function redirect($to, $status = 302)
	{
		// Status code
		if (is_int($status)) {
			header('HTTP/1.1 '. $status);
		}
		
		// Get redirect URL
		$url	= $to;
		if (strpos($url, 'http') !== 0) {
			$url	= self::$scheme . self::$host .'/'. $url;
		}
		
		// Redirect
		header('Location: '. $url);
		exit;
	}
	
	public static function isLocal() {
		return ($_SERVER['HTTP_HOST'] == 'l33p.com');
		return ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1');
	}
	
	/*
	 * DEPRECATED
	 */
	public static function isLive() {
		return true;
		return ($_SERVER['HTTP_HOST'] != 'localhost' && $_SERVER['HTTP_HOST'] != 'l33p.com');
	}
}

// URI shortcuts
function u($path) {
	return App::uri($path);
}
