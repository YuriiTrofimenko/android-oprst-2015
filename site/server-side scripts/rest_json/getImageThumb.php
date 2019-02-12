<?php
class ThumbMaker{
private $cachePath='../assets/cache/images/';
private $modx;
function __construct($modx)
{
    $this->modx = $modx;
}
public function getThumb($image_path,$image_width,$image_height){
$result =$image_path;
if(file_exists('../'.$image_path)){
$image_thumb_path=$this->cachePath.dirname($image_path).'/'.
        $image_width.'x'.$image_height.'-'.basename($image_path);
$image_size = getimagesize('../'.$image_path);
if(isset($image_width)&&$image_width!=0){
if($image_width>$image_size[0] || $image_height>$image_size[1]){
if(isset($image_height)&&$image_height!=0){
if($image_width>$image_height){
   $k=$image_width/$image_height;
   $image_width=(int)$image_size[0];
   $image_height=(int)$image_width/$k;
}else{
   $k=$image_height/$image_width;
   $image_height=(int)$image_size[1];
   $image_width=(int)$image_height/$k;
}}else{
    $image_width=(int)$image_size[0];
    $image_height=(int)$image_width;
}}
if(!file_exists($image_thumb_path)) {
    $result = $this->modx->runSnippet('phpthumb', array(
        'input' => $image_path,
        'options' => 'w=' . $image_width . '&h=' . $image_height . '&zc=1'));
//'options' => 'w='.$image_width.'&h='.$image_height.'&far=1'));
}else{
    $result =$image_thumb_path;
}}}
return $result;
}
}
?>