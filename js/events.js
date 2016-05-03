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
            $('#viewEventHares').next().addClass('hidden');
            $('#viewEventDetailsList2').addClass('hidden');
            $.get( "php/get-event.php", { id: calEvent.lookup_id, type: calEvent.type } ).done(function( data ) {
                data = $.parseJSON( data );
                $('#viewEventHiddenID').val(data.ID);
                $('#viewEventHiddenType').val(calEvent.type);
                $('#viewEventLocation').html(data.LOCATION);
                $('#viewEventDate').html(data.date);
                $('#viewEventDirections').html(data.DIRECTIONS);
                if( calEvent.type == "t" ) {    //if trail
                    if( data.ID > 190 ) {
                        data.ID--;
                    }
                    $('#viewEventTitle').html("Trail <span id='viewEventTitleNumber'>" + data.ID + "</span>: <span id='viewEventTitleTitle'>" + data.TITLE + "</span>");
                    var hares = "";
                    $.each( data.HARE_ID, function( id, hasher ) {
                        hares += "<span class='viewHasher' hasherid='" + id + "'>" + hasher + "</span><span class='spacer'>, </span>";
                    });
                    hares = hares.slice(0, -30);
                    $('#viewEventHares').html(hares);
                    $('#viewEventHares').show();
                    $('#viewEventTime').html("19:00");
                    $('#viewEventMap').html(data.MAPLINK);
                    $('#viewEventDescription').html(data.TIDBIT);
                    $('#viewEventStart').parent().show();
                    $('#viewEventStart').html("<a href='" + data.MAPLINK + "' target='_blank'>" + data.ADDRESS + "</a>");
                    $('#viewEventOnOnOn').parent().show();
                    $('#viewEventOnOnOn').html("<a href='" + data.MAPLINK + "' target='_blank'>" + data.ONONON + "</a>");
                    $('#viewEventNotes').parent().show()
                    $('#viewEventNotes').html(data.NOTES);
                } else {    //else event
                    $('#viewEventTitle').html(data.TITLE);
                    $('#viewEventHares').hide();
                    $('#viewEventTime').html(data.TIME);
                    $('#viewEventDescription').html(data.DESCRIPTION);
                    $('#viewEventStart').parent().hide();
                    $('#viewEventOnOnOn').parent().hide();
                    $('#viewEventNotes').parent().hide();
                }
            });
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
    $('#newAnnouncementSave').click(function(){
        $.ajax({
            type: "POST",
            url: "php/add-announcement.php",
            data: { 
                title: $('#newAnnouncementTitle input').val(),
                description: $('#newAnnouncementDescription textarea').val(),
                from: $('#newAnnouncementFrom').val(),
                to: $('#newAnnouncementTo').val()
            }
        }).done(function(data){
            var li = $('<li>');
            li.addClass('loadAnnouncement');
            li.attr('announcement',data);
            li.html($('#newAnnouncementTitle input').val());
            $('#allAnnouncements').append(li);
            $('#newAnnouncementModal').modal('hide');
            loadAnnouncement();
        });
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

        //setup our editable data
        var editLocation = $('<input>');
        editLocation.attr('id', 'editEventLocation');
        editLocation.val($('#viewEventLocation').html());
        $('#viewEventLocation').empty().append(editLocation);

        var myDate = new Date($('#viewEventDate').html());
        myDate = myDate.getFullYear() + '-'
                + ('0' + (myDate.getMonth()+1)).slice(-2) + '-'
                + ('0' + myDate.getDate()).slice(-2);
        var editDate = $('<input>');
        editDate.attr('id', 'editEventDate');
        editDate.attr('type', 'date');
        editDate.val(myDate);
        $('#viewEventDate').empty().append(editDate);

        var editTime = $('<input>');
        editTime.attr('id', 'editEventTime');
        editTime.attr('type', 'time');
        editTime.val($('#viewEventTime').html());
        $('#viewEventTime').empty().append(editTime);
        
        var editDescription = $('<textarea>');
        editDescription.attr('id', 'editEventDescription');
        editDescription.val($('#viewEventDescription').html());
        $('#viewEventDescription').empty().append(editDescription);

        var editDirections = $('<textarea>');
        editDirections.attr('id', 'editEventDirections');
        editDirections.val($('#viewEventDirections').html());
        $('#viewEventDirections').empty().append(editDirections);
        
        if( $('#viewEventHiddenType').val() == "t" ) {   //if it's a trail
            var editNumber = $('<input>');
            editNumber.attr('id', 'editEventNumber');
            editNumber.attr('type', 'number');
            editNumber.width('100px');
            editNumber.val($('#viewEventTitleNumber').html());
            $('#viewEventTitleNumber').empty().append(editNumber);
            var editTitle = $('<input>');
            editTitle.attr('id', 'editEventTitle');
            editTitle.val($('#viewEventTitleTitle').html());
            $('#viewEventTitleTitle').empty().append(editTitle);
            
            $('#viewEventHares').next().removeClass('hidden');
            $('.viewHasher').each(function(){
                $(this).addClass('hasher');
                var deleteIcon = $("<i>");
                deleteIcon.addClass("fa fa-trash-o");
                var removeHasherButton = $("<button>");
                removeHasherButton.addClass("split-transaction-delete-btn btn btn-xsm btn-danger");
                removeHasherButton.attr("title", "Remove Hasher");
                removeHasherButton.append(deleteIcon);
                $(this).append(" ");
                $(this).append(removeHasherButton);
                
            });
            $('.spacer').each(function(){
                $(this).hide();
            });
            addDeleteHasher();
            
            var editMap = $('<input>');
            editMap.attr('id', 'editEventMap');
            editMap.width('560px');
            editMap.val($('#viewEventMap').html());
            $('#viewEventMap').empty().append(editMap);
            $('#viewEventDetailsList2').removeClass('hidden');
            
            var editStart = $('<textarea>');
            editStart.attr('id', 'editEventStart');
            editStart.val($('#viewEventStart a').html());
            $('#viewEventStart').empty().append(editStart);
            
            var editOnOnOn = $('<textarea>');
            editOnOnOn.attr('id', 'editEventOnOnOn');
            editOnOnOn.val($('#viewEventOnOnOn a').html());
            $('#viewEventOnOnOn').empty().append(editOnOnOn);
            
            var editNotes = $('<textarea>');
            editNotes.attr('id', 'editEventNotes');
            editNotes.val($('#viewEventNotes').html());
            $('#viewEventNotes').empty().append(editNotes);
        } else {
            var editTitle = $('<input>');
            editTitle.attr('id', 'editEventTitle');
            editTitle.val($('#viewEventTitle').html());
            $('#viewEventTitle').empty().append(editTitle);
        }
    });
    $('#viewEventSave').confirm({
        text: "Are you sure you want to save your changes to this event?",
        title: "Confirmation required",
        confirm: function(button) {
            var postUrl = "";
            var json = new Object();
            if( $('#viewEventHiddenType').val() == "t" ) {
                postUrl = "update-trail.php";
                //add our simple values
                json.trail_id = $('#editEventNumber').val();
                json.trail_title = $('#editEventTitle').val();
                json.trail_location = $('#editEventLocation').val();
                json.trail_date = $('#editEventDate').val();
                json.trail_maplink = $('#editEventMap').val();
                json.trail_tidbit = $('#editEventDescription').val();
                json.trail_address = $('#editEventStart').val();
                json.trail_directions = $('#editEventDirections').val();
                json.ononon = $('#editEventOnOnOn').val();
                json.trail_notes = $('#editEventNotes').val();
                //add all of the hares
                var hares = new Array();
                $('#viewEventHares span:visible').each(function(){
                    hares.push( $(this).attr('hasherid') );
                });
                json.hares = hares;
            }
            if( $('#viewEventHiddenType').val() == "e" ) {
                postUrl = "update-event.php";
                json.title = $('#editEventTitle').val();
                json.date = $('#editEventDate').val();
                json.time = $('#editEventTime').val();
                json.location = $('#editEventLocation').val();
                json.description = $('#editEventDescription').val();
                json.directions = $('#editEventDirections').val();
            }
            $.ajax({
                type: "POST",
                url: "php/" + postUrl,
                data: { origid: $('#viewEventHiddenID').val(),
                        data: json
                }
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
    $('#viewAnnouncementSave').confirm({
        text: "Are you sure you want to save your changes to this announcement?",
        title: "Confirmation required",
        confirm: function(button) {
            $.ajax({
                type: "POST",
                url: "php/update-announcement.php",
                data: { 
                    id: $('#viewAnnouncementHiddenID').val(),
                    title: $('#viewAnnouncementTitle input').val(),
                    description: $('#viewAnnouncementDescription textarea').val(),
                    from: $('#viewAnnouncementFrom').val(),
                    to: $('#viewAnnouncementTo').val()
                }
            }).done(function(){
                $( "li[announcement='"+$('#viewAnnouncementHiddenID').val()+"']" ).html($('#viewAnnouncementTitle input').val());
                $('#viewAnnouncementModal').modal('hide');                
            });
        },
        cancel: function(button) {
            // nothing to do
        },
        confirmButton: "Yes I am",
        cancelButton: "No"
    });
    loadAnnouncement();
});
function loadAnnouncement() {
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
}