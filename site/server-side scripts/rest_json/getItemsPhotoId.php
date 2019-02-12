<?php
require_once('Init.php');
$md5_photoId=$_SESSION['md5_photoId'];
if(!isset($md5_photoId)){
$result = $modx->getActiveChildren(FOTO,'id','DESC','id');
$values=array();
foreach ($result as $key => $value) {
	$values[]=$value['id'];
}
$result=implode('',$values);
$md5_photoId=md5($result);
$_SESSION['md5_photoId']=$md5_photoId;
}
echo $md5_photoId;