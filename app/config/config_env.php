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


define('NGROK_URL','http://inventorynamu.ngrok.io');
define('NGROK_URL_POKUASE','https://inventorypokuase.ngrok.io');





?>
