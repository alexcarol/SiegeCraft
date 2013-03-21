const FORTRESS = 'fortress';

var main = $('#main'),
    info = $('#info'),
    menu = $('#menu'),
    currentSection = FORTRESS,
    nodes = { units: null };

$(document).ready(function () {
    renderSection(currentSection);

    $('li:not(.disabled)', menu).bind('click', function() {
        renderSection($(this).data('tab'));
    });
});

function renderSection(section) {
    main.html('');
    info.html('');

    switch (section) {
        case FORTRESS:
            $.getJSON('/' + section, function (contents) {
                nodes = contents.nodes;
                renderFortress(contents.nodes);

                $('.node').bind('click', function () {
                    $('#nodeInfo').html('Node ' + $(this).data('id'));
                    //$('#nodeUnits').html(nodes.units); <- we should load units info here
                });

                info.html(contents.info);

                $('a', '#nodeActions').bind('click', function () {
                    var self = $(this);

                    switch (self.data('action')) {
                        case 'conquer':
                            self.html('Abandon');
                            self.data('action', 'abandon');
                            break;
                        case 'abandon':
                            self.html('Conquer');
                            self.data('action', 'conquer');
                            break;
                    }

                    self.toggleClass('btn-success btn-danger');

                    return false;
                });
            });
            break;
        default:
            main.append('<div class="text-center">' + $('[data-tab=' + section + '] a').html() + '</div>');
            break;
    }

    // Updating selection on menu
    $('li', menu).removeClass('active');
    $('[data-tab=' + section + ']', menu).addClass('active');
}

function renderFortress(data) {
    var draw = new FortressDrawer();

    for (var i = 0; i < data.length; i++) {
        draw.circle(data[i].id, data[i].x, data[i].y);
    }
}