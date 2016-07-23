<?php
use ORM\ORM\Workevent as Workevent;

require_once "../generated-conf/config.php";
require_once "../vendor/autoload.php";

$workevent = new Workevent();
$workevent->setTitle("propel");
$workevent->setAllDay(true);
$workevent->setStartDate("2016-07-25");
$workevent->setEndDate("2016-07-27");
$workevent->setColor("blue");
$workevent->setDescription("Simple event");
$workevent->setLocation("Conf room 3");
$workevent->save();

?>
