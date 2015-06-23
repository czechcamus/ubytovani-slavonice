/**
 * Created by Pavel on 18.2.2015.
 */

$(function() {
    var deleteBtnSelector = $('.grid-delete-btn');

    deleteBtnSelector.on('click', function() {
        alert(this.data('confirm'));
    });
});