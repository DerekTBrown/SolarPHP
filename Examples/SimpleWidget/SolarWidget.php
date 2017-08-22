<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
</head>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url();
	font-family: 'Droid Sans';
}
-->
</style>
<center>
<?php
$xml = simplexml_load_file("http://www.hamqsl.com/solarxml.php");


$child = $xml->children();
$updated = $child->xpath("updated");
$aindex = $child->xpath("aindex");
$kindex = $child->xpath("kindex");
$solarflux = $child->xpath("solarflux");
$sunspots = $child->xpath("sunspots");
$geomagfield = $child->xpath("geomagfield");
$signalnoise = $child->xpath("signalnoise");
$bandconditiona = $child->xpath("calculatedconditions");
$bandcondition = $bandconditiona[0][0]->xpath("band");
?>
<u>
<?php 
echo "Updated:".$updated[0]."<br/>";
?>
</u>
<?php
echo "A Index : ".$aindex[0]."<br />";
echo "K Index : ".$kindex[0]."<br />";
echo "Sunspots : ".$sunspots[0]."<br />";
echo "Solar Flux : ".$solarflux[0]."<br />";
$cd = 0;
while ($cd <= 7){
if($bandcondition[$cd] == "Poor"){
$html[$cd] = "<font color=\"red\" face=\"Droid Sans\"> Poor </font>";
}
else if($bandcondition[$cd] == "Fair"){
$html[$cd] = "<font color=\"E6E600\" face=\"Droid Sans\"> Fair </font>";
}
else if($bandcondition[$cd] == "Good"){
$html[$cd] = "<font color=\"green\" face=\"Droid Sans\"> Good </font>";
}
$cd++;
}
?> 

<br>
<table width="225" height="171" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="95" height="19" bordercolor="#000000"><div align="center">Band:</div></td>
    <td width="65" bordercolor="#000000"><div align="center">Day:</div></td>
    <td width="65" bordercolor="#000000"><div align="center">Night:</div></td>
  </tr>
  <tr>
    <td height="38" bordercolor="#000000"><div align="center">80M - 40M</div></td>
    <td width="65" bordercolor="#000000"><div align="center"><?php echo $html[0]; ?></div></td>
    <td width="65" bordercolor="#000000"><div align="center"><?php echo $html[4]; ?></div></td>
  </tr>
  <tr>
    <td height="38" bordercolor="#000000"><div align="center">30M - 20M</div></td>
    <td width="65" bordercolor="#000000"><div align="center"><?php  echo $html[1]; ?></div></td>
    <td width="65" bordercolor="#000000"><div align="center"><?php  echo $html[5]; ?></div></td>
  </tr>
  <tr>
    <td height="38" bordercolor="#000000"><div align="center">17M - 15M</div></td>
    <td width="65" bordercolor="#000000"><div align="center"><?php  echo $html[2]; ?></div></td>
    <td width="65" bordercolor="#000000"><div align="center"><?php  echo $html[6]; ?></div></td>
  </tr>
  <tr>
    <td height="38" bordercolor="#000000"><div align="center">12M - 10M</div></td>
    <td width="65" bordercolor="#000000"><div align="center"><?php  echo $html[3]; ?></div></td>
    <td width="65" bordercolor="#000000"><div align="center"><?php  echo $html[7]; ?></div></td>
  </tr>
</table>

<br>
<!--- The Following code adds a live solar view from SOHO to the widget -->
<img src="http://sohowww.nascom.nasa.gov/data/realtime/eit_304/1024/latest.jpg" width="225" height="225">
<br>
<?php
echo "Geo-Magnetic Field : ".$geomagfield[0]."<br />";
echo "Noise : ".$signalnoise[0]."<br />";
?>

</center>
</html>