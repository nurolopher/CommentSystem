<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/PostRequestHandler.php');

$comment = PostRequestHandler::convertPostRequestToComment();
$comment = $comment->save();
if ($comment) {
    echo json_encode($comment->getJsonData());
}

?>