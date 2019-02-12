<?php
header('Content-Type: text/html; charset=utf-8');
require_once('Init.php');

$result = $modx->getActiveChildren(VIDEO,'id','DESC',$fields);

foreach ($result as $key => $value) {
	$tv4 = $modx->getTemplateVar('project', '*', $value['id']);
}
echo '<pre>';
var_dump($tv4['elements']);
echo '</pre>';