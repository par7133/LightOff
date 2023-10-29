<?PHP

/**
 * Copyright 2021, 2024 5 Mode
 *
 * This file is part of LightOff.
 *
 * LightOff is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * LightOff is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.  
 * 
 * You should have received a copy of the GNU General Public License
 * along with LightOff. If not, see <https://www.gnu.org/licenses/>.
 *
 * surf.php
 * 
 * The surfing page.
 *
 * @author Daniele Bonini <my25mb@aol.com>
 * @copyrights (c) 2016, 2024, 5 Mode
 */

require("config.inc");

echo("<div style='top:5px;font-weight:900;background-color:#FFFFFF;'>&nbsp;LIGHTOFF&nbsp;&nbsp;(<a href='http://github.com/par7133/LightOff' target='_blank'>on github</a>)</div><br><br>");

$url = filter_input(INPUT_GET, "miourl")??"";
$url = strip_tags($url);
//echo($url."<br>");
if ($url == "") {
  echo "<p>404 LightOff url doesn't exist.</p>\n";
  exit;
}
if (substr($url, 0, 4) === "http") {
  $ipos = stripos($url, "/", 8);
  if ($ipos) {
    $domain = substr($url, 0, $ipos);  
  } else {
    $domain = $url;
  }    
} else {
  $domain = stripos($url, "/");
  if ($ipos) {
    $domain = "http://" . substr($url, 0, $ipos);  
  } else {
    $domain = "http://" . $url;
  }  
} 
//echo($domain."<br>");

// xxx
if (mb_stripos($url, "?") === false) {
  $url = $url . "?miot=t";
}
foreach($_GET as $key=>$val) {
  if ($key !== "miourl") {
    $url = $url . "&$key=" . urlencode($val);  
  }  
}
// end xxx

$file = fopen($url, "r");
if (!$file) {
    echo "<p>404 LightOff url doesn't exist.</p>\n";
    exit;
}
$w = "";
while (!feof($file)) {
  $w .= fgets($file, 20000);
}
fclose($file);

$ipos = stripos($w, "</head>");
$head = substr($w, 0, $ipos + 7); 
$body = substr($w, $ipos + 7); 

$head = str_ireplace("</head>", "<script src='".APP_HOST."/js/jquery-3.6.0.min.js' type='text/javascript'></script>\n<script src='".APP_HOST."/js/common.js' type='text/javascript'></script>\n<link href='".APP_HOST."/css/style.css' type='text/css' rel='stylesheet'>\n<link href='".APP_HOST."/css/bootstrap.min.css' type='text/css' rel='stylesheet'>\n</head>", $head);

if (mb_stripos($head, "<base") === false ) {
  $head = str_ireplace("</head>", "<base href='$domain/'>\n</head>", $head);
}  

$head = str_ireplace('src="//', 'src="https://', $head);
$head = str_ireplace('src="/', 'src="'.$domain.'/', $head);
$head = preg_replace('/src="(.{6}(?<!http:\/)(?<!https:)(?<!ftp:\/\/).+)"/iU', "src=\"".$domain."/$1\"", $head); 
$head = preg_replace("/src='(.{6}(?<!http:\/)(?<!https:)(?<!ftp:\/\/).+)'/iU", "src='".$domain."/$1'", $head);
//$head = preg_replace("/src=(.{6}(?<!http:\/)(?<!https:)(?<!ftp:\/\/).+)/iU", "src='".$domain."/$1'", $head);
//$head = str_ireplace('src="js/', 'src="'.$domain.'/js/', $head);
//$head = str_ireplace('src="/js/', 'src="'.$domain.'/js/', $head);
$head = str_ireplace('href="//', 'href="https://', $head);
$head = str_ireplace('href="/', 'href="'.$domain.'/', $head);
$head = preg_replace('/href="(.{6}(?<!http:\/)(?<!https:)(?<!ftp:\/\/).+)"/iU', "href=\"".$domain."/$1\"", $head); 
$head = preg_replace("/href='(.{6}(?<!http:\/)(?<!https:)(?<!ftp:\/\/).+)'/iU", "href='".$domain."/$1'", $head);
//$head = preg_replace("/href=(.{6}(?<!http:\/)(?<!https:)(?<!ftp:\/\/).+)/iU", "href='".$domain."/$1'", $head);

