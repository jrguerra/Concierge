<?php

class Event {
	public $name;
	public $address;
	public $phone;
	public $rating;
	public $hours;
	public $type;
	
	public $waitTimes;
	public $entryTimes;
	
	function printMe() {
		echo "$this->name : $this->address $this->phone , $this->hours $this->rating :: $this->type\n";
	}
	
}


?>