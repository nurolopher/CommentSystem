<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/model/BaseQuery.php') ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/model/Post.php') ?>
<?php

/**
 * Created by PhpStorm.
 * User: nursultan
 * Date: 4/4/16
 * Time: 11:06 PM
 */
class PostQuery extends BaseQuery
{

    public function findAll()
    {
        $posts = array();
        $pdoStatement = self::$pdo->prepare("SELECT * FROM comment_system.posts ORDER BY comment_system.posts.createdAt DESC");
        $pdoStatement->execute();
        foreach ($pdoStatement->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $post = new Post();
            foreach ($row as $key => $value) {
                $method = 'set' . ucfirst($key);
                $post->$method($value);
            }
            $posts[] = $post;
        }
        return $posts;
    }

    /**
     * @param $id
     * @return Post
     */
    public function findOneById($id)
    {

        $pdoStatement = parent::$pdo->prepare("SELECT * FROM comment_system.posts WHERE id = :id");
        $pdoStatement->bindParam(':id', $id);
        $pdoStatement->execute();
        $row = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        $post = new Post();
        foreach ($row as $key => $value) {
            $method = 'set' . ucfirst($key);
            $post->$method($value);
        }
        return $post;
    }

    /**
     * @param $timestamp
     * @return array
     */
    public function findNewPosts($timestamp)
    {

        $posts = array();
        $pdoStatement = self::$pdo->prepare("SELECT * FROM comment_system.posts WHERE comment_system.posts.createdAt > :createdAt ORDER BY comment_system.posts.createdAt DESC");
        $pdoStatement->bindValue(':createdAt', $timestamp);
        $pdoStatement->execute();
        foreach ($pdoStatement->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $post = new Post();
            foreach ($row as $key => $value) {
                $method = 'set' . ucfirst($key);
                $post->$method($value);
            }
            $posts[] = $post;
        }
        return $posts;
    }

    public static function create()
    {
        if (self::$instance) {
            return self::$instance;
        }
        self::$instance = new PostQuery();
        return self::$instance;
    }


    /**
     * @param AbstractModel | Post $model
     * @return bool|Post
     */
    public function save(AbstractModel $model)
    {
        try {
            $pdoStatement = parent::$pdo->prepare("INSERT INTO comment_system.posts(name,email,message) VALUES(:name,:email,:message)");
            $pdoStatement->bindValue(':name', $model->getName(), PDO::PARAM_STR);
            $pdoStatement->bindValue(':email', $model->getEmail(), PDO::PARAM_STR);
            $pdoStatement->bindValue(':message', $model->getMessage(), PDO::PARAM_STR);

            if ($pdoStatement->execute()) {
                return $this->findOneById(parent::$pdo->lastInsertId());
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }
}