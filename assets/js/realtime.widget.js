/**
 * Created by nursultan on 4/5/16.
 */

(function ($) {
    $(function () {
        $.widget('commentSystem.realTime', {
            _create: function () {
                this.startPolling();
            },
            startPolling: function () {
                var self = this;
                (function poll() {
                    setTimeout(function () {
                        $.ajax({
                            url: self.options.url + self.options.getParams(), success: function (data) {
                                if (data.length > 0) {
                                    self.element.prepend(data);
                                }
                            }, complete: poll
                        });
                    }, 5000);
                })();
            }

        });
        var url = window.location.pathname;
        var urls = {
            '/': {
                url: "/post/has-new-post.php",
                selector: '#posts-container',
                getParams: function () {
                    return '?createdAt=' + $('#posts-container').find('span.time').first().data('timestamp');
                }
            }
        };
        if (urls[url]) {
            $(urls[url].selector).realTime(urls[url]);
        }
    });
}(jQuery));