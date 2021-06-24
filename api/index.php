<!DOCTYPE html>
<html lang="en">
<head>
<title>Website IP Address Lookup - PHP</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Website IP Lookup">
<meta name="robots" content="all"/>
<style type="text/css">
	body{color:#666;text-align:center;font-family:arial;font-size:.8em;}
	body,td{font:16px/20px "Lucida Grande","Lucida Sans Unicode",Verdana,Arial,sans-serif}
	a{border-bottom:1px solid #ddd;color:#21759b;text-decoration:none}
	a:hover,a:focus{color:green;border-color:#d54e21}
	p,form{margin: 10px 0 0 0}
	ul,li{margin:0;padding:0}
	li{list-style: disc inside;padding-left:10px}
	#gmap_canvas{width:100%;height:30em;}
</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="aedev.css">
</head>

<body>
<br>

<?php
$ip = htmlentities($_GET["ip"]);
$hostname = gethostbyaddr($_GET['ip']);
$location = json_decode(file_get_contents('http://freegeoip.net/json/'.$ip));
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
if(isset($_GET['ip']))
{
echo '
<div class="container">
    <div class="head">
     <h2>Website IP Lookup - PHP </h2>
     </div>
<form method="get" action="">
<input type="text" name="ip" id="ip" maxlength="25" placeholder="Website URL" title="ENTER WEBSITE URL HERE" />
<button id="submit" type="submit">
      Get IP Address
    </button>
';
echo " <h3>--------------------------------</h3>";
echo "<br><b>Website Information</b>";
echo "<br><b>IP: </b>" .$location->ip;
echo "<br><b>Country name: </b>" .$location->country_name;
echo "<br><b>Country code: </b>" .$location->country_code;
echo "<br><b>City: </b>" .$location->city;
echo "<br><b>State/Region: </b>" .$location->region_name;
echo "<br><b>Region code: </b>" .$location->region_code;
echo "<br><b>Zip code: </b>" .$location->zip_code;
echo "<br><b>Time zone: </b>" .$location->time_zone;
echo " <h3>--------------------------------</h3>";
echo " </form></div></b>";
echo <<<HTML
HTML;
}
else {
print ('
<div class="container">
    <div class="head">
     <h2>Website IP Lookup - PHP </h2>
     </div>
<form id="contact" method="get" action="">
<input type="text" name="ip" id="ip"  placeholder="Website URL" title="Enter Website URL Here" value="'.$IP.'" />
<button id="submit" type="submit">
      Get IP Address
    </button>
    </div>
</form>
</div>
');
}
?>

<?php
/* you can use this api too :)
$ip = htmlentities($_GET["ip"]);
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo "IP: " .$details->ip;
echo "<br>Country: " .$details->country;
echo "<br>City: " .$details->city;
echo "<br>Region: " .$details->region;
echo "<br>Hostname: " .$details->hostname;
echo "<br>Organization: " .$details->org;
echo "<br>Location: " .$details->loc;
*/
?>
</body>
<footer><br><a href="https://magelang1337.com/">Developers</a></br></footer>
</html>
