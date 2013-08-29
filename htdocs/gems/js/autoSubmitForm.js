
// Creating the widget
jQuery.widget("ui.autoSubmitForm", {

    // default options
    options: {
        // targetId: the element whose content is replaced
        timeout: 2000
        // submitUrl: the request url
    },

    _init: function () {
        "use strict";
        var self = this;

        /*
        console.log(this.element);            // Firebug console
        console.log(this.options.submitUrl);  // Firebug console
        console.log(this.options.targetId);   // Firebug console */

        // Bind the events
        jQuery('input:text, textarea', this.element).keyup(function (e) {self.filter(); });
        jQuery('select', this.element).change(function (e) {self.filter(); });
        jQuery('input:checkbox, input:radio', this.element).click(function (e) {self.filter(); });

        // Set the initial value
        this.lastQuery = this.value();
    },

    complete: function (request, status) {
        "use strict";
        this.request = null;

        // Check for changes
        // - if the input field was changed since the last request
        //   filter() will search on the new value
        // - if the input field has not changed, then no new request
        //   is made.
        this.filter();
    },

    destroy: function () {
        "use strict";
        if (this.request !== null) {
            this.request.abort();
            this.request = null;
        }
    },

    error: function (request, status) {
        "use strict";
        /*
        if (request.status === 401) {
            location.href = location.href;
        } // */
    },

    filter: function () {
        "use strict";
        var postData, self;

        //If we have a pending request and want to create a new one, cancel the first
        this.destroy();

        if (this.request === null) {

            // var name = this.options.elementName ? this.options.elementName : this.element.attr('name');

            postData = this.value();

            if (this.options.targetId && this.options.submitUrl) {
                // Prevent double dipping when e.g. the arrow keys were used.
                if (jQuery.param(postData) !== jQuery.param(this.lastQuery)) {
                    this.lastQuery = postData;
                    //console.log(postData);

                    //*
                    self = this;
                    this.request = jQuery.ajax({
                        url: this.options.submitUrl,
                        type: "POST",
                        dataType: "html",
                        data: postData,
                        error: function (request, status, error) {self.error(request, status); },
                        complete: function (request, status) {self.complete(request, status); },
                        success: function (data, status, request) {self.success(data, status, request); }
                    });
                    // */
                }
            }
        }
    },

    success: function (data, status, request) {
        "use strict";
        jQuery(this.options.targetId).html(data);
    },

    value: function () {
        "use strict";
        return jQuery(this.element[0]).serializeArray();
    },

    lastQuery: null,

    request: null

});
