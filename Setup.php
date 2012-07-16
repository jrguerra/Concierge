<html>
<head>
<title> Concierge </title>
</head>

<body>
<?php

include ("classes/EventsDatabase.php");

if (isset($_POST[eventID])) {
	$eventId = $_POST[eventID];
	$wait = $_POST[wait];
	
	date_default_timezone_set("America/Chicago");
	
	$day = date("D");
	$hours = date("H");
	$minutes = date("i");
	
	echo "<p> $day $hours $minutes </p>";
	
	$hr = intval($hours);
	$min = intval($minutes);
	$min = intval($min / 15);
	
	$time = (4 * $hr) + $min;
	echo "<p> Formatted time is $day : $time </p>";
	
	EventsDatabase::addWaitTime($eventId, $wait, $time, $day);
	
	echo "<p> We did it, yeah! </p>";
	
} else {
	
	EventsDatabase::deleteEvent(); // delete them all
	
	$event = new Event();
	$event->name = $_POST[name];
	$event->address = $_POST[address];
	$event->rating = $_POST[rating];
	$event->phone = $_POST[phone];
	$event->type = $_POST[type];
	$event->hours = "$_POST[ohours] $_POST[oampm] - $_POST[chours] $_POST[campm]" ;

	$id = EventsDatabase::addEvent($event);
	
	$hr = intval($hours);
	$min = intval($minutes);
	$min = intval($min / 15);
	
	$time = (4 * $hr) + $min;
	
	$week = ("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
	
	foreach ($week as $day) {
		for ($i = $opening; $i < $closing; $i ++) {
			EventsDatabase::addWaitTime($id, $wait[$i], $i, $day); // we have put in all the fake data!
		}
	}
	
	
	echo "<p> Event submitted!</p>";	
}



?>

<br>
<a href="http://localhost:8888/Concierge/Concierge.php"> Go back </a>
</body>
</html>
