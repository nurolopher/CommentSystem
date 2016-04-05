<?php
require_once('AbstractModel.php');
require_once('Comment.php');
require_once('CommentQuery.php');
require_once('PostQuery.php');

/**
 * Created by PhpStorm.
 * User: nursultan
 * Date: 4/4/16
 * Time: 7:56 PM
 */
class Post extends AbstractModel
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $message;
    /**
     * @var Comment[]
     */
    private $comments;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @param Comment[] $comments
     * @return Post
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return Comment[]
     */
    public function getComments()
    {
        if (!$this->comments) {
            $this->comments = CommentQuery::create()->findByPostId($this->id);
        }
        return $this->comments;
    }

    /**
     * @param string $message
     * @return Post
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $name
     * @return Post
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param DateTime $createdAt
     * @return Post
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $email
     * @return Post
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function save()
    {
        return PostQuery::create()->save($this);
    }
}