<?php

$getArray = $_GET;
$photo_gallery_id = $getArray['id'];
$galleriesFolderPath = '../assets/galleries/';

require_once('../manager/includes/config.inc.php');
require_once('../manager/includes/protect.inc.php');
define('MODX_API_MODE', true);
require_once('../manager/includes/document.parser.class.inc.php');
$modx = new DocumentParser;
$modx->db->connect();
$modx->getSettings();

require_once('OprstItemsArrayToXML.php');

$photosList = scandir($galleriesFolderPath.$photo_gallery_id);

$oprstItemsArrayToXML = new OprstItemsArrayToXML($keyTagName = 'photo_gallery_item');
$xmlString = $oprstItemsArrayToXML->convert($photosList);
echo $xmlString;