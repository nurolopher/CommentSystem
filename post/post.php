<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/views/partials/header.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/model/PostQuery.php') ?>
<?php $postId = $_GET['id'] ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                /** @var Post $post */
                $post = PostQuery::create()->findOneById($postId);
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><h2><?php echo $post->getName() ?></h2></div>
                    <div class="panel-body">
                        <?php echo $post->getMessage() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php $comments = $post->getComments(); ?>
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/comments.php') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <? include($_SERVER['DOCUMENT_ROOT'] . '/post/post-form.php') ?>
            </div>
        </div>
    </div>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/views/partials/footer.php') ?>