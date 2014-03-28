<?php

class LT {
	public static $langs = ['en','fr'];
	public static $lang = 'en';

	public static function Init() {
		$found = false;
		if (isset($_GET['lang'])) {
			$lang = $_GET['lang'];
			if (in_array($lang, self::$langs)) {
				self::$lang = $lang;
				$found = true;
			}
		}
		if (!$found && isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])) { // try to find the preferred user language
			foreach (explode(',', $_SERVER["HTTP_ACCEPT_LANGUAGE"]) as $s) {
				if (strlen($s) >= 2) {
					$lang = substr($s, 0, 2);
					if (in_array($lang, self::$langs)) {
						self::$lang = $lang;
						break;
					}
				}
			}
		}
	}

	public static function Say( $a ) {
		if (isset($a[LT::$lang]))
			return strval($a[LT::$lang]);
		elseif (isset($a->{LT::$lang}))
			return strval($a->{LT::$lang});
		else
			return strval($a);
	}


	public static function Head() {
		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '<head>';
		echo '<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />';
		echo '<meta name="viewport" content="width=device-width,initial-scale=1.0" />';
		echo '<link href="favicon.ico" rel="icon" type="image/x-icon" />';
		echo '<link href="favicon.png" rel="apple-touch-icon" type="image/png" />';
		echo '<link rel="stylesheet" type="text/css" href="res/lt.css" />';
		echo '<script type="text/javascript" src="res/jquery.js"></script>';
		echo '<script type="text/javascript" src="res/lt.js"></script>';
		echo '</head>';
		echo '<body>';
	}

	public static function Foot() {
		echo '</body></html>';
	}

}

/**
 * Class Project
 * @property $title
 * @property $subtitle
 * @property $icon
 * @property $type
 */
class Project {
	private $data = ['icon'=>'&#xE000'];
	public static function Load($code){ return new Project($code); }
	public function __construct($code) {
		$xml = @simplexml_load_file('prj/' . $code . '/info.xml');
		if ($xml) foreach ($xml as $key => $a) $this->data[$key] = Lt::Say($a);
	}
	public function __get($key) {
		return isset($this->data[$key]) ? $this->data[$key] : '';
	}
}

LT::Init();


function SAY( $a ) { return LT::Say($a); }
