<?php

namespace App\Models;

abstract class Conexao
{
    private $dbname   = 'mysql:host=localhost;dbname=eng_soft';
    private $user     = 'root';
    private $password = '';

    protected function connect()
    {
        try {
            $conn = new \PDO($this->dbname, $this->user, $this->password);
            $conn->exec("set names utf8");
        } catch (\PDOException $erro) {
            echo $erro->getMessage();
        }

        return $conn;
    }
}