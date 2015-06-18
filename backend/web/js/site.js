/**
 * Created by Pavel on 21.2.2015.
 */

// shows or hides other type options
$('#typeSwitch').on('click', function() {
    if ($(this).prop('checked') == true) {
        $('.type-options').show();
    } else {
        $('.type-options').hide();
    }
});

// fires action on cancel button click
$('#cancel-btn').on('click', function(e) {
    e.preventDefault();
    location.href = $(this).attr('data-cancel-url');
});

// fires action on cancel button click
$('#create-btn').on('click', function(e) {
    e.preventDefault();
    location.href = $(this).attr('data-create-url');
});