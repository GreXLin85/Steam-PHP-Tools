<?php
//With API
//For API key https://steamid.uk/steamidapi/ //You can use SteamID64, SteamIDV3, SteamID
function SteamIDConvert64($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/convert.php?api=".$apikey."&input=".$SteamID);
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->converted[0]->steamid64; //xxxxxxxxxxxxxxxxx
}
function SteamIDConvertV3($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/convert.php?api=".$apikey."&input=".$SteamID);
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->converted[0]->steam3; //[U:1:xxxxxxxx]
}
function SteamIDConvert($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/convert.php?api=".$apikey."&input=".$SteamID);
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->converted[0]->steamid; //STEAM_0:0:xxxxxxxx
}
function SteamAvatar($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=1");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->profile[0]->avatar;
}
function SteamFirstNameSeen($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=1");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->profile[0]->firstnameseen;
}
function SteamName($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=1");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->profile[0]->playername;
}
//Counters With API
function SteamGameCount($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=2");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->steamid_data[0]->game_count;
}
function SteamVacBannedFriends($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=2");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->steamid_data[0]->vac_banned_friends;
}
function SteamTradeBannedFriends($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=2");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->steamid_data[0]->trade_banned_friends;
}
function SteamTradeBannedFriends($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=2");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->steamid_data[0]->trade_banned_friends;
}
function SteamGameBannedFriends($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=2");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->steamid_data[0]->game_banned_friends;
}
function CommunityBannedFriends($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=2");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->steamid_data[0]->community_banned_friends;
}
function SteamFriendCount($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=2");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->steamid_data[0]->friend_count;
}
//Ban Checkers With API
function SteamVacBanCheck($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=1");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->profile_status[0]->vac;
}
function SteamBlacklistCheck($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=1");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->profile_status[0]->blacklisted;
}
function SteamTradeBanCheck($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=1");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->profile_status[0]->tradeban;
}
function SteamCommunityBanCheck($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=1");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->profile_status[0]->communityban;
}
function SteamAmmountGameBans($apikey,$SteamID){ 
	$xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$apikey."&player=".$SteamID."&request_type=1");
	$xml = new SimpleXMLElement($xmlstr);
	return $xml->profile_status[0]->ammount_game_bans;
}
//Without API
function SteamAccountValue($SteamID64,$currency){ //Example for currency: uk(British Pound), tr (Turkish Lira)
	$url = file_get_contents("https://steamdb.info/calculator/".$SteamID64."/?cc=".$currency);
    preg_match_all('@<span class="number-price">₺(.*?)</span>@si',$url, $data);
    return implode("", $data[1]);
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
