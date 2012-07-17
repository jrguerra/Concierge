<?php
include("Database.php");
// This file holds subclasses or extensions for database
// All interactions with the database should be handled using
// One of the classes in this file!
?>

<?php

class EventsDatabase extends Database {
	
	private static $db = "events_db";
	private static $eventsTable = "Events";
	private static $eventsAttributes = "eventID int NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(eventID),
	EventName varchar(32),
	EventAddress varchar(128),
	EventPhone varchar(12),
	EventRating varchar(8),
	EventHours varchar(16),
	EventType varchar(16)";
	
	private static $times = Array(
	"12:00 AM",
	"12:15 AM",
	"12:30 AM",
	"12:45 AM",
	"1:00 AM",
	"1:15 AM",
	"1:30 AM",
	"1:45 AM",
	"2:00 AM",
	"2:15 AM",
	"2:30 AM",
	"2:45 AM",
	"3:00 AM",
	"3:15 AM",
	"3:30 AM",
	"3:45 AM",
	"4:00 AM",
	"4:15 AM",
	"4:30 AM",
	"4:45 AM",
	"5:00 AM",
	"5:15 AM",
	"5:30 AM",
	"5:45 AM",
	"6:00 AM",
	"6:15 AM",
	"6:30 AM",
	"6:45 AM",
	"7:00 AM",
	"7:15 AM",
	"7:30 AM",
	"7:45 AM",
	"8:00 AM",
	"8:15 AM",
	"8:30 AM",
	"8:45 AM",
	"9:00 AM",
	"9:15 AM",
	"9:30 AM",
	"9:45 AM",
	"10:00 AM",
	"10:15 AM",
	"10:30 AM",
	"10:45 AM",
	"11:00 AM",
	"11:15 AM",
	"11:30 AM",
	"11:45 AM",
	"12:00 PM",
	"12:15 PM",
	"12:30 PM",
	"12:45 PM",
	"1:00 PM",
	"1:15 PM",
	"1:30 PM",
	"1:45 PM",
	"2:00 PM",
	"2:15 PM",
	"2:30 PM",
	"2:45 PM",
	"3:00 PM",
	"3:15 PM",
	"3:30 PM",
	"3:45 PM",
	"4:00 PM",
	"4:15 PM",
	"4:30 PM",
	"4:45 PM",
	"5:00 PM",
	"5:15 PM",
	"5:30 PM",
	"5:45 PM",
	"6:00 PM",
	"6:15 PM",
	"6:30 PM",
	"6:45 PM",
	"7:00 PM",
	"7:15 PM",
	"7:30 PM",
	"7:45 PM",
	"8:00 PM",
	"8:15 PM",
	"8:30 PM",
	"8:45 PM",
	"9:00 PM",
	"9:15 PM",
	"9:30 PM",
	"9:45 PM",
	"10:00 PM",
	"10:15 PM",
	"10:30 PM",
	"10:45 PM",
	"11:00 PM",
	"11:15 PM",
	"11:30 PM",
	"11:45 PM"
);
	
	private static $waitAttributes = " Day varchar(12),
	Time_0 int,
	Time_1 int,
	Time_2 int,
	Time_3 int,
	Time_4 int,
	Time_5 int,
	Time_6 int,
	Time_7 int,
	Time_8 int,
	Time_9 int,
	Time_10 int,
	Time_11 int,
	Time_12 int,
	Time_13 int,
	Time_14 int,
	Time_15 int,
	Time_16 int,
	Time_17 int,
	Time_18 int,
	Time_19 int,
	Time_20 int,
	Time_21 int,
	Time_22 int,
	Time_23 int,
	Time_24 int,
	Time_25 int,
	Time_26 int,
	Time_27 int,
	Time_28 int,
	Time_29 int,
	Time_30 int,
	Time_31 int,
	Time_32 int,
	Time_33 int,
	Time_34 int,
	Time_35 int,
	Time_36 int,
	Time_37 int,
	Time_38 int,
	Time_39 int,
	Time_40 int,
	Time_41 int,
	Time_42 int,
	Time_43 int,
	Time_44 int,
	Time_45 int,
	Time_46 int,
	Time_47 int,
	Time_48 int,
	Time_49 int,
	Time_50 int,
	Time_51 int,
	Time_52 int,
	Time_53 int,
	Time_54 int,
	Time_55 int,
	Time_56 int,
	Time_57 int,
	Time_58 int,
	Time_59 int,
	Time_60 int,
	Time_61 int,
	Time_62 int,
	Time_63 int,
	Time_64 int,
	Time_65 int,
	Time_66 int,
	Time_67 int,
	Time_68 int,
	Time_69 int,
	Time_70 int,
	Time_71 int,
	Time_72 int,
	Time_73 int,
	Time_74 int,
	Time_75 int,
	Time_76 int,
	Time_77 int,
	Time_78 int,
	Time_79 int,
	Time_80 int,
	Time_81 int,
	Time_82 int,
	Time_83 int,
	Time_84 int,
	Time_85 int,
	Time_86 int,
	Time_87 int,
	Time_88 int,
	Time_89 int,
	Time_90 int,
	Time_91 int,
	Time_92 int,
	Time_93 int,
	Time_94 int,
	Time_95 int";

