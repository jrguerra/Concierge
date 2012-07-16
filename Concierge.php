<html>
<head>
<title> Concierge </title>
</head>

<body>
	<p> This is the form for entering your business into Concierge <br> Please enter your information below <br> Add Business: </p>
	<form action="Setup.php" method="post">
	EventName: <input type="text" name="name" /> <br>
	EventAddress: <input type="text" name="address" /> <br>
	EventPhone: <input type="text" name="phone" /> <br>
	Opening: Hour: <input type="text" name="ohours"/>   : <input type="text" name="ominutes" /> AM or PM <input type="text" name="oampm" /> <br>
	Closing Hour: Opening: Hour: <input type="text" name="chours"/>   : <input type="text" name="cminutes" /> AM or PM <input type="text" name="campm" /> <br>
	EventType: <input type="text" name="type" /> <br>
	EventRating: <input type="text" name="rating" /> <br> <br>
	<input type="submit" value="Add your business!" />
	</form>
	
	<br>
	<p> Add a wait time for your business if you see it on the list. It will automatically generate the right time for you! </p>
	<form action="Setup.php" method="post">
	Event Number (from below) : <input type="text" name="eventID" /> <br>
	Wait Time (min): <input type="text" name="wait" /> <br> <br>
	<input type="submit" value="Add wait information about you" />
	</form>
	</p>
	
	<?php
	
	include ("classes/EventsDatabase.php");
	
	
	$array = EventsDatabase::getAllEventNames();
	$indices = array_keys($array);
	foreach ($indices as $index) {
		echo "$index : $array[$index]<br>";
	}
	
	ItineraryDatabase::setEventForTimes(6, 1, 13);
	
	
	?>
	
	<?php
	
	//include ("classes/EventsDatabase.php");
	//ItineraryDatabase::initialize();
	echo "<p> Itinerary initialized! </p>";
	
	?>
	
</body>
</html>
