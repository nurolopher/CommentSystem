<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/session/session.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/views/partials/header.php') ?>
<div class="container">
    <h2 class="col-sm-10 col-sm-offset-2">New Post</h2>

    <div class="row">
        <div class="col-sm-12">
            <form class="form-horizontal" name="comment-form" method="post" action="/post/add-post.php">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email address</label>

                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-2 control-label">Message</label>

                    <div class="col-sm-10">
                        <textarea class="form-control" id="content" name="message"><?php $_POST['message'] ?></textarea>
                    </div>
                </div>
                <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>">

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/views/partials/footer.php'); ?>
