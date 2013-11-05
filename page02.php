<?
echo "hi";
echo "hello";?>

<style>
    @import 'style.css';
</style>
<?php
echo "test";
$search = "mumbai";
$url = 'http://en.wikipedia.org/w/api.php?action=parse&page='.$search.'&format=json&prop=text&section=0';
$ch = curl_init($url);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_USERAGENT, "TestScript");
$c = curl_exec($ch);
$json = json_decode($c);
$content = $json->{'parse'}->{'text'}->{'*'}; 

$pattern = '#<p>(.*)</p>#Us'; 
if(preg_match($pattern, $content, $matches))
{    
   $para = preg_replace('~\/.*?\/~','',strip_tags($matches[1]));
   $para = preg_replace('~\[.*?\]~','',$para);
   $para = preg_replace('~\{.*?\}~','',$para);
   $para = preg_replace('~\(.*?\)~','',$para);
   $para = preg_replace('~\).*?~','',$para);
}
print $para;
echo "<br><br><br><br><br>";
?>
