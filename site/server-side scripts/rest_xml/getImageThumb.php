<?php

$getArray = $_GET;
$image_gallery = $getArray['gallery'];
$image_name = $getArray['name'];
$image_width_k = $getArray['kw'];
$image_height_k = $getArray['kh'];
$galleriesFolderPath = 'assets/galleries/';

require_once('../manager/includes/config.inc.php');
require_once('../manager/includes/protect.inc.php');
define('MODX_API_MODE', true);
require_once('../manager/includes/document.parser.class.inc.php');
$modx = new DocumentParser;
$modx->db->connect();
$modx->getSettings();

startCMSSession();
$modx->minParserPasses=2;

$image_size = getimagesize(
        '../'.$galleriesFolderPath.$image_gallery.'/'.$image_name);
$image_width = (int)($image_size[0] / $image_width_k);
$image_height = (int)($image_size[1] / $image_height_k);

$result = $modx->runSnippet('phpthumb', array(
    'input' => $galleriesFolderPath.$image_gallery.'/'.$image_name,
    'options' => 'w='.$image_width.'&h='.$image_height.'&far=1'));

echo $result;

?>