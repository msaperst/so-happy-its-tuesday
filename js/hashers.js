$(document).ready(function() {
    startSearching();
});
function addDeleteHasher() {
    $('.hasher button').click(function(){
        deleteHasher($(this).parent());
    });
}
function deleteHasher(ele) {
    ele.remove();
}
function startSearching() {
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
                
                var deleteIcon = $("<i>");
                deleteIcon.addClass("fa fa-trash-o");
                var removeHasherButton = $("<button>");
                removeHasherButton.addClass("split-transaction-delete-btn btn btn-xsm btn-danger");
                removeHasherButton.attr("title", "Remove Hasher");
                removeHasherButton.append(deleteIcon);
                var span = $("<span>");
                span.addClass("hasher");
                span.attr("hasherid", hasherid);
                span.append(hasher + " ");
                span.append(removeHasherButton);
                $(search_ele.parent().parent().find(".holder")).append(span);                
                search_ele.val('');
                addDeleteHasher();
                });

        });
    }).blur(function(){
        if( $(this).next().hasClass('results') ) {
            $(this).next().fadeOut(500);
        }
    }).focus(function() {
        if( $(this).next().hasClass('results') ) {
            $(this).next().show();
        }
    });
}