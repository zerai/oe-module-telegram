<?php
declare(strict_types=1);
require_once(__DIR__ . "/../../../../../../../../globals.php");

use OpenEMR\Modules\TelegramNotifier\Infrastructure\Ui\FooController;
use OpenEMR\Modules\TelegramNotifier\Infrastructure\Ui\BarController;

echo "Module Telegram - index";

echo "<HR>";

echo "GLOBALS - assets_static_relative: ".$GLOBALS['assets_static_relative'];

echo "<BR>";
echo "GLOBALS - rootdir: ".$GLOBALS['rootdir'];

echo "<BR>";
echo "GLOBALS - fileroot: ".$GLOBALS['fileroot'];

echo "<BR>";
echo "GLOBALS - srcdir: ".$GLOBALS['srcdir'];

echo "<BR>";
echo "GLOBALS - webroot: ".$GLOBALS['webroot'];

echo "<BR>";
echo "GLOBALS - OE_SITES_BASE: ".$GLOBALS['OE_SITES_BASE'];

echo "<BR>";
echo "GLOBALS - OE_SITE_DIR: ".$GLOBALS['OE_SITE_DIR'];

echo "<BR>";
echo "GLOBALS - OE_SITE_WEBROOT: ".$GLOBALS['OE_SITE_WEBROOT'];


echo "<BR>";
echo "GLOBALS - css_header: ".$GLOBALS['css_header'];


echo "<BR>";
echo "GLOBALS - baseModDir: ".$GLOBALS['baseModDir'];
echo "<BR>";
echo "GLOBALS - customModDir: ".$GLOBALS['customModDir'];
echo "<BR>";
echo "GLOBALS - zendModDir: ".$GLOBALS['zendModDir'];


############################################################################
############################################################################

echo "<HR>";

echo "SESSION - site_id: ".$_SESSION['site_id'];
echo "<BR>";

echo "SESSION - authUserID: ".$_SESSION['authUserID'];


############################################################################
############################################################################


echo "<HR>";

echo "Available services / objects";
echo "<BR>";

echo "Twig - "; //.$GLOBALS['twig']; //$twig = $GLOBALS['twig'];
echo "<BR>";

echo "Kernel - "; //    var_dump($GLOBALS["kernel"]);
echo "<BR>";

echo "ModulesApplication - "; //.$GLOBALS['modules_application']; //$modulesApplication = $GLOBALS['modules_application'];
echo "<BR>";
