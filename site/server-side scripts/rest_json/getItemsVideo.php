<?php
header('Content-Type: application/json');

$getArray = $_GET;
$image_width = $getArray['width'];
$image_height = $getArray['height'];

require_once('Init.php');
require_once('getImageThumb.php');

$result = $modx->getActiveChildren(VIDEO,'id','DESC',$fields);
$thumbs=new ThumbMaker($modx);

foreach ($result as $key => $value) {
    $tv1 = $modx->getTemplateVar('videoimage', '*', $value['id']);
    $tv2 = $modx->getTemplateVar('our_notour', '*', $value['id']);
    $tv3 = $modx->getTemplateVar('video', '*', $value['id']);
	$tv4 = $modx->getTemplateVar('project', '*', $value['id']);
    $result[$key]['preview'] = $tv1['value'];
    $result[$key]['thumb'] = $thumbs->getThumb($result[$key]['preview'],
        $image_width,$image_height);
    $result[$key]['our'] = $tv2['value'];
    $result[$key]['youtube'] = $tv3['value'];
	$result[$key]['project']=$tv4['value'];
}

$json=json_encode($result);
//$gson=gzencode($json);
//header('Content-Encoding: gzip');
//header('Content-Length: '.strlen($gson));

echo $json;
