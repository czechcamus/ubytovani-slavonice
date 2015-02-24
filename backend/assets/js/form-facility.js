/**
 * Created by Pavel on 23.2.2015.
 */

var subjectSelector = $('#subject-id');
var personSelector = $('#person-id');
var partnerSwitch = $('#partner-switch');
var partnerFields = $('#partner-fields');

// Toggles visibility of partner fields
partnerSwitch.on('click', function() {
    if ($(this).prop('checked') == true) {
        partnerFields.show();
    } else {
        partnerFields.hide();
    }
});

if (partnerSwitch.prop('checked') == true) {
    partnerFields.show();
}

// If subject changes, updates person list
subjectSelector.on('change', function() {
   changePersonList();
});

// Updates person list according subject
function changePersonList() {
    var subId = subjectSelector.prop('value');
    personSelector.empty();
    $.getJSON(subjectSelector.attr('data-source-url'), { subId: subId }, function(result) {
        $.each(result, function(key, value) {
            var selectedString = (personSelector.attr('data-value') == key) ? " selected" : "";
            personSelector.append('<option value=\"' + key + '\"' + selectedString + '>' + value + '</option>');
        });
    });
}