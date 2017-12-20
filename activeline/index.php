<?php
/**
 * Created by PhpStorm.
 * User: pichai
 * Date: 12/24/2016 AD
 * Time: 11:49 PM
 */
session_start();

if (empty($_GET["lang"]) && empty($_SESSION['lang'])) {

    $_SESSION["lang"] = "th";

} else if ($_GET["lang"] == "en" || $_GET["lang"] == "th") {

    $_SESSION["lang"] = $_GET["lang"];

}
//echo $_SESSION['lang'];

/**
 * @package load Config File
 **/
require_once 'config_database.inc.php';
require_once 'lnwphp/lnwphp.php';
require_once 'system2/lang.php';

$pLang = array();

foreach (pLang() as $indexLang => $keyLang) {
    if ($_SESSION["lang"] == $indexLang) {
        foreach ($keyLang as $itemLang => $valueLang) {
            $pLang[$indexLang][$itemLang] = (string)$valueLang;
        }
    }
}
@$pLang = $pLang[$_SESSION['lang']];

/**
 * @package load setting database
 **/
$lnwphp = lnwphp::get_instance();
$setting = $lnwphp->table_array('lp_setting');

/**
 * @package SET URL WEBSITE
 **/
define('URL', $setting->url_web);

/**
 * @package load system theme
 **/
require_once 'system2/_header.php';
require_once 'system2/_navbar.php';
require_once 'system2/_slidshow.php';


if (isset($_GET['id']) AND isset($_GET['page']) AND isset($_GET['name'])) {
    $idpage = $_GET['id'];
    require_once 'system2/p_'.$_GET['page'].'.php';
}else{
    require_once 'system2/_news.php';
//    require_once 'system2/_main.php';
}
//require_once 'system2/_news.php';

require_once 'system2/_footer.php';