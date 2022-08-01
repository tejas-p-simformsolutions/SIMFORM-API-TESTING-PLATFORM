var App = {};
(function () {
    App = {
        selectors: {
            sendRequest: jQuery('#send-request'),
            cancelRequest: jQuery('#cancel-request'),
            method: jQuery('#method'),
            requestForm: jQuery('#http-request-form'),
            responseOutput: jQuery('#code-output'),
            responseHeader: jQuery('#header-output'),
            errorContainer: jQuery('#error'),
        },
        currentRequest: null,
        init: function () {
            this.bindSendAction();
            this.bindCancelAction();
        },
        bindSendAction: function () {
            this.selectors.requestForm.submit(function (e) {
                e.preventDefault();
                var selectorContext = App.selectors;
                selectorContext.errorContainer.addClass('d-none');
                selectorContext.responseOutput.text("");
                selectorContext.responseHeader.text("");
                
                App.currentRequest = $.ajax({
                    url: viewVars.url,
                    method: 'POST',
                    data: selectorContext.requestForm.serialize(),
                    beforeSend: function () {
                        $('.image').show();
                        selectorContext.sendRequest.attr('disabled', true);
                      },
                    success: function (result) {
                        $('.image').hide();
                        selectorContext.responseOutput.text(JSON.stringify(result.response, null, 2));
                        selectorContext.responseHeader.text(JSON.stringify(result.headers, null, 2));
                       
                    },
                    complete: function () {
                        $('.image').hide();
                        selectorContext.sendRequest.attr('disabled', false);
                    },
                    error: function (xhr, exception) {
                        $('.image').hide();
                        if (xhr.status == 404) {
                            msg = '404 - Requested page not found';
                        } else if (xhr.status == 500) {
                            msg = '500 - Internal Server Error';
                        } else if (exception === 'abort') {
                            msg = 'Request aborted';
                        } else {
                            msg = 'Uncaught Error';
                        }

                        if (xhr.responseText) {
                            msg += '<br/> <strong>Original Response: </strong>' + xhr.responseText;
                        }

                        selectorContext.errorContainer.html(msg).removeClass('d-none');
                        selectorContext.responseHeader.text("");
                        selectorContext.responseOutput.text("");
                        // Hide the error after 10 seconds
                        setTimeout(function () {
                            selectorContext.errorContainer.addClass('d-none');
                        }, 10000);
                    }
                })
            });
        },
        bindCancelAction: function () {
            this.selectors.cancelRequest.click(function (e) {
                e.preventDefault();
                var selectorContext = App.selectors;
                selectorContext.responseHeader.text("");
                selectorContext.responseOutput.text("");
                if (App.currentRequest && App.currentRequest.readyState !== 4) {
                    App.currentRequest.abort();
                }

                App.selectors.sendRequest.attr('disabled', false);
            });
        },
    };
})();