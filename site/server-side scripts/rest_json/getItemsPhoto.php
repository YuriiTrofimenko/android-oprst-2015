<?php
header('Content-Type: application/json, text/plain, */*');
header('Content-Encoding: gzip');

$getArray = $_GET;
$image_width = $getArray['width'];
$image_height = $getArray['height'];

require_once('Init.php');
require_once('getImageThumb.php');

$result = $modx->getActiveChildren(FOTO,'id','DESC',$fields);
$thumbs=new ThumbMaker($modx);

foreach ($result as $key => $value) {
    $tv1 = $modx->getTemplateVar('photo_image', '*', $value['id']);
    $tv2 = $modx->getTemplateVar('our_notour', '*', $value['id']);
    $result[$key]['preview'] = $tv1['value'];
    $result[$key]['thumb'] = $thumbs->getThumb($result[$key]['preview'],
        $image_width,$image_height);
    $result[$key]['our'] = $tv2['value'];
}

$json=json_encode($result);
$gson=gzencode($json);

//header('Content-Length: '.strlen($gson));

echo $json;