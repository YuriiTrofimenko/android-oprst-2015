<?php

require_once('../manager/includes/config.inc.php');
require_once('../manager/includes/protect.inc.php');
define('MODX_API_MODE', true);
require_once('../manager/includes/document.parser.class.inc.php');
$modx = new DocumentParser;
$modx->db->connect();
$modx->getSettings();

startCMSSession();
$modx->minParserPasses=2;



//require_once('OprstItemsArrayToXML.php');
//
//$result = $modx->getActiveChildren(14);
//
//foreach ($result as $key => $value) {
//    $tv = $modx->getTemplateVar('photo_image', '*', $value['id']);
//    $result[$key]['photo_image'] = $tv;
//}
//
//$oprstItemsArrayToXML = new OprstItemsArrayToXML($keyTagName = 'photo_item');
//$xmlString = $oprstItemsArrayToXML->convert($result);
//echo $xmlString;
$modx->documentIdentifier = 408;

$result = $modx->runSnippet('JotX', array('config' => 'tree-ajax', 'tplForm' => $modx->getChunk('comment_form')));
echo $result;