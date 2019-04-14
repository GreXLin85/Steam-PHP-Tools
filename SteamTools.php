<?php

function SteamIDConvert64($apikey,$SteamID){ //For API key https://steamid.uk/steamidapi/ //You can use SteamID64, SteamIDV3, SteamID
	$xmlstr = file_get_contents("https://steamid.uk/api/convert.php?api=".$apikey."&input=".$SteamID);
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->converted[0]->steamid64; //xxxxxxxxxxxxxxxxx
}
function SteamIDConvertV3($apikey,$SteamID){ //For API key https://steamid.uk/steamidapi/ //You can use SteamID64, SteamIDV3, SteamID
	$xmlstr = file_get_contents("https://steamid.uk/api/convert.php?api=".$apikey."&input=".$SteamID);
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->converted[0]->steam3; //[U:1:xxxxxxxx]
}
function SteamIDConvert($apikey,$SteamID){ //For API key https://steamid.uk/steamidapi/ //You can use SteamID64, SteamIDV3, SteamID
	$xmlstr = file_get_contents("https://steamid.uk/api/convert.php?api=".$apikey."&input=".$SteamID);
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->converted[0]->steamid; //STEAM_0:0:xxxxxxxx
}
function SteamAccountValue($SteamID64,$currency){ //Example for currency: uk(British Pound), tr (Turkish Lira)
	$url = file_get_contents("https://steamdb.info/calculator/".$SteamID64."/?cc=".$currency);
    preg_match_all('@<span class="number-price">₺(.*?)</span>@si',$url, $data);
    return implode("", $data[1]);
}
function SteamAvatar($apikey,$SteamID){ //For API key https://steamid.uk/steamidapi/ //You can use SteamID64, SteamIDV3, SteamID
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=1");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->profile[0]->avatar;
}
function SteamAge($SteamID64){
	$url = file_get_contents("https://steamdb.info/calculator/".$SteamID64."/?cc=tr");
    preg_match_all('@<span class="number" title="(.*?)">(.*?)</span>@si',$url, $data);
    return implode("", $data[2]);
}
function SteamLevel($SteamID64){
	$url = file_get_contents("https://steamdb.info/calculator/".$SteamID64."/?cc=tr");
    preg_match_all('@<span class="(.*?)">(.*?)</span>@si',$url, $data);
    return implode("", $data[2]);
}
function SteamGamesPlayed($SteamID64){
	$url = file_get_contents("https://steamdb.info/calculator/".$SteamID64."/?cc=tr");
    preg_match_all('@<span class="number">126</span> out of <strong class="number">(.*?)</strong> games played@si',$url, $data);
    return implode("", $data[1]);
}
?>