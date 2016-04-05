/**
 * Created by nursultan on 4/4/16.
 */
jQuery(function () {
    (function ($) {
        $.widget('commentSystem.commentWidget', {
            options: {},
            _create: function () {
                this.options.submitBtn = this.element.find('button[type="button"]');
                this.options.textarea = this.element.find('textarea');
                this.options.commentsContainer = $('#comments-container');
                this.configSubmitBtn();
                this.configTextarea();
            },
            configSubmitBtn: function () {
                var self = this;
                self.options.submitBtn.on('click', self.element, function ($event) {
                    $event.preventDefault();
                    self.addComment();
                });
            },
            configTextarea: function () {
                var self = this;
                self.options.textarea.on('keyup', self.element, function () {
                    self.options.submitBtn[0].disabled = !this.value;
                });
            },
            addComment: function (commentsContainer) {
                var data = this.element.serialize();
                var self = this;
                var url = '/post/add-comment.php';
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function (data) {
                        data = JSON.parse(data);
                        self.appendCommentFromServer(data);
                        self.clearTextArea();
                    }
                });
            },
            clearTextArea: function () {
                this.options.textarea.val('');
            },
            appendCommentFromServer: function (data) {
                var self = this;
                var html = '<div class="row"><div class="col-md-8"><p>' + data.content + '</p></div><div class="col-md-4"><p class="text-info">' + data.createdAt + '</p> </div> </div> <hr/>';
                self.options.commentsContainer.append(html);
            }
        });
        $('form[name="comment-form"]').commentWidget();
    }(jQuery));
});