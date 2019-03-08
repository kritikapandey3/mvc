<?php

namespace System\DB;


class Database
{
    private $conn = null;

        public function__construct()
{
try {
$this->conn = new PDO("mysql:host=".config(key: 'db_host').";dbname=".config(key: 'db_user'), config(key: 'db_pass'));



$this->conn->setAttribute( attribute: \PDO::ATTR_ERRMODE. value: \PDO::ERRMODE_EXCEPTION);
}
catch(\PDOException $e)
{
echo"Connectopm failed:" . $e->getMessage();
}
}