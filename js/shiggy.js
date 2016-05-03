$(document).ready(function() {
    
    //create a generic delete button
    var deleteIcon = $("<i>");
    deleteIcon.addClass("fa fa-trash-o");
    var deletePositionButton = $("<button>");
    deletePositionButton.addClass("split-transaction-delete-btn btn btn-sm btn-danger");
    deletePositionButton.attr("title", "Delete Position");
    deletePositionButton.append(deleteIcon.clone());
    var removeHasherButton = $("<button>");
    removeHasherButton.addClass("split-transaction-delete-btn btn btn-xsm btn-danger");
    removeHasherButton.attr("title", "Remove Hasher");
    removeHasherButton.append(deleteIcon.clone());

    $('#editMismanagement').click(function(){
        //fix our buttons
        $(this).addClass('hidden');
        $('#saveMismanagement').removeClass('hidden');
        $('#addPosition').removeClass('hidden');
        
        $('.mismanagement').each(function(){
            //add a new column to our table
            var cell = $("<td>");
            cell.addClass("delete");
            delButton = deletePositionButton.clone();
            delButton.attr("style","margin:8px 0px;");
            delButton.click(function(){
                $(this).closest('tr').remove();
            });
            cell.append(delButton);
            $(this).find('td').eq(0).before(cell);
            //transform the position title into an input cell
            var position_cell = $(".position", this);
            var position_title = position_cell.html();
            var position_input = $("<input>");
            position_input.addClass("form-control");
            position_input.attr("style","min-width:300px;margin:4px 0px;");
            position_input.attr("placeholder","Enter Position Title");
            position_input.val(position_title);
            position_cell.empty().append(position_input);
            //setup our whois for searching
            var whois_cell = $(".whois", this);
            $(".hidden", whois_cell).removeClass("hidden");
        });
        //transform the hashers into inputs
        $(".viewHasher").each(function(){
            $(this).addClass('hasher');
            $(this).append(removeHasherButton.clone());
            $(this).closest(".whois").find(".holder").append($(this));
        });
        $(".hasherholder").each(function(){
            $(this).remove();
        });
        addDeleteHasher();
    });
    
    $('#addPosition').click(function(){
        var row = $("<tr class='mismanagement'>");
        //our delete cell
        var deleteCell = $("<td>");
        deleteCell.addClass("delete");
        delButton = deletePositionButton.clone();
        delButton.attr("style","margin:8px 0px;");
        delButton.click(function(){
            $(this).closest('tr').remove();
        });
        deleteCell.append(delButton);
        row.append(deleteCell);
        //our position cell
        var positionCell = $("<td>");
        positionCell.addClass("position");
        var position_input = $("<input>");
        position_input.addClass("form-control");
        position_input.attr("style","min-width:300px;margin:4px 0px;");
        position_input.attr("placeholder","Enter Position Title");
        positionCell.append(position_input);
        row.append(positionCell);
        //our hasher cell
        var whoisCell = $("<td>");
        whoisCell.addClass("whois");
        whoisSearch = $("<input>");
        whoisSearch.attr("placeholder", "Find a wanker");
        whoisSearch.addClass("searcher form-control");
        var whoisSearchSpan = $("<span>");
        whoisSearchSpan.append(whoisSearch);
        whoisCell.append(whoisSearchSpan);
        whoisSpan = $("<span>");
        whoisSpan.addClass("holder");
        whoisCell.append(whoisSpan);
        row.append(whoisCell);
        $('table#mismanagement tbody').append( row );
        startSearching();
    });
    
    $('#saveMismanagement').click(function(){
        var mismanagement = new Object();
        $('.mismanagement').each(function(){
            var position = $(this).find('.position input').val();
            var who = $(this).find('.whois .holder span');
            var who_is = [];
            who.each(function(){
                who_is.push( $(this).attr('hasherid') );
            });
            mismanagement[position] = who_is;
        });
        $.ajax({
            type: "POST",
            url: "php/update-mismanagement.php",
            data: { mismanagement: mismanagement }
        }).done(function() {
            $('table#mismanagement tr').each(function(){
                $(".delete", this).remove();
                $(".position", this).html($(".position input", this).val());
                $(".whois .holder span", this).each(function(){
                    $(this).removeClass('hasher');
                    $("button", this).remove();
                    var div = $("<div>");
                    div.addClass("hasherholder");
                    $(this).parent().parent().append(div);
                    div.append($(this));
                });
                $(".whois>span:first-child", this).addClass("hidden");
                $('#saveMismanagement').addClass('hidden');
                $('#addPosition').addClass('hidden');
                $('#editMismanagement').removeClass('hidden');
            });
        });
    });
    
    $('#hareLogLookup').keyup(function(){
        var lookup = $(this).val();
        $('#harelog tbody tr').each(function(){
            if( $(".hashname", this).html().toLowerCase().indexOf(lookup.toLowerCase()) >= 0 ) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});