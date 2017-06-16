<?php defined('ETITE') or die;


class Lang
{
	private static $lang	= null;
	
	public static function init($l = 'en')
	{
		// Performance check
		if (!is_null( self::$lang )) {
			return;
		}
		
		// Use PHP-gettext instead of native
		require ETITE . DIRECTORY_SEPARATOR .'i'. DIRECTORY_SEPARATOR .'gettext.inc';
		
		// Set locale
		self::$lang	= $l;
		_setlocale(LC_MESSAGES, $l);
		
		// Load language files
		_bindtextdomain($l, ETITE . DIRECTORY_SEPARATOR .'l');
		_bind_textdomain_codeset($l, 'UTF-8');
		_textdomain($l);
	}
	
	public static function guess()
	{
		// From query
		if (isset( $_REQUEST['lang'] )) {
			return $_REQUEST['lang'];
		}
		
		// From browser settings
		if (isset( $_SERVER["HTTP_ACCEPT_LANGUAGE"] )) {
			return substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
		}
		
		// Default
		return 'en';
	}
	
	public static function switcher()
	{
		switch (self::$lang)
		{
			case 'fr':
				$h	= '<a href="'. App::uri('en') .'">English</a> | Français';
				break;
			
			default:
				$h	= 'English | <a href="'. App::uri('fr') .'">Français</a>';
		}
		
		return $h;
	}
}
