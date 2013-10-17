/*jslint browser: true*/
/*global jQuery */

// Creating the widget
jQuery.widget("ui.tableRowKeySelector", {
    // default options
    options: {
        currentClass: 'currentRow'
    },

    _init: function () {
        "use strict";
        var find, link, keys, name, self, title;

        self = this;
        jQuery(document).keyup(function (e) {self.listener(e); });

        // Set the title attributes for the keys
        keys = {Down: '\u2193', End: 'End', Home: 'Home', Left: '\u2190', PgDn: 'PgDn', PgUp: 'PgUp', Right: '\u2192', Up: '\u2191'};

        for (name in keys) {
            if (keys.hasOwnProperty(name)) {
                find  = 'a.key' + name +  '[href]';
                title = keys[name];
                link  = jQuery(find, this.element);

                if (link.length > 0) {
                    if (!link.attr('title')) {
                        link.attr('title', '[' + title + ']');
                        // alert(link.attr('title'));
                    }
                }

                find = 'a.keyCtrl' + name +  '[href]';
                link = jQuery(find, this.element);

                if (link.length > 0) {
                    if (!link.attr('title')) {
                        link.attr('title', '[Ctrl^' + title + ']');
                        // alert(link.attr('title'));
                    }
                }
            }
        }
    },

    listener: function (e) {
        "use strict";
        var currentItem, key, link, nextItem = null;

        if (e === null) {
            key = event.keyCode;
        } else { // mozilla
            key = e.which;
        }

        currentItem = jQuery('tr.' + this.options.currentClass + ':first', this.element);

        switch (key) {
        case 13: // Enter
            if (currentItem.length > 0) {
                // this.element.after(jQuery('a[href]', currentItem).eq(0).attr('href') + ' enter<br/>');
                e.stopPropagation();
                location.href = jQuery('a[href]', currentItem).eq(0).attr('href');
                return;
            }
            break;

        case 33:  // PgUp
            link = jQuery('a.keyPgUp[href]', this.element);
            if (link.length > 0) {
                e.stopPropagation();
                location.href = link.attr('href');
                return;
            }
            nextItem = jQuery('tbody > tr:first', this.element);
            break;

        case 34:  // PgDn
            link = jQuery('a.keyPgDn[href]', this.element);
            if (link.length > 0) {
                e.stopPropagation();
                location.href = link.attr('href');
                return;
            }
            nextItem = jQuery('tbody > tr:last', this.element);
            break;

        case 35:  // End
            if (e.ctrlKey) {
                nextItem = jQuery('tbody > tr:last', this.element);
            } else {
                link = jQuery('a.keyEnd[href]', this.element);
                if (link.length > 0) {
                    e.stopPropagation();
                    location.href = link.attr('href');
                    return;
                }
                nextItem = jQuery('tbody > tr:last', this.element);
            }
            break;

        case 36:  // Home
            if (e.ctrlKey) {
                nextItem = jQuery('tbody > tr:first', this.element);
            } else {
                link = jQuery('a.keyHome[href]', this.element);
                if (link.length > 0) {
                    e.stopPropagation();
                    location.href = link.attr('href');
                    return;
                }
                nextItem = jQuery('tbody > tr:first', this.element);
            }
            break;

        case 38:  // Up
            if (e.ctrlKey) {
                link = jQuery('a.keyCtrlUp[href]', this.element);
                if (link.length > 0) {
                    e.stopPropagation();
                    location.href = link.attr('href');
                    return;
                }
            }

            if (currentItem.length === 0) {
                nextItem = jQuery('tbody > tr:last', this.element);
            } else {
                nextItem = currentItem.prev();
            }
            // this.element.after('up<br/>');
            break;

        case 40: // down
            if (e.ctrlKey) {
                link = jQuery('a.keyCtrlDown[href]', this.element);
                if (link.length > 0) {
                    e.stopPropagation();
                    location.href = link.attr('href');
                    return;
                }
            }

            if (currentItem.length === 0) {
                nextItem = jQuery('tbody > tr:first', this.element);
            } else {
                nextItem = currentItem.next();
            }
            // this.element.after('down<br/>');
            break;
        }

        if ((nextItem !== null) && (nextItem.length > 0)) {
            if (currentItem.length) {
                currentItem.removeClass(this.options.currentClass);
            }
            // e.stopPropagation();
            nextItem.addClass(this.options.currentClass);
        }
    }
});
