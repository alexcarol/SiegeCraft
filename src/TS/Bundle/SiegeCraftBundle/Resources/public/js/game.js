const FORTRESS = 'fortress';

var main = $('#main'),
    info = $('#info'),
    menu = $('#menu'),
    currentSection = FORTRESS;

$(document).ready(function () {
    renderSection(currentSection);

    $('li', menu).bind('click', function() {
        renderSection($(this).attr('class'));
    });
});

function renderSection(section) {
    $.get('/' + section, function (contents) {
        main.html(contents);
    });

    // Updating selection on menu
    $('li', menu).removeClass('active');
    $('.' + section, menu).addClass('active');
}