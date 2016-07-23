<?php
namespace Calendar\Controller;

require	dirname(__DIR__).'/../vendor/autoload.php';
require_once dirname(__DIR__)."/../generated-conf/config.php";

use ORM\ORM\Workevent as Workevent;

$title = $all_day = $start_date = $end_date = $location = $descriiption = "";

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == "POST"){
  $title = filter_input(\INPUT_POST, 'title', FILTER_SANITIZE_STRING);
  $all_day = filter_input(\INPUT_POST, 'all_day', FILTER_SANITIZE_STRING);
  $start_date = filter_input(\INPUT_POST, 'start_date', FILTER_SANITIZE_STRING);
  $end_date = filter_input(\INPUT_POST, 'end_date', FILTER_SANITIZE_STRING);
  $location = filter_input(\INPUT_POST, 'location', FILTER_SANITIZE_STRING);
  $description = filter_input(\INPUT_POST, 'description', FILTER_SANITIZE_STRING);
}

function check_all_day($all_day){
    if($all_day == "on"){
      return True;
  } else {
      return False;
  }
}

$workevent = new Workevent();
$workevent->setTitle($title);
$workevent->setAllDay($all_day);
$workevent->setStartDate($start_date);
$workevent->setEndDate($end_date);
$workevent->setColor("red");
$workevent->setDescription($description);
$workevent->setLocation($location);
$workevent->save();


