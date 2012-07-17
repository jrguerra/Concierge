<html>
<head>
<title> Concierge </title>
</head>

<body>
	
	<?php
	
	
	if (isset($_POST['eventID'])) {
		
		echo "
		<p> Enter your business' current occupancy or wait time! </p>
		<form action=\"Setup.php\" method=\"post\">
		Unique Number (for security reasons): <input type=\"text\" name=\"eventID\" /> <br>
		Wait time: <input type=\"text\" name=\"wait\" /> <br>
		<input type=\"submit\" value=\"Enter\" />
		</form>
		";
		
		
	} else {
		
		echo "
		<p> Please enter your business' unique number </p>
		<form action=\"index.php\" method=\"post\">
		Unique Number: <input type=\"text\" name=\"eventID\" /> <br>
		<input type=\"submit\" value=\"Enter\" />
		</form>
		";
	}
	?>
	
</body>
</html>
