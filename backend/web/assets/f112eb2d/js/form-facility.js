/**
 * Created by Pavel on 23.2.2015.
 */

var subjectSelector = $('#subject-id');
var personSelector = $('#person-id');

// Toggles visibility of partner fields
$('#partner-switch').on('click', function() {
   $('#partner-fields').toggle();
});

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