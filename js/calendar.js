$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#event-calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: {
            url: 'php/events.php',
            cache: true
        },
        dayClick: function(date, jsEvent, view) {
            //if the modal exists to add an event
            if( $('#newEvent').length ) {
                //open the modal
                $('#newEvent').modal();
                
                //add in the basically known info
                $('#number').val("");
                $('#title').val("");
                $('#hares').html("");
                $('#location').val("");
                $('#date').val(date.format());
                $('#time').val("");
                $('#map').val("");
                $('#description').val("");
                $('#start').val("");
                $('#directions').val("");
                $('#ononon').val("");
                $('#notes').val("");
                
                //if tuesday, assume trail
                if ( date['_d'].getDay() == 1 ) {
                    $('#trail-title').show();
                    $('#trail-hares').show();
                    $('#trail-map').show();
                    $('#trail-ononon').show();
                    $('#trail-notes').show();
                    $('#add-what').val('t');
                    $('#time').val("19:00");
                    $.get( "php/get-next-trail-num.php", function( data ) {
                        $('#number').val(data);
                    });
                } else {    //assume event
                    $('#trail-title').hide();
                    $('#trail-hares').hide();
                    $('#trail-map').hide();
                    $('#trail-ononon').hide();
                    $('#trail-notes').hide();
                    $('#add-what').val('e');
                }
                
            }
        },
        eventClick: function(calEvent, jsEvent, view) {
//            alert('Event: ' + calEvent.title);
//            alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
//            alert('View: ' + view.name);
//
//            // change the border color just for fun
//            $(this).css('border-color', 'red');
        }
    });
    
    //enable searching for hashers
    $('.searcher').keyup(function() {
        var search_ele = $(this);
        var keyword = search_ele.val();
        $.get( "php/get-hashers.php", { keyword: keyword } ).done(function( data ) {
            $('.results').remove();
            var results_div=$("<div class='results'></div>");
            var results = jQuery.parseJSON(data);
            $.each(results, function(key, value) {
                results_div.append('<div class="item" hasherid="' + key + '" >' + value + '</div>');
            });
            search_ele.after( results_div );
            $('.item').click(function() {
                var hasher = $(this).html();
                var hasherid = $(this).attr( 'hasherid' );
                $('#hares').append( "<span class='hasher' hasherid='" + hasherid + "'>" + hasher + " <input type='submit' value='X' /></span>" );                
                search_ele.val('');
//                hareChange();
                addDeleteHasher();
                });

        });
    });
    $(".searcher").blur(function(){
        if( $(this).next().hasClass('results') ) {
            $(this).next().fadeOut(500);
        }
    }).focus(function() {
        if( $(this).next().hasClass('results') ) {
            $(this).next().show();
        }
    });
    $("#add-what").change(function(){
        if ( $(this).val() == "t" ) {
            $('#trail-title').show();
            $('#trail-hares').show();
            $('#trail-map').show();
            $('#trail-ononon').show();
            $('#trail-notes').show();
            $('#add-what').val('t');
            $('#time').val("19:00");
            $.get( "php/get-next-trail-num.php", function( data ) {
                $('#number').val(data);
            });
        } else {    //assume event
            $('#trail-title').hide();
            $('#trail-hares').hide();
            $('#trail-map').hide();
            $('#trail-ononon').hide();
            $('#trail-notes').hide();
            $('#add-what').val('e');
        }
    });
    $('#new-event-save').click(function(){
        alert('save functionality doesn\'t work yet');
        $('#newEvent').modal('hide');
    });
    
});
function addDeleteHasher() {
    $('.hasher input').click(function(){
        deleteHasher($(this).parent());
    });
}
function deleteHasher(ele) {
    ele.remove();
//    hareChange();
}