$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#event-calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: {
            url: '/php/events.php',
            cache: true
        }
    });

});