<?php

require_once('../manager/includes/config.inc.php');
require_once('../manager/includes/protect.inc.php');
define('MODX_API_MODE', true);
require_once('../manager/includes/document.parser.class.inc.php');
$modx = new DocumentParser;
$modx->db->connect();
$modx->getSettings();

require_once('OprstItemsArrayToXML.php');

$result = $modx->getActiveChildren(14);

foreach ($result as $key => $value) {
    $tv = $modx->getTemplateVar('photo_image', '*', $value['id']);
    $result[$key]['photo_image'] = $tv;
}

$oprstItemsArrayToXML = new OprstItemsArrayToXML($keyTagName = 'photo_item');
$xmlString = $oprstItemsArrayToXML->convert($result);
echo $xmlString;