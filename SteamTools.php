<?php
//With API
function API_Use($API_KEY,$SteamID){
    $xmlstr = file_get_contents("https://steamid.uk/api/request.php?api=".$API_KEY."&player=".$SteamID."&request_type=2");
    $xml = new SimpleXMLElement($xmlstr);
    global $steamid64;
    global $steamid;
    global $steam3;
    global $vac;
    global $tradeban;
    global $communityban;
    global $ammount_game_bans;
    global $game_count;
    global $vac_banned_friends;
    global $trade_banned_friends;
    global $game_banned_friends;
    global $community_banned_friends;
    global $friend_history_count;
    global $friend_count;
    global $name_history_count;
    if(!$xml->auth[0]->auth == "ok"){
        print("API Key is wrong.");
    }else{
        $steamid64 = $xml->profile[0]->steamid64;
        $steamid = $xml->profile[0]->steamid;
        $steam3 = $xml->profile[0]->steam3;
        $vac = $xml->profile_bans[0]->vac;
        $tradeban = $xml->profile_bans[0]->tradebam;
        $communityban = $xml->profile_bans[0]->communityban;
        $ammount_game_bans = $xml->profile_bans[0]->ammount_game_bans;
        $game_count = $xml->steamid_data[0]->game_count;
        $vac_banned_friends = $xml->steamid_data[0]->vac_banned_friends;
        $trade_banned_friends = $xml->steamid_data[0]->trade_banned_friends;
        $game_banned_friends = $xml->steamid_data[0]->game_banned_friends;
        $community_banned_friends = $xml->steamid_data[0]->community_banned_friends;
        $friend_history_count = $xml->steamid_data[0]->friend_history_count;
        $friend_count = $xml->steamid_data[0]->friend_count;
        $name_history_count = $xml->steamid_data[0]->name_history_count;
    }
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
