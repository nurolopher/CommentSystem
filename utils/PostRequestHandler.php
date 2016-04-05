<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/Comment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/Post.php');

/**
 * Created by PhpStorm.
 * User: nursultan
 * Date: 4/5/16
 * Time: 2:18 AM
 */
class PostRequestHandler
{
    /**
     * @return Comment
     */
    public static function convertPostRequestToComment()
    {
        try {
            if (!$_POST['postId'] || !$_POST['content'] || sizeof($_POST) != 2) {
                return false;
            }
            $comment = new Comment();
            $comment->setContent($_POST['content']);
            $comment->setPostId($_POST['postId']);
            return $comment;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @return bool|Post
     */
    public static function convertPostRequestToPost()
    {
        try {
            if (!$_POST['name'] || !$_POST['email'] || !$_POST['message'] || sizeof($_POST) != 3) {
                false;
            }
            $post = new Post();
            $post->setName($_POST['name']);
            $post->setEmail($_POST['email']);
            $post->setMessage($_POST['message']);
            return $post;
        } catch (Exception $e) {
            return false;
        }
    }
}