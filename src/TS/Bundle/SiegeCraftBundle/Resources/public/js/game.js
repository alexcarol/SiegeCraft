const FORTRESS = 'fortress';

var main = $('#main'),
    info = $('#info'),
    menu = $('#menu'),
    currentSection = FORTRESS,
    nodes = { units: null };

$(document).ready(function () {
    renderSection(currentSection);

    $('li', menu).bind('click', function() {
        renderSection($(this).attr('class'));
    });
});

function renderSection(section) {
    main.html('');

    switch (section) {
        case FORTRESS:
            $.getJSON('/' + section, function (contents) {
                nodes = contents.nodes;
                renderFortress(contents.nodes);
                info.html(contents.info);

                $('.node').bind('click', function () {
                    $('#nodeInfo').html('Node ' + $(this).data('id'));
                    //$('#nodeUnits').html(nodes.units); <- we should load units info here
                });
            });
            break;
        default:
            main.append('<div class="text-center">' + section.charAt(0).toUpperCase() + section.slice(1) + '</div>');
            break;
    }

    // Updating selection on menu
    $('li', menu).removeClass('active');
    $('.' + section, menu).addClass('active');
}

function renderFortress(data) {
    var draw = new FortressDrawer();

    for (var i = 0; i < data.length; i++) {
        draw.circle(data[i].id, data[i].x, data[i].y);
    }
}

FortressDrawer = function () {};
FortressDrawer.prototype = {
    _offset: {
        x: main.width() / 2,
        y: main.height() / 2
    },
    _tileSize: 70,
    _padding: 10,
    _borderStyle: '1px solid #222',

    circle: function (id, x, y) {
        var c = $('<div class="node" data-id="' + id + '" data-original-title="Node ' + id + '"></div>');

        c.css({
            position: 'absolute',
            left: this._offset.x - this._tileSize / 2 + x * (this._tileSize + this._padding) + 'px',
            top: this._offset.y - this._tileSize / 2 + y * (this._tileSize + this._padding) + 'px',
            border: this._borderStyle,
            'border-radius': this._tileSize / 2,
            width: this._tileSize + 'px',
            height: this._tileSize + 'px'
        });
        c.tooltip();

        main.append(c);
    }
}
