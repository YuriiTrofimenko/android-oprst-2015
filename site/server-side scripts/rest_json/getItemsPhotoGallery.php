<?php
header('Content-Type: application/json');
header('Content-Encoding: gzip');

$getArray = $_GET;
$photo_gallery_id = $getArray['id'];
$image_width = $getArray['width'];
$image_height = $getArray['height'];
$galleriesFolderPath = 'assets/galleries/';
$image_path = $galleriesFolderPath.$photo_gallery_id.'/';
$image_src='../'.$galleriesFolderPath.$photo_gallery_id.'/';
$cachePath='../assets/cache/images/';
$image_thumb_path=$cachePath.$image_path.$image_width.'x'.$image_height.'-';

require_once('Init.php');
require_once('getImageThumb.php');

$photosList = scandir($image_src);
$result=array();
$thumbs=new ThumbMaker($modx);

foreach ($photosList as $photo) {
    if(is_file($image_src.$photo)){
    $val['preview'] =$image_path.$photo;
    $val['thumb'] = $thumbs->getThumb($val['preview'],$image_width,$image_height);
    $result[]=$val;}
}

$json=json_encode($result);
$gson=gzencode($json);

//header('Content-Length: '.strlen($gson));

echo $json;
