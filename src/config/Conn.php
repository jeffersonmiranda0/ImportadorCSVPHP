<?php
/**
 * Created by PhpStorm.
 * User: Jefferson Miranda
 * Date: 27/02/2020
 * Time: 21:05
 */

namespace importador\config;


class Conn extends \PDO
{

    private $dsn        = 'mysql:dbname=teste;host=127.0.0.1';
    private $username   = 'root';
    private $password   = '';

    public function __construct()
    {
//        $this->dsn      = $dsn <> '' ? $dsn : $this->dsn;
//        $this->username = $username <> '' ? $username : $this->username;
//        $this->password = $password <> '' ? $password : $this->password;

        parent::__construct($this->dsn, $this->username, $this->password);
    }
}