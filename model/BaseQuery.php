<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/DbConnection.php');

/**
 * Created by PhpStorm.
 * User: nursultan
 * Date: 4/4/16
 * Time: 11:07 PM
 */
abstract class BaseQuery
{

    public function __construct()
    {
        self::$pdo = DbConnection::getInstance();
    }

    /**
     * @var BaseQuery
     */
    protected static $instance;

    /**
     * @var \PDO
     */
    protected static $pdo;

    protected $id;


    /**
     * @return BaseQuery
     */
    public static function create()
    {
        return null;
    }

    public abstract function findAll();


    public abstract function findOneById($id);

    public abstract function save(AbstractModel $model);
}