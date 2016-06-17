<?php
namespace Calendar;
require	dirname(__DIR__).'/vendor/autoload.php';
use Calendar\Event as Event;

$event = new Event();

$event->setId(1);
$event->setTitle("Test");
$event->setAllDay(true);
$event->setStart('2016-06-17');


//$events = Event::find_all();
$eventList = array();


       $eventList[] = array(              // Add our event as the next element in the event list
            'id'    => (int) $event->getId(),
            'title' => $event->getTitle(),
            'start' => $event->getStart(),
            'end'   => $event->getEnd(),
        );         

    echo json_encode($eventList); 
?>
