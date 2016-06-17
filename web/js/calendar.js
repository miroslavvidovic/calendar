$(document).ready(function() {

    // page is now ready, initialize the calendar...

   $('#calendar').fullCalendar({
       events: '../src/Feed.php'
   })

});