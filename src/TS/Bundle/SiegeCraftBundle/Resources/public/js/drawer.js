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