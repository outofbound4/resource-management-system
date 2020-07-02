<?php
require_once root . '1_Organisation/classes/BuildingDataClass.php';
require_once root . '1_Organisation/classes/ThingDataClass.php';
require_once root . '1_Organisation/classes/ThingsInRoomDataClass.php';
require_once root . '1_Organisation/classes/ThingsInBuildingDataClass.php';

class HomePageData
{
	var $BuildingData_object_array;
	var $TotalThings; 
	var $TotalDistributedThingsInBuilding;
	var $TotalDistributedThingsInRoom;
	var $TotalDistributedThing;
	var $TotalUndistributedThing;
	var $ThingsThisMonth;

	public function __construct()
	{
		$this->BuildingData_object_array			= BuildingData::getAllBuildingData();
		$this->TotalThings 							= ThingData::getThingDataCount()->noOfThings;
		$this->TotalDistributedThingsInBuilding 	= (int)(ThingsInBuildingData::ThingsInBuildingDataCount()->noOfThings);
		$this->TotalDistributedThingsInRoom 		= (int)(ThingsInRoomData::ThingsInRoomDataCount()->noOfThings);
		$this->TotalDistributedThing 				= $this->TotalDistributedThingsInBuilding + $this->TotalDistributedThingsInBuilding;
		$this->TotalUndistributedThing 				= $this->TotalThings - $this->TotalDistributedThing;
		date_default_timezone_set('UTC');
		$this->ThingsThisMonth 						= (int)(ThingData::getThingDataCountOfCurrentMonth(date('m'),date('Y'))->noOfThings);
	}

	public static function getHomePageData()
	{
		return new HomePageData();
	}
}
?>