<html>
<head>
<link href="style.css" rel="stylesheet">

</head>
<body>


<?php
$name = str_replace(" ", "%20", $_POST['name']);

$url9="https://en.wikipedia.org/w/api.php?action=query&list=search&srsearch=".$name."&srprop=timestamp&format=xml";

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url9);    // get the url contents

$data = curl_exec($ch); // execute curl request
curl_close($ch);
echo gettype($data);
$xml = simplexml_load_string($data);
echo gettype($xml);
$array = json_decode(json_encode($xml), 1);
//print_r($array[query]);

foreach ($array[query] as $test){
//print_r($search);

foreach($test[p][0] as $search){
$name = $search[title];

}}
$name = str_replace(" ", "%20", $name);
//$url = "https://en.wikipedia.org/w/api.php?action=query&list=search&srsearch=india&srprop=timestamp";
$url="http://en.wikipedia.org/w/api.php?action=query&titles=".$name."&prop=extracts&format=xml&exintro=1";
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);    // get the url contents

$data = curl_exec($ch); // execute curl request
curl_close($ch);

$xml = simplexml_load_string($data);
//print_r($xml);
$array = json_decode(json_encode($xml), 1);
//print_r($array);
foreach ($array as $test){
//print_r($test);
//echo $test[extract];
//print_r($test[pages]);
foreach ($test[pages] as $result) {
//$string = substr($result[extract], 0, 500); 
//echo $string;
//$string1 = preg_replace('/[^(\x20-\x7F)]*/','', $string);
$string1 = substr(trim(preg_replace('/\s*\([^)]*\)/', '', $result[extract])), 0, 1500);
$string1 = substr(preg_replace('~\/.*?\/~','',$string1), 0 ,300);
//$string1 = preg_replace('\/+', '0', $string1); 
//$string1 = str_replace('', '-', $string1);
//$string1 = preg_replace('/\s*\([^)]*\)/', '', $string1);
//$string1 = preg_replace('/[^A-Za-z0-9\-]/', ' ', $string1);
//$string1 = substr(str_replace(")", "" ,$string1), 0, 300);
//echo $string1;
$string1 = explode(".", $string1);
$len = count($string1);
if($len == 4){
$string1 = $string1[0].". ".$string1[1].". ".$string1[2].".";}
else if($len == 3) {
$string1 = $string1[0].". ".$string1[1].".";
}
else if($len == 2){
$string1 = $string1[0].".";
}
}

}

$url1="http://en.wikipedia.org/w/api.php?action=query&titles=".$name."&prop=images&format=xml";
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url1);    // get the url contents

$data = curl_exec($ch); // execute curl request
curl_close($ch);

$xml = simplexml_load_string($data);
//print_r($xml);
$array = json_decode(json_encode($xml), 1);
//print_r($array);
foreach ($array as $test){;
//echo $test[extract];
//print_r($test[pages]);
foreach ($test[pages] as $result) {
//print_r($result[images]);
foreach ($result[images] as $image){
//print_r($image[0]);
foreach($image[0] as $titl){

$image_name = $titl[title];
$tttt = explode(":", $image_name);
//echo $tttt[1]; 

}}
}
}
$image_nm = str_replace(" ", "%20", $tttt[1]);
$url2="http://en.wikipedia.org/w/api.php?action=query&titles=Image:".$image_nm."&format=xml&prop=imageinfo&iiprop=url";
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url2);    // get the url contents

$data = curl_exec($ch); // execute curl request
curl_close($ch);

$xml = simplexml_load_string($data);
//print_r($xml);
$array = json_decode(json_encode($xml), 1);
//print_r($array);
foreach ($array as $test){;

foreach($test as $sorc) {

foreach($sorc[page] as $img_src){
//print_r($img_src[ii]);
//print_r($sorc[page]);
//echo "<br>";
foreach($img_src[ii] as $img_url ){
echo "<div class='main' style='width:500px;border:1px grey;padding:10px 10px 10px 10px;'>";
echo "<img src='".$img_url[url]."' width='250px' height='150px'>";
echo "<br>";
echo "<h2>".str_replace("%20", " ", $name)."</h2>";
echo $string1;
echo "</div>";
}
}
}
}
?>

</body>
</html>
