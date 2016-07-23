<?php

use ORM\ORM\WorkeventQuery as WorkeventQuery;

require_once "../generated-conf/config.php";
require_once "../vendor/autoload.php";

$workEvents = WorkeventQuery::create()->find();
// $authors contains a collection of Author objects
// one object for every row of the author table

$eventList = array();

foreach($workEvents as $event):
    $eventList[] = array(
        'id'        => (int) $event->getId(),
        'title'     => $event->getTitle(),
        'start'     => date_format($event->getStartDate(), 'Y-m-d'),
        'end'       => date_format($event->getEndDate(), 'Y-m-d'),
        'color'     => $event->getColor(),
    );
endforeach;

echo json_encode($eventList);
