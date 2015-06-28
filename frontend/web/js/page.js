/**
 * Created by Pavel on 17.5.2015.
 */

// jQuery functions
( function($) {
    $(document).ready(function(){
        $('.parallax').parallax();
        $('.materialboxed').materialbox();
        $('.modal-trigger').leanModal();
        $('.datepicker').pickadate({
            firstDay: 1,
            monthsFull: ['Leden', 'Únor', 'Březen', 'Duben', 'Květen', 'Červen', 'Červenec', 'Srpen', 'Září', 'Říjen', 'Listopad', 'Prosinec'],
            monthsShort: ['Led', 'Úno', 'Bře', 'Dub', 'Kvě', 'Čvn', 'Čvc', 'Srp', 'Zář', 'Říj', 'Lis', 'Pro'],
            weekdaysFull: ['Neděle', 'Pondělí', 'úterý', 'Středa', 'Čtvrtek', 'Pátek', 'Sobota'],
            weekdaysShort: ['Ne', 'Po', 'Út', 'St', 'Čt', 'Pá', 'So'],
            weekdaysLetter: [ 'N', 'P', 'Ú', 'S', 'Č', 'P', 'S' ],
            today: 'dnes',
            clear: 'smazat',
            close: 'zavřít',
            format: 'dd.mm.yyyy',
            formatSubmit: 'dd.mm.yyyy'
        });
    });
} )( jQuery );