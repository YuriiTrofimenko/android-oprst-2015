<?php
require_once('../manager/includes/config.inc.php');
require_once('../manager/includes/protect.inc.php');

define('MODX_API_MODE', true);
define('FOTO',14);
define('VIDEO',15);

require_once('../manager/includes/document.parser.class.inc.php');

$modx = new DocumentParser;
$modx->db->connect();
$modx->getSettings();
startCMSSession();
$modx->minParserPasses=2;

$fields='id,pagetitle';