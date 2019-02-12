<?php
//header('Content-Type: application/xml');
header('Content-Type: text/html');

$getArray = $_GET;
$video_id = $getArray['id'];

require_once('Init.php');

$modx->documentIdentifier = (int)$video_id;

$result = $modx->runSnippet('JotX', array('config' => 'tree-ajax', 'tplForm' => 'comment_form'));

echo $result;