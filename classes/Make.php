<?php

public function make_itinerary($eventId, $day, $time1 = 0, $time2 = 95, $duration = 4) {
	
	$eventInfo = EventsDatabase::getEventWithId($eventId);
	$wait_times = EventsDatabase::getWaitTimes($eventId, $day, $time1, $time2); // only send over valid times (non-nulls)
	$currentItinerary = ItineraryDatabase::formatted_itinerary(); // all the data in the itinerary, travel, arrival, wait, departure
	
	$plannedFlag = 0;
	while(count($wait_array)) {
		
		$invalid = 0;
		$min_array = array_keys($wait_times, min($wait_times));
		sort($min_array);
		
		$arrival = $min_array[0];
		$departure = $arrival + $duration + int( ($wait_times[$arrival] + 8) / 15);
		
		$prevEvent = ItineraryDatabase::getNextEvent($arrival);
		$nextEvent = ItineraryDatabase::getPrevEvent($arrival);
		// We need to update the travel times thing!
		
		if ($departure > $eventInfo['closing']) { $invalid = 1;}
		if ($arrival < $eventInfo['opening']) { $invalid = 1;}
		
		if ($prevEvent) {
			$tTime = travel_time($eventId, $prevEvent[0]['eventID']); // TODO: write this
			$start = $arrival - $tTime;
			
			if ($start <= $prevEvent[0]['departure']) { $invalid = 1;}
		}
		
		if ($nextEvent){
			$tTime = travel_time($eventId, $nextEvent[0]['eventID']); // TODO: write this
			
			if ($departure >= $nextEvent[0]['arrival'] - $tTime) {
				$invalid = 1;
			} else {
				$nextEvent[0]['start'] = $nextEvent[0]['arrival'] - $tTime; // check this !
			}
		}	
		
		if ($invalid) {
			// remove it from the hash
			unset($wait_times[$arrival]); 
		} else {
			ItineraryDatabase::submitEvent($event);
			ItineraryDatabase::submitEvent($nextEvent);
			
			$plannedFlag = 1;
			break; //
		}	
	}
	
	if (!$plannedFlag) {
		// put this event on some array
	}
}

public function travel_time($id1, $id2) {
	// this can be edited
	return 1;
}

?>