<?php


if (isset($_POST[eventID])) {

	date_default_timezone_set("America/Chicago");
	
	$day = date("D");
	
	ItineraryDatabase::addEventToItinerary($_POST[eventID], $day, $_POST['time1'], $_POST[_'time2']);
	

}

if (isset($_POST[itinerary])) {
	// you can either post a * which will give all of the id's for the events chosen
	// or you can post a number and it with give you the ith thing in the itinary
}





?>