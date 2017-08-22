<?php

/* SolarPHP is a program developed by Derek Brown (W4DTB)

It is based on Solar Data from N0NBH 
http://www.hamqsl.com/solar.html

License:
You are permitted to use, duplicate, modify and redistribute this file.  Ther use also agrees and is subject to all licenses published by hamqsl.com as well.  You do not need to cite me if you republish this work, however all copies, distributions and derivative works must rely on the same license.  If you made something from this code, or have any questions, email them to me at W4DTB@arrl.net
*/

// Load the XML File
$xml = simplexml_load_file("http://www.hamqsl.com/solarxml.php");
$child = $xml->children();

// Load Variables 
$updated = $child->xpath("updated");
$solarflux = $child->xpath("solarflux");
$aindex = $child->xpath("aindex");
$kindex = $child->xpath("kindex");
$kindexnt = $child->xpath("kindexnt");
$xray = $child->xpath("xray");
$sunspots = $child->xpath("sunspots");
$heliumline = $child->xpath("heliumline");
$protonflux = $child->xpath("protonflux");
$electonflux = $child->xpath("electonflux");
$aurora = $child->xpath("aurora");
$normalization = $child->xpath("normalization");
$latdegree = $child->xpath("latdegree");
$solarwind = $child->xpath("solarwind");
$magneticfield = $child->xpath("magneticfield");
$geomagfield = $child->xpath("geomagfield");
$signalnoise = $child->xpath("signalnoise");
$fof2 = $child->xpath("fof2");

// Load Arrays
$hfconditiona = $child->xpath("calculatedconditions");
$hfcondition = $hfconditiona[0][0]->xpath("band");
$vhfconditiona = $child->xpath("calculatedvhfconditions");
$vhfcondition = $vhfconditiona[0][0]->xpath("phenomenon");

// Load color coded HTML

$cd = 0;
while ($cd <= 7){
if($hfcondition[$cd] == "Poor"){
$html[$cd] = "<font size=\"2\" color=\"FF3B3B\" face=\"Droid Sans\"> Poor </font>";
}
else if($hfcondition[$cd] == "Fair"){
$html[$cd] = "<font size=\"2\" color=\"yellow\" face=\"Droid Sans\"> Fair </font>";
}
else if($hfcondition[$cd] == "Good"){
$html[$cd] = "<font size=\"2\" color=\"54FF36\" face=\"Droid Sans\"> Good </font>";
}
$cd++;
}

?>



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
	color:White;
	font-size:small;
}
.style4 {font-size: small; }
-->
</style>
<body bgcolor="Black">
<center>
<br/>
<u>
<?php 
echo $updated[0]."<br/>";
?>
</u>
<?php 
echo "SFI: ".$solarflux[0]."&nbsp;"."&nbsp;";
echo "SN: ".$sunspots[0]."<br/>";
echo "A Index : ".$aindex[0]."<br />";
echo "K Index : ".$kindex[0]."&nbsp;"."/"."&nbsp;".$kindexnt[0]."<br />";
echo "X-Ray : ".$xray[0]."<br/>";
echo "304A : ".$heliumline[0]."&nbsp;"."@ SEM"."<br/>";
echo "Ptn Flx :"."&nbsp;".$protonflux[0]."<br/>";
echo "Elc Flx :"."&nbsp;".$electonflux[0]."<br/>";
echo "Aurora :"."&nbsp;".$aurora[0]."&nbsp;"."/"."&nbsp;"."N = ".$normalization[0]."<br/>";
echo "Mag (Bz) :"."&nbsp;".$magneticfield[0]."<br/>";
echo "Solar Wind :"."&nbsp;".$solarwind[0]."<br/>";
?>

<!-- Band Condition Table -->
<table width="200" height="102" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="95" height="19" bordercolor="#000000"><div align="center" class="style4">Band:</div></td>
    <td width="65" height="19" bordercolor="#000000"><div align="center" class="style4">Day:</div></td>
    <td width="65" height="19" bordercolor="#000000"><div align="center" class="style4">Night:</div></td>
  </tr>
  <tr>
    <td height="19" bordercolor="#000000"><div align="center" class="style4">80M - 40M</div></td>
    <td width="65" height="19" bordercolor="#000000"><div align="center" class="style4"><?php echo $html[0]; ?></div></td>
    <td width="65" height="19" bordercolor="#000000"><div align="center" class="style4"><?php echo $html[4]; ?></div></td>
  </tr>
  <tr>
    <td height="19" bordercolor="#000000"><div align="center" class="style4">30M - 20M</div></td>
    <td width="65" height="19" bordercolor="#000000"><div align="center" class="style4"><?php  echo $html[1]; ?></div></td>
    <td width="65" height="19" bordercolor="#000000"><div align="center" class="style4"><?php  echo $html[5]; ?></div></td>
  </tr>
  <tr>
    <td height="19" bordercolor="#000000"><div align="center" class="style4">17M - 15M</div></td>
    <td width="65" height="19" bordercolor="#000000"><div align="center" class="style4"><?php  echo $html[2]; ?></div></td>
    <td width="65" height="19" bordercolor="#000000"><div align="center" class="style4"><?php  echo $html[6]; ?></div></td>
  </tr>
  <tr>
    <td height="6" bordercolor="#000000"><div align="center" class="style4">12M - 10M</div></td>
    <td width="65" height="6" bordercolor="#000000"><div align="center" class="style4"><?php  echo $html[3]; ?></div></td>
    <td width="65" height="6" bordercolor="#000000"><div align="center" class="style4"><?php  echo $html[7]; ?></div></td>
  </tr>
</table>


<!--- The Following code adds a live solar view from SOHO to the widget -->
<img src="http://sohowww.nascom.nasa.gov/data/realtime/eit_304/1024/latest.jpg" width="100%">
<?php
echo "Geo-Magnetic Field : ".$geomagfield[0]."<br />";
echo "Noise : ".$signalnoise[0]."<br />";
echo "foF2 : ".$fof2[0]."<br />";
?>

</center>
</body>
</html>
