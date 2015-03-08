
// Toggles visibility of property note
//noinspection JSUnusedGlobalSymbols
function togglePropertyNote(id) {
    var propertySwitch = $('#property_' + id);
    if (propertySwitch.find('input').prop('checked') == true) {
        propertySwitch.next().show();
    } else {
        propertySwitch.next().hide();
    }
}