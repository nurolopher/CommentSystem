<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/session/session.php') ?>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/PostRequestHandler.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/Post.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/session/TokenHandler.php');
if (!TokenHandler::isValidToken()) {
    header('Location: /post/new-post.php');
    exit();
}
$post = PostRequestHandler::convertPostRequestToPost();
if ($post instanceof Post) {
    if ($post->save()) {
        header("Location: /");
        exit();
    }
}

?>