<?php

/**
 * Created by PhpStorm.
 * User: nursultan
 * Date: 4/5/16
 * Time: 12:10 AM
 */
abstract class AbstractModel
{
    /**
     * @var integer
     */
    protected $id;

    function __call($name, $arguments)
    {

    }

    /**
     * @param int $id
     * @return AbstractModel
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public abstract function save();
}