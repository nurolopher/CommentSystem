<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/PostQuery.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/Post.php');
if (!$_GET['createdAt']) {
    echo '';
    return;
}
$posts = PostQuery::create()->findNewPosts($_GET['createdAt']);
/** @var Post $post */
foreach ($posts as $post) {
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="post/post.php?id=<?php echo $post->getId() ?>">
                <?php echo $post->getName() ?>
            </a>
                            <span
                                class="pull-right text-danger">Created at
                                <span class="time"
                                      data-timestamp="<?php echo $post->getCreatedAt() ?>"><?php echo $post->getCreatedAt() ?></span></span>
        </div>
        <div class="panel-body">
            <?php echo $post->getMessage() ?>
        </div>
    </div>
<?php } ?>