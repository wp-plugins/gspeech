<?php

$txt = $_GET['q'];
$txt = strip_tags($txt);
$txt = preg_replace('/<script\b[^>]*>(.*?)<\/script>/si', "", $txt);
$txt = preg_replace('/<style\b[^>]*>(.*?)<\/style>/si', "", $txt);
$txt = str_replace(array("\"","'"),"",$txt);
$txt = str_replace("&nbsp;","",$txt);
$txt = urlencode($txt);

$lang = (string)$_GET['l'];
if($_GET['tr_tool'] == 'g') {
    $type = 'audio/mpeg';
    $url = 'http://translate.google.com/translate_tts?ie=UTF-8&q=' . $txt . '&tl=' . $lang.'&format=';
}

$ch = curl_init ($url) ;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ;
$media = curl_exec($ch) ;
curl_close($ch) ;

$content_length = strlen($media);

header("Content-type: ".$type);
header("Content-length: ".$content_length);
echo $media;
?>