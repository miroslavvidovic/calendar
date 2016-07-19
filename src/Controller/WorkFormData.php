<?php
namespace Calendar\Controller;

require	dirname(__DIR__).'/../vendor/autoload.php';
require_once dirname(__DIR__)."/../bootstrap.php";
use Calendar\Model\WorkEvent as WorkEvent;
use \DateTime;

// define variables and set to empty values
$title = $all_day = $start_date = $end_date = $location = $description = "";

// Get back the code to check if post exists or if request is post

  $title = filter_input(INPUT_POST, 'title');
  $all_day = filter_input(INPUT_POST, 'all_day');
  $all_day = check_all_day($all_day);
  $start_d = filter_input(INPUT_POST, 'start_date');
  $start_date = string_to_date($start_d);
  $end_d = filter_input(INPUT_POST, 'end_date');
  $end_date = string_to_date($end_d);
  $location = filter_input(INPUT_POST, 'location');
  $description = filter_input(INPUT_POST, 'description');

/// not used yet, chekc filter_input options
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function string_to_date($input) {
$date=date_create("2013-03-15");
return date_format($date,"Y-m-d H:i:s");
    
}

function check_all_day($all_day){
    if($all_day == "on"){
      return True;
  } else {
      return False;
  }
}
check_all_day($all_day);
print($all_day);
gettype($start_date);
#$event->setId(4);
$event = new WorkEvent();
$event->setTitle($title);
$event->setAllDay($all_day);
$event->setStart($start_date);
$event->setEnd($end_date);
$event->setLocation($location);
$event->setDescription($description);
$event->setStart(new \DateTime("2016-06-26"));
$event->setEnd(new \DateTime("2016-06-26"));

$entityManager->persist($event);
$entityManager->flush();

?>

