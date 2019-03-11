<?php

namespace System\DB;


class Database
{
    private $conn = null;

    public function __construct()
    {
    try {
    $this->conn = new \PDO("mysql:host=".config( 'db_host').";dbname=".config('db_user'), config( 'db_pass'));
    $this->conn->setAttribute( \PDO::ATTR_ERRMODE,  \PDO::ERRMODE_EXCEPTION);

    }

    catch(\PDOException $e)
    {
        echo "Connection failed:" . $e->getMessage();
    }
    }

    public function query($sql)
    {
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function fetch_assoc($result) {
        return $result->setFetchMode(\PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }
    public function last_query()
    {
        return $this->sql;
    }
}