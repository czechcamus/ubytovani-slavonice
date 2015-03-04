/**
 * Created by Pavel on 21.2.2015.
 */

$('#typeSwitch').on('click', function() {
    if ($(this).prop('checked') == true) {
        $('.type-options').show();
    } else {
        $('.type-options').hide();
    }
});