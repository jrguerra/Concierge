<html>
<head>
<title> Concierge </title>
</head>

<body>
<?php

include ("classes/DatabaseExtensions.php");

$time_data = Array(
0,
0,
0,
0,
0,
0,
0,
1,
4,
6,
9,
11,
13,
15,
17,
20,
21,
23,
25,
27,
29,
30,
32,
33,
34,
36,
37,
38,
39,
40,
41,
41,
42,
43,
43,
44,
44,
44,
44,
44,
45,
44,
44,
44,
44,
44,
43,
43,
42,
41,
41,
40,
39,
38,
37,
36,
34,
33,
32,
30,
29,
27,
25,
23,
21,
20,
17,
15,
13,
11,
9,
6,
4,
1,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
0,
);

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
	
	//EventsDatabase::deleteEvent(); // delete them all
	$id = EventsDatabase::addEvent($_POST); // let's try this out!

	$opening = $_POST[opening];
	$closing = $_POST[closing];

	
	$week = Array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
	
	foreach ($week as $day) {
		for ($i = $opening; $i < $closing; $i ++) {
			EventsDatabase::addWaitTime($id, $time_data[$i], $i, $day); // we have put in all the fake data!
		}
	}
	echo "<p> Event submitted!</p>";	
}



?>

<br>
<a href="http://localhost:8888/Concierge/"> Go back </a>
</body>
</html>
