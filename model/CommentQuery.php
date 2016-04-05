<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/BaseQuery.php');

class CommentQuery extends BaseQuery
{
    static function create()
    {
        return new CommentQuery();
    }


    public function findAll()
    {
        $comments = array();
        $pdoStatement = parent::$pdo->prepare("SELECT * FROM comment_system.comments ORDER BY comment_system.comments.id DESC");
        $pdoStatement->execute();
        foreach ($pdoStatement->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $comment = new Comment();
            foreach ($row as $key => $value) {
                $method = 'set' . ucfirst($key);
                $comment->$method($value);
            }
            $comments[] = $comment;
        }
        return $comments;
    }

    public function findOneById($id)
    {
        //Simply return false if id is not an integer.
        if (!is_int($id = (int)$id) && $id <= 0) {
            return false;
        }

        $pdoStatement = parent::$pdo->prepare("SELECT * FROM comment_system.comments WHERE id = :id");
        $pdoStatement->bindValue(':id', $id);
        $pdoStatement->execute();
        $row = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return false;
        }
        $comment = new Comment();
        foreach ($row as $key => $value) {
            $method = 'set' . ucfirst($key);
            $comment->$method($value);
        }
        return $comment;
    }

    public function findByPostId($postId)
    {

        if (!is_int($postId = (int)$postId) && $postId <= 0) {
            return false;
        }

        $comments = array();
        $pdoStatement = parent::$pdo->prepare("SELECT * FROM comment_system.comments WHERE comment_system.comments.postId = :postId ORDER BY comment_system.comments.id ASC");
        $pdoStatement->bindValue(':postId', $postId);
        $pdoStatement->execute();
        foreach ($pdoStatement->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $comment = new Comment();
            foreach ($row as $key => $value) {
                $method = 'set' . ucfirst($key);
                $comment->$method($value);
            }
            $comments[] = $comment;
        }
        return $comments;
    }

    protected static function createInstance()
    {
        return new CommentQuery();
    }

    /**
     * @param AbstractModel| Comment $model
     * @return bool| Comment
     */
    public function save(AbstractModel $model)
    {
        try {
            $pdoStatement = parent::$pdo->prepare("INSERT INTO comment_system.comments(content,createdAt,postId) VALUES(:content,:createdAt,:postId)");
            $pdoStatement->bindValue(':content', $model->getContent(), PDO::PARAM_STR);
            $pdoStatement->bindValue(':createdAt', (new \DateTime('now'))->format('Y-m-d H:i:s'), PDO::PARAM_STR);
            $pdoStatement->bindValue(':postId', $model->getPostId(), PDO::PARAM_INT);

            if ($pdoStatement->execute()) {
                return $this->findOneById(parent::$pdo->lastInsertId());
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }
}

?>