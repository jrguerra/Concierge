######################
##### README #########
#####################

This README logs all of the essential files to the Concierge Web Service.


####################
#### Database.php###
####################

Database.php is the foundation for all database accesses in the web service. Unless beign used by one of its child
classes, it never needs to be used directly. It contains PHP function wrapper for all common MYSQL requests.
Most of the function names in the class are self-explanatory. 

The only catch with many of the functions in this class are variables called whereClauses, which need to follow a certain
format in order to work. But don't fear! Just look at some examples of my code!


############################
### DatabaseExtensions.php###
#############################

In DatabaseExtensions you will find all of the functions that are designed particularly for the Events and
Itiinerary Databases. Note that both have an initialize() function that is commented out. This is because
initialization should only occur once. No need to call this function whatsoever.. unless you really, really want to.

For the events database, most of the fuss is around adding wait times. For the most part, you can't really edit an event's attributes once it's in
the database. I.e. there is no function in the EventsDatabase to do this (you could do it using just Database.php) If you want to do this I suggest adding
a TODO: add editEvent($eventID) in there or write it yourself! Wait times are editable, but they are not averages.

For the itinerary database, there are ( I stronly think) no more big TODO's. You can grab entire itineraries that are formatted for json or for planning itineraries,
you can grab availableTimes in the current itinerary (just an array of times where nothing is planned), and you can get previous and next events based on a formatte time 
(not we really need to test these two functions)

TOOO: Submit.php, Make.php

Get.php
-- this all done. Andy, you should know the APIs for this one, by now.

Setup.php
-- this may actually be important. If you use a curl call (or perform a POST to Setup.php) you can achieve one of two things:

1. You post eventID=X and wait=Y
--> you can actually add a wait time for a business or something like that!

2. You post name=a, address=b, blah, blah....
--> you can add a new event with fake wait data (based on the opening and closing times you provided in the post to Setup.php)

Note these apis return basically garbage, so if used in an api, there output should be ignored. You should just assume they work.

index.php
--> Don't worry. It's just a shitty little business front-end I cooked. Debugging purposes only.


Any other files not mentioned here are probably just filler crap from old designs that have been scrapped!
