$(document).ready(function() {
    // page is now ready, initialize the calendar...
   $('#calendar').fullCalendar({
    header: {
      left:'prev,next today',
      center: 'title',
      right: 'month, agendaWeek, agendaDay'
    },
    events: '../src/Test2.php',
    editable: true
  });
});
