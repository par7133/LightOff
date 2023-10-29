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

$miourl = filter_input(INPUT_GET, "miourl")??"";
$miourl = strip_tags($miourl);
//echo($miourl);
//exit(-1);

if (mb_stripos($miourl, "/google.it/") > 0): ?>

<html>
 <head>
 <title>LightOff</title>
<script src="/js/jquery-3.6.0.min.js" type="text/javascript"></script>
 </head>  
<body>
<div id="content">  
<form id="frm" action="/surf.php" method="GET">
<input type="hidden" name="miourl" value="<?PHP echo($miourl);?>"> 
  <?PHP foreach($_POST as $key => $val):?>
  <input type="hidden" name="<?PHP echo($key);?>" value="<?PHP echo($val);?>">  
<?PHP Endforeach;?>
<?PHP foreach($_GET as $key => $val):?>
<?PHP if ($key !== "miourl"): ?>  
  <input type="hidden" name="<?PHP echo($key);?>" value="<?PHP echo($val);?>">  
<?PHP endif; ?>    
<?PHP Endforeach;?>  
</form>
</div> 
<script>
frm.submit();  
</script>  
</body>  
</html>  

<?PHP elseif (mb_stripos($miourl, "/it.search.yahoo.com/") > 0): ?>

<html>
 <head>
 <title>LightOff</title>
<script src="/js/jquery-3.6.0.min.js" type="text/javascript"></script>
 </head>  
<body>
<div id="content">  
<form id="frm" action="/surf.php" method="GET">
<input type="hidden" name="miourl" value="<?PHP echo($miourl);?>"> 
  <?PHP foreach($_POST as $key => $val):?>
  <input type="hidden" name="<?PHP echo($key);?>" value="<?PHP echo($val);?>">  
<?PHP Endforeach;?>
<?PHP foreach($_GET as $key => $val):?>
<?PHP if ($key !== "miourl"): ?>  
  <input type="hidden" name="<?PHP echo($key);?>" value="<?PHP echo($val);?>">  
<?PHP endif; ?>    
<?PHP Endforeach;?>  
</form>
</div> 
<script>
frm.submit();  
</script>  
</body>  
</html>  

<?PHP else: ?>

<html>
 <head>
 <title>LightOff</title>
<script src="/js/jquery-3.6.0.min.js" type="text/javascript"></script>
 </head>  
<body>
<div id="content">  
<form id="frm" action="/surf.php" method="GET">
<input type="hidden" name="miourl" value="<?PHP echo($miourl);?>"> 
  <?PHP foreach($_POST as $key => $val):?>
  <input type="hidden" name="<?PHP echo($key);?>" value="<?PHP echo($val);?>">  
<?PHP Endforeach;?>
<?PHP foreach($_GET as $key => $val):?>
<?PHP if ($key !== "miourl"): ?>  
  <input type="hidden" name="<?PHP echo($key);?>" value="<?PHP echo($val);?>">  
<?PHP endif; ?>    
<?PHP Endforeach;?>  
</form>
</div> 
<script>
frm.submit();  
</script>  
</body>  
</html>  

<?PHP Endif; ?>