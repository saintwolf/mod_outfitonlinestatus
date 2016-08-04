<?php

class ModOutfitOnlineStatusHelper
{
  //API Service ID
  private static $sid = "s:phxonlineoutfitmembers"; //http://census.daybreakgames.com/#service-id
  private static $outfitID = "37509488620618229";

  public static function getOutfitInfo($params)
	{
  	//Pull Census API Data
  	$Census = file_get_contents("http://census.daybreakgames.com/".self::$sid."/get/ps2/outfit_member?c:limit=4000&c:resolve=online_status,character(name.first)&c:sort=rank_ordinal:1&c:hide=member_since,member_since_date,outfit_id&outfit_id=".self::$outfitID);
  	$outfitData = json_decode($Census, true);
  	//Return JSON, To Be added by Below Code.
  	$outfitInfo = array();
  	foreach ($outfitData['outfit_member_list'] as $player) {
  		if ($player['online_status'] != 0){
  			//Player is online
  			$outfitInfo['Outfit']['Members']['Online'][] = $player;
  		} else {
  			//Player is offline
  			$outfitInfo['Outfit']['Members']['Offline'][] = $player;
  		}
  	}
    return $outfitInfo;
  }
}
