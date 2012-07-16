<?php

include ("Database.php");


class ItineraryDatabase extends Database {
	
	private static $db = "itinerary_database";
	private static $tableName = "Itinerary";
	private static $attributes = "Time int,
	EventID varchar(32)";
	
	public static function initialize() {
		echo "<p> Got here </p>";
		parent::createDatabase(self::$db);
		parent::createTable(self::$db, self::$tableName, self::$attributes);
		
		for ($i = 0; $i < 96; $i ++) {
			parent::insertIntoTable(self::$db, self::$tableName, "$i, 'X'", "Time, EventID");
		}
		
		
	}
	
}



?>
