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


/*
You can use the following variables above in your applications simply by calling them,
if you are looking for an example, try using the widget code included in the package
*/

// Load Arrays
$hfconditiona = $child->xpath("calculatedconditions");
$hfcondition = $hfconditiona[0][0]->xpath("band");
$vhfconditiona = $child->xpath("calculatedvhfconditions");
$vhfcondition = $vhfconditiona[0][0]->xpath("phenomenon");

/* 
If you want to use the precalculated HF Conditions or VHF Conditions, you need to use the variables as an array, as described below.

$hfcondition[0]  =  80 - 40 Meter Day
$hfcondition[1]  =  30 - 20 Meter Day
$hfcondition[2]  =  17 - 15 Meter Day
$hfcondition[3]  =  12 - 10 Meter Day
$hfcondition[4]  =  80 - 40 Meter Night
$hfcondition[5]  =  30 - 20 Meter Night
$hfcondition[6]  =  17 - 15 Meter Night
$hfcondition[7]  =  12 - 10 Meter Night

$vhfcondition[0]  =  VHF-Aurora
$vhfcondition[1]  =  Europe E-Skip
$vhfcondition[2]  =  North America E-Skip
$vhfcondition[3]  =  Europe 6M E-Skip
$vhfcondition[4]  =  Europe 4M E-Skip

*/

// Load color coded HTML

$cd = 0;
while ($cd <= 7){
if($bandcondition[$cd] == "Poor"){
$html[$cd] = "<font color=\"red\"> Poor </font>";
}
else if($bandcondition[$cd] == "Fair"){
$html[$cd] = "<font color=\"yellow\"> Fair </font>";
}
else if($bandcondition[$cd] == "Good"){
$html[$cd] = "<font color=\"green\"> Good </font>";
}
$cd++;
}

/*
 If you want to include color-coded band conditions, you can echo the following variables on the inside of an HTML script.  There is an example included in the package
 
$html[0]  =  80 - 40 Meter Day
$html[1]  =  30 - 20 Meter Day
$html[2]  =  17 - 15 Meter Day
$html[3]  =  12 - 10 Meter Day
$html[4]  =  80 - 40 Meter Night
$html[5]  =  30 - 20 Meter Night
$html[6]  =  17 - 15 Meter Night
$html[7]  =  12 - 10 Meter Night
*/


?>