<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php require_once('views/partials/header.php') ?>
<?php require_once('model/PostQuery.php') ?>
<div class="container">
    <div class="row">
        <div class="col-md-9" id="posts-container">
            <?php
            /** @var Post[] $posts */
            $posts = PostQuery::create()->findAll();
            if (sizeof($posts) > 0) {
                for ($index = 0, $length = sizeof($posts); $index < $length; $index++) {
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="post/post.php?id=<?php echo $posts[$index]->getId() ?>">
                                <?php echo $posts[$index]->getName() ?>
                            </a>
                            <span
                                class="pull-right text-danger">Created at
                                <span class="time"
                                      data-timestamp="<?php echo $posts[$index]->getCreatedAt() ?>"><?php echo $posts[$index]->getCreatedAt() ?></span></span>
                        </div>
                        <div class="panel-body">
                            <?php echo $posts[$index]->getMessage() ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<?php require_once('views/partials/footer.php') ?>