	public static function initialize() {
	// This function has already been used! It cannot be used again unless there is a fatal error OR 
	// we need to restart the events database!
	//	parent::createDatabase(self::$db);
	//	parent::createTable(self::$db, self::$eventsTable, self::$eventsAttributes);
	}
	
	public static function getAllEventNames() {
		$result = parent::getRows(self::$db, self::$eventsTable);
		
		$retVal; 
		while ($row = mysql_fetch_array($result)) {
			$index = $row['eventID'];
			$retVal[$index] = $row['EventName'];
		}
		
		return $retVal;
	}
	
	public static function getEventWithId($id) {
		$result = parent::getRows(self::$db, self::$eventsTable, "eventID='$id'");
		$row = mysql_fetch_array($result);
		
		$retVal['id'] = $row['eventID'];
		$retVal['name'] = $row['EventName'];
		$retVal['address'] = $row['EventAddress'];
		$retVal['phone'] = $row['EventPhone'];
		$retVal['rating'] = $row['EventRating'];
		$retVal['hours'] = $row['EventHours'];
		$retVal['type'] = $row['EventType'];
		$retVal['opening'] = $row['EventOpening'];
		$retVal['closing'] = $row['EventClosing'];
		
		return $retVal;
	}
	
	public static function getAverageWaitTimesForEventOnDay($id, $day, $time1 = 0, $time2 = 95) { // make a new one to work with the itinerary
		$result = parent::getRows(self::$db, "Wait_$id","Day='$day'");
		
		$retVal;
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			for ($i = $time1; $i <= $time2; $i++) { 
				$x = $row["Time_$i"];
				if ($x != NULL) {
				    $retVal[$i] = $x; // everything is numeric once again
				}
			}
		}
		return $retVal;
	}
	
	public static function addEvent($event) {
		$columns = "EventName, EventAddress, EventPhone, EventRating, EventHours, EventType, EventOpening, EventClosing";
		
		$name = $event['name'];
		$address = $event['address'];
		$phone = $event['phone'];
		$rating = $event['rating'];
		$hours = $event['hours'];
		$type = $event['type'];
		$opening = $event['opening'];
		$closing = $event['closing'];
		
		$values = "'$name', '$address', '$phone', '$rating', '$hours', '$type', '$opening', '$closing'";
	    echo $values;
		parent::insertIntoTable("events_db", self::$eventsTable, $values, $columns);
		
		$result = parent::getRows(self::$db, self::$eventsTable, "EventName='$name'");
		
		$id = 0;
		while ($row = mysql_fetch_array($result)) {
			$potentialId = $row['eventID'];
			if ($potentialId > $id) {
				$id = $potentialId;
			}
		}
		
	    echo "<p> Event has ID: $id </p>";
	    $waitTableName = "Wait_$id";
		parent::createTable(self::$db, "Wait_$id", self::$waitAttributes);
		parent::insertIntoTable(self::$db, $waitTableName, "'Mon'", "Day");
		parent::insertIntoTable(self::$db, $waitTableName, "'Tue'", "Day");
		parent::insertIntoTable(self::$db, $waitTableName, "'Wed'", "Day");
		parent::insertIntoTable(self::$db, $waitTableName, "'Thu'", "Day");
		parent::insertIntoTable(self::$db, $waitTableName, "'Fri'", "Day");
		parent::insertIntoTable(self::$db, $waitTableName, "'Sat'", "Day");
		parent::insertIntoTable(self::$db, $waitTableName, "'Sun'", "Day"); // these are all the available rows in the table
		
		return $id; // returns the id of the newly added event!
	}
	
	public static function addWaitTime($eventId, $wait, $time, $day) {
		// time should be formatted from 0 to 95
		// and wait should be a number
		$updateInfo = "Time_" . "$time" . "=" . "$wait";
		$whereClause = "Day='$day'";
		
		echo "<p> $updateInfo , $whereClause </p>";
		parent::update(self::$db, "Wait_$eventId", $updateInfo, $whereClause);
	}
	
	public static function deleteEvent($id) {
		if (isset($id)) {
			parent::deleteFromTable(self::$db, self::$eventsTable, "eventID='$id'");
		} else {
			parent::deleteFromTable(self::$db, self::$eventsTable);
		}
	}
	
}

