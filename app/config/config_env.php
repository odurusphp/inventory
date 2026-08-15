<?php

// Constant to secure "cron" jobs
define('JOBSEC', '$2y$10$VLdXLJRsEFF/lgJ2cQPEguWBLvoGSwpKPL.L3A3phIFyhDaDtr4bW');

define('JSVARS',serialize(array(
	'urlroot' => URLROOT
)));

define('CLOCALPATH',dirname(dirname(dirname( __FILE__ ))));
$xmlpath = CLOCALPATH.'/public/xml/';

define('XMLPATH', $xmlpath);

define('ROUTE_REQUEST',true);


define('NGROK_URL','https://inventorynamu.ngrok.io');
define('NGROK_URL_POKUASE','https://inventorypokuase.ngrok.io');

// The local, git-ignored printer_env.php contains the same API key as
// xprinter-bridge/config.json. An environment variable can override it in production.
$printerEnvFile = __DIR__.'/printer_env.php';
if (is_file($printerEnvFile)) {
    require_once $printerEnvFile;
}
if (!defined('XPRINTER_API_KEY')) {
    define('XPRINTER_API_KEY', getenv('XPRINTER_API_KEY') ?: '');
}





?>
