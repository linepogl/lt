<?php

class LT {
  const DEFAULT_LANG = 'en';
	public static $langs = array('en','fr');
	public static $lang = self::DEFAULT_LANG;
	public static $tab = null;

	public static function Init() {
		$found = false;
		if (isset($_GET['tab'])) self::$tab = $_GET['tab'];
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

	public static function SayTab($tab) {
		switch ($tab) {
			default:
			case 'cinema':
				return SAY(array('en' => 'Cinema','fr' => 'Cinéma'));
			case 'advertising':
				return SAY(array('en' => 'Advertising','fr' => 'Publicités'));
			case 'personal':
				return SAY(array('en' => 'Personal','fr' => 'Personnel'));
		}
	}

	public static function GetProjects($tab) {
		$r = array();
		foreach (scandir('prj') as $f) {
			if ($f == '.' || $f == '..') continue;
			if (!is_dir("prj/$f")) continue;
			if (strtoupper(substr($f,0,1)) !== strtoupper(substr($tab,0,1))) continue;
			$prj = Project::Load($f);
			$r[] = $prj;
		}
		return $r;
	}


	public static function Say( $a ) {
		if (isset($a[LT::$lang]))
			return strval($a[LT::$lang]);
		elseif (isset($a->{LT::$lang}))
			return strval($a->{LT::$lang});
		else
			return strval($a);
	}

    public static function Href($url=null,$query=array()){
        $q = '';
        if (!array_key_exists('lang',$query)) $query['lang'] = self::$lang;
        if (!array_key_exists('tab',$query)) $query['tab'] = self::$tab;
        foreach ($query as $key => $value) {
            if ($value === null) continue;
            $q .= $q==='' ? '?' : '&';
            $q .= urlencode($key).'='.urlencode($value);
        }
        if ($url === null) $url = $_SERVER['PHP_SELF'];
        return $url.$q;
    }


	public static function Head($bg='') {
    $php = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : '';
    echo '<!DOCTYPE html>';
		echo '<html>';
		echo '<head>';
		echo '<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />';
		echo '<meta name="viewport" content="width=device-width,initial-scale=1.0" />';
		echo '<link href="favicon.ico" rel="icon" type="image/x-icon" />';
		echo '<link href="favicon.png" rel="apple-touch-icon" type="image/png" />';
		echo '<link rel="stylesheet" type="text/css" href="_.css" />';
		echo '</head>';
		echo '<body>';
		echo '<div id="head">';
		echo '<a class="logo" href="index.php"><span class="icon">&#xE001;</span></a>';
		echo '<a class="menu-item'.(stripos($php,'contact.php')===false?'':' active').'" href="'.LT::Href('contact.php').'">'.SAY(array('en'=>'Contact','fr'=>'Contacter')).'</a>';
		echo '<a class="menu-item'.(stripos($php,'clients.php')===false?'':' active').'" href="'.LT::Href('clients.php').'">'.SAY(array('en'=>'Clients','fr'=>'Clients')).'</a>';
		echo '<a class="menu-item'.(stripos($php,'portfolio.php')===false?'':' active').'" href="'.LT::Href('portfolio.php').'">'.SAY(array('en'=>'Portfolio','fr'=>'Portfolio')).'</a>';
		echo '<div style="clear:both;"></div>';
		echo '</div>';
		echo '<img id="bg" src="'.HTML($bg==''?'img/bg.jpg':$bg).'" />';
		echo '<div id="main">';

    }



	public static function Foot() {
        echo '</div>';
        echo '<div id="foot">';
        echo '<a class="lang'.(self::$lang==='en'?' active':'').'" href="'.HTML(self::Href(null,array('lang'=>'en'))).'">English</a>';
        echo '<a class="lang'.(self::$lang==='fr'?' active':'').'" href="'.HTML(self::Href(null,array('lang'=>'fr'))).'">Français</a>';
        echo '</div>';

        echo '</body></html>';
	}

}

/**
 * Class Project
 * @property $code
 * @property $title
 * @property $subtitle
 * @property $icon
 * @property $type
 * @property $date
 * @property $description
 */
class Project {
	private $data = array('icon' => '&#xE000');
	public static function Load($code) { return new Project($code); }
	public function __construct($code) {
		$xml = @simplexml_load_file('prj/'.$code.'/info.xml');
		if ($xml) foreach ($xml as $key => $a) $this->data[$key] = Lt::Say($a);
		$this->data['code'] = $code;
	}
	public function __get($key) {
		return isset($this->data[$key])?$this->data[$key]:'';
	}
	public function Render() {
		$php = 'prj/'.$this->code.'/page.php';
		if (file_exists($php)) include($php);
	}
	public function GetThumbnailSrc() {
		$f = 'prj/'.$this->code.'/thumb.jpg';
		return file_exists($f)?$f:'';
	}
	public function GetBackgroundSrc() {
		$f = 'prj/'.$this->code.'/bg.jpg';
		return file_exists($f)?$f:'';
	}
	public function GetDecalSrc() {
		$f = 'prj/'.$this->code.'/decal.png';
		return file_exists($f)?$f:'';
	}
	public function GetTab(){
		switch (strtoupper($this->code[0])) {
			default:
			case 'C': return 'cinema';
			case 'A': return 'advertising';
			case 'P': return 'personal';
		}
	}
	public function GetNextProject(){
		$r = null;
		$found = false;
		foreach (LT::GetProjects($this->GetTab()) as $prj) {
			if ($found) {
				$r = $prj;
				break;
			}
			if ($prj->code === $this->code) {
				$found = true;
			}
		}
		return $r;
	}

}

LT::Init();


function SAY( $a ) { return LT::Say($a); }
function HTML( $s ) { return str_replace(array('&','<','>','"'),array('&amp','&lt;','&gt;','&quot;'),$s); }
