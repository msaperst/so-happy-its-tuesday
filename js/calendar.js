$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#event-calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: {
            url: 'php/get-events.php',
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
            $('#viewEventModal').modal();
            $('#viewEventEdit').removeClass('hidden');
            $('#viewEventSave').addClass('hidden');
            $.get( "php/get-event.php", { id: calEvent.lookup_id, type: calEvent.type } ).done(function( data ) {
                data = $.parseJSON( data );
                $('#viewEventHiddenID').val(data.ID);
                $('#viewEventHiddenType').val(calEvent.type);
                if( calEvent.type == "t" ) {    //if trail
                    if( data.ID > 190 ) {
                        data.ID--;
                    }
                    $('#viewEventTitle').html("Trail " + data.ID + ": " + data.TITLE);
                    $('#viewEventHares').show();
                    $('#viewEventHares').html("Hares: " + data.hares.join(", "));
                    $('#viewEventLocation').html(data.LOCATION);
                    $('#viewEventDate').html(data.date);
                    $('#viewEventTime').html("7:00 PM");
                    $('#viewEventDescription').html(data.TIDBIT);
                    $('#viewEventStart').parent().show();
                    $('#viewEventStart').html("<a href='" + data.MAPLINK + "' target='_blank'>" + data.ADDRESS + "</a>");
                    $('#viewEventDirections').html(data.DIRECTIONS);
                    $('#viewEventOnOnOn').parent().show();
                    $('#viewEventOnOnOn').html("<a href='" + data.MAPLINK + "' target='_blank'>" + data.ONONON + "</a>");
                    $('#viewEventNotes').parent().show()
                    $('#viewEventNotes').html(data.NOTES);
                } else {    //else event
                    $('#viewEventTitle').html(data.TITLE);
                    $('#viewEventHares').hide();
                    $('#viewEventLocation').html(data.LOCATION);
                    $('#viewEventDate').html(data.date);
                    $('#viewEventTime').html(data.TIME);
                    $('#viewEventDescription').html(data.DESCRIPTION);
                    $('#viewEventStart').parent().hide();
                    $('#viewEventDirections').html(data.DIRECTIONS);
                    $('#viewEventOnOnOn').parent().hide();
                    $('#viewEventNotes').parent().hide();
                }
            });
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
        var json = new Object();
        if( $("#add-what").val() == "t" ) {
            //add our simple values
            json.trail_id = $('#number').val();
            json.trail_title = $('#title').val();
            json.trail_location = $('#location').val();
            json.trail_date = $('#date').val();
            json.trail_maplink = $('#map').val();
            json.trail_tidbit = $('#description').val();
            json.trail_address = $('#start').val();
            json.trail_directions = $('#directions').val();
            json.ononon = $('#ononon').val();
            json.trail_notes = $('#notes').val();
            //add all of the hares
            var hares = new Array();
            $('#hares span').each(function(){
                hares.push( $(this).attr('hasherid') );
            });
            json.hares = hares;
            $.ajax({
                type: "POST",
                url: "php/add-trail.php",
                data: { data: json }
            }).done(function(){
                $('#event-calendar').fullCalendar( 'refetchEvents' );
            });
        } else {
            json.title = $('#title').val();
            json.date = $('#date').val();
            json.time = $('#time').val();
            json.location = $('#location').val();
            json.description = $('#description').val();
            json.directions = $('#directions').val();
            $.ajax({
                type: "POST",
                url: "php/add-event.php",
                data: { data: json }
            }).done(function(){
                $('#event-calendar').fullCalendar( 'refetchEvents' );
            });
        }
        $('#newEvent').modal('hide');
    });
    $('#viewEventDelete').confirm({
        text: "Are you sure you want to delete this event?",
        title: "Confirmation required",
        confirm: function(button) {
            postUrl = "";
            if( $('#viewEventHiddenType').val() == "t" ) {
                postUrl = "delete-trail.php";
            }
            if( $('#viewEventHiddenType').val() == "e" ) {
                postUrl = "delete-event.php";
            }
            $.ajax({
                type: "POST",
                url: "php/" + postUrl,
                data: { id: $('#viewEventHiddenID').val() }
            }).done(function(){
                $('#event-calendar').fullCalendar( 'refetchEvents' );
                $('#viewEventModal').modal('hide');                
            });
        },
        cancel: function(button) {
            // nothing to do
        },
        confirmButton: "Yes I am",
        cancelButton: "No"
    });
    $(".loadAnnouncement").click(function(){
        $('#viewAnnouncementModal').modal();
        $('#viewAnnouncementEdit').removeClass('hidden');
        $('#viewAnnouncementSave').addClass('hidden');
        $('#viewAnnouncementToFrom').addClass('hidden');
        $.get( "php/get-announcement.php", { id: $(this).attr('announcement') } ).done(function( data ) {
            data = $.parseJSON( data );
            $('#viewAnnouncementHiddenID').val(data.ID);
            $('#viewAnnouncementTitle').html(data.TITLE);
            $('#viewAnnouncementDescription').html(data.DESCRIPTION);
            $('#viewAnnouncementFrom').val(data.FROMDATE);
            $('#viewAnnouncementTo').val(data.TODATE);
        });
    });
    $('#viewAnnouncementDelete').confirm({
        text: "Are you sure you want to delete this announcement?",
        title: "Confirmation required",
        confirm: function(button) {
            postUrl = "";
            $.ajax({
                type: "POST",
                url: "php/delete-announcement.php",
                data: { id: $('#viewAnnouncementHiddenID').val() }
            }).done(function(){
                $( "li[announcement='"+$('#viewAnnouncementHiddenID').val()+"']" ).remove();
                $('#viewAnnouncementModal').modal('hide');                
            });
        },
        cancel: function(button) {
            // nothing to do
        },
        confirmButton: "Yes I am",
        cancelButton: "No"
    });
    $('#viewEventEdit').click(function(){
        $(this).addClass('hidden');
        $('#viewEventSave').removeClass('hidden');
    });
    $('#viewAnnouncementEdit').click(function(){
        $(this).addClass('hidden');
        $('#viewAnnouncementSave').removeClass('hidden');
        $('#viewAnnouncementToFrom').removeClass('hidden');
        var oldTitle = $('#viewAnnouncementTitle').html();
        var oldDescription = $('#viewAnnouncementDescription').html();
        var titleInput = $("<input>");
        titleInput.val(oldTitle);
        $('#viewAnnouncementTitle').empty().append(titleInput);
        var descriptionInput = $("<textarea>");
        descriptionInput.val(oldDescription);
        $('#viewAnnouncementDescription').html(descriptionInput);
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