?>

<?php
class ItineraryDatabase extends Database {
	
	private static $db = "itinerary_database";
	private static $tableName = "Itinerary";
	private static $attributes = "Time int,
	EventID varchar(32)";
	
	public static function initialize() {
		// Can be used only once
		// This function has already been used!
		//parent::createDatabase(self::$db);
		//parent::createTable(self::$db, self::$tableName, self::$attributes);
		
		//for ($i = 0; $i < 96; $i ++) {
		//	parent::insertIntoTable(self::$db, self::$tableName, "$i, 'X'", "Time, EventID");
		//}
	}
	
	public static function addEventToItinerary($eventId, $day, $arrivalTime, $departureTime) {
		// day and time should be properly formatted here!
		// we will make a call out to itinerary planner or something
		for ($i = $arrivalTime; $i <= $departureTime; $i ++) {
			parent::update(self::$db, self::$tableName, "EventID='$eventId'", "Time=$i");
		}
	}
	
	public static function newItinerary() {
		// this is the reset button, also it should be used whenever a new day comes, etc.
		// basically a big reset button
		for ($i = 0; $i < 96; $i ++) {
			parent::update(self::$db, self::$tableName, "EventID='X'", "Time=$i");
		}
		
	}
	
	public static function getAvailableTimeSlots($time1, $time2) {
		// returns all times for which nothing is planned between two times (any range)
		// One constraint: $time2 >= $time1
		$result = parent::getRows(self::$db, self::$tableName);
		
		$i = 0;
		$retVal;
		while ($row = mysql_fetch_array($result)) {
			$eventId = $row['EventID'];
			$time = $row['Time'];
			
			if ($time >= $time1 && $time <= $time2) {
				
				if (! ($eventId == "X")) {
					$retVal[$i] = $time;
				}
				
			}
			$i ++;
		}
		
		return $retVal;
	}
	
	public static function getItinerary() {
		$result = parent::getRows(self::$db, self::$tableName);
		$retVal;
		
		$currentEvent = -1;
		$currentArrival;
		$i = 0;
		while ($row = mysql_fetch_array($result)) {
			$id = $row['EventID'];
			if ($id == "X") {
				
				if ($currentEvent != -1) {
					$arr['Arrival'] = $currentArrival;
					$arr['Departure'] = $row['Time'] - 1; // one before the current time!
					$arr['eventID'] = $currentEvent;
					
					$retVal[$i] = $arr;
					$i ++;	
				}
				
				$currentEvent = -1;
			} else {
				
				if ($currentEvent == -1) {
					$currentEvent = $id;
					$currentArrival = $row['Time'];
				}
			}
		}
		
		return $retVal; // return an array of array
		// the format of this array is $retVal[index][;Arriva]
	}
	
	public static function getNextEvent($time) {
		// returns the next event that will start or is already taking place after $time
		// this function assumes we go from lower times to higher times!
		$result = parent::getRows(self::$db, self::$tableName);
		
		while ($row = mysql_fetch_array($result)) {
			$t = $row['Time'];
			
			if ($t >= $time) {
				if ($row['eventID'] != "X") {
					return $row['eventID'];
				}
			}
		}
		
		return NULL;
	}
	
	public static function getPrevEvent($time) {
		// return the previous event that will start or is already taking place before this $time
		// this function assumes we start from lower times and go to higher times!
		$result = parent::getRows(self::$db, self::$tableName);
		
		$retVal = NULL;
		while ($row = mysql_fetch_array($result)) {
			$t = $row['Time'];
			
			if ($t <= $time) {
				if ($row['eventID'] != "X") {
					$retVal = $row['eventID'];
				}
			}
		}
		
		return $retVal;
	}
	
	
}
?>