//$body = preg_replace("/<body .+>/iU", "$0\n<form id='LIGHTOFFfrmUpload' role='form' method='get' action='/surf2.php' target='_self' enctype='multipart/form-data'>\n<div id='LIGHTOFFcontent'><div id='LIGHTOFFheader-surf'><br>&nbsp;&nbsp;<span style='font-weight:900;'>LIGHTOFF</span><br></div>", $body);

//$body = str_ireplace("</body>", "<input type='url' id='LIGHTOFFurl' name='LIGHTOFFurl' value='https://5mode.com' style='display: none;'>&nbsp;<input id='LIGHTOFFSubmit' name='LIGHTOFFSubmit' type='submit' style='display: none;'><br>\n\n</div>\n\n</form>\n\n<script src='http://lightoff.doggy/js/surf.js' type='text/javascript'></script>\n\n</body>", $body); 
$body = str_ireplace("</body>", "\n\n<script src='".APP_HOST."/js/surf.js' type='text/javascript'></script>\n\n</body>", $body); 

$body = str_ireplace('src="//', 'src="https://', $body);
$body = str_ireplace('src="/', 'src="'.$domain.'/', $body);
$body = preg_replace('/src="(.{6}(?<!http:\/)(?<!https:)(?<!ftp:\/\/).+)"/iU', "src=\"".$domain."/$1\"", $body); 
$body = preg_replace("/src='(.{6}(?<!http:\/)(?<!https:)(?<!ftp:\/\/).+)'/iU", "src='".$domain."/$1'", $body);
//$body = preg_replace("/src=(.{6}(?<!http:\/)(?<!https:)(?<!ftp:\/\/).+)/iU", "src='".$domain."/$1'", $body);
//$body = str_ireplace('src="js/', 'src="'.$domain.'/js/', $body);
//$body = str_ireplace('src="/js/', 'src="'.$domain.'/js/', $body);
$body = str_ireplace('href="//', 'href="https://', $body);
$body = str_ireplace('href="/', 'href="'.$domain.'/', $body);
$body = preg_replace('/href="(.{6}(?<!http:\/)(?<!https:)(?<!ftp:\/\/).+)"/iU', "href=\"".$domain."/$1\"", $body); 
$body = preg_replace("/href='(.{6}(?<!http:\/)(?<!https:)(?<!ftp:\/\/).+)'/iU", "href='".$domain."/$1'", $body);
//$body = preg_replace("/href=(.{6}(?<!http:\/)(?<!https:)(?<!ftp:\/\/).+)/iU", "href='".$domain."/$1'", $body);

//$body = str_ireplace('action="//', 'action="'.APP_HOST.'/surf.php?url=https://', $body);
//$body = str_ireplace('action="/', 'action="'.APP_HOST.'/surf.php?url='.$domain.'/', $body);
//$body = str_ireplace('action="//', 'action="https://', $body);
//$body = str_ireplace('action="/', 'action="'.$domain.'/', $body);
$body = str_ireplace('action="https://', 'action="'.APP_HOST.'/post.php?miourl=https://', $body);
$body = str_ireplace('action="//', 'action="'.APP_HOST.'/post.php?miourl=https://', $body);
$body = str_ireplace('action="/', 'action="'.APP_HOST.'/post.php?miourl='.$domain.'/', $body);
$body = preg_replace('/action="(.{6}(?<!http:\/)(?<!https:)(?<!ftp:\/\/).+)"/iU', "action=\"".APP_HOST."/post.php?miourl=".$domain."/$1\"", $body); 
$body = preg_replace("/action='(.{6}(?<!http:\/)(?<!https:)(?<!ftp:\/\/).+)'/iU", "action='".APP_HOST."/post.php?miourl=".$domain."/$1'", $body);

$body = str_ireplace('<form', '<form method="POST"', $body);
$body = str_ireplace('method="GET', 'method="POST', $body);
//$body = str_ireplace('</form>', "<input name=\"miourl\" type=\"hidden\"></form>", $body);

//YAHOO
if ((mb_stripos($url, "yahoo.it")!==false) || (mb_stripos($url, "yahoo.com")!==false))  {
  $ipos = mb_stripos($body, '<div id="doc"');
  if ($ipos !== false) {
    $body = substr($body,$ipos);
  }
}

$body = preg_replace('/href="(.+)"/iU', "href=\"".APP_HOST."/surf.php?miourl=$1\"", $body); 

$w = $head . $body;

echo($w);    

//YAHOO
if (mb_stripos($url, "yahoo.it")!==false) {
//  echo("<div style='clear:both'>&nbsp;</div><br><br><br><br><br><br><br><br><br>");
}


?>

 