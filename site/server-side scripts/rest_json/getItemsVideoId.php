<?php
require_once('Init.php');
$md5_videoId=$_SESSION['md5_videoId'];
if(!isset($md5_videoId)){
$result = $modx->getActiveChildren(VIDEO,'id','DESC','id');
$values=array();
foreach ($result as $key => $value) {
	$values[]=$value['id'];
}
$result=implode('',$values);
$md5_videoId=md5($result);
$_SESSION['md5_videoId']=$md5_videoId;
}
echo $md5_videoId;