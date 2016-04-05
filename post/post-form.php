<form class="form-horizontal" name="comment-form">
    <input type="hidden" name="postId" value="<?php echo $post->getId() ?>">

    <div class="form-group">
        <label for="content" class="col-sm-2 control-label">Comment</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="content" name="content"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-default" disabled>Add</button>
        </div>
    </div>
</form>