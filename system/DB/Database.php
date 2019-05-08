<?php

namespace System\DB;


/**
 * Class for connecting database and executing queries
 *
 * Class Database
 * @package System\DB
 */
class Database
{

    private $conn = null;
    private $sql = null;

    public function __construct()
    {
        try {
            $this->conn = new \PDO("mysql:host=" . config('db_host') . ";dbname=" . config('db_name'), config('db_user'), config('db_pass'));

            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch (\PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

    }
    /**
     * Execute the given SQL query
     * @param string $sql
     * @return \PDOStatement $stmt
     */

    public function query($sql) {

        $this->sql = $sql;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    /**
     * Get data from PDOStatement in associative array.
     * @param \PDOStatement $result
     * @return array|mixe d
     */

    public function fetch_assoc($result) {
        $result->setFetchMode(\PDO::FETCH_ASSOC);
        return $result->fetchAll();
    }

    /**
     *Get last executed SQL query.
     * @return string
     */
    public function last_query()
    {
        return $this->sql;
    }

    /**
     * Returns id of last inserted
     * data in the database
     * @return int
     */
    public function insert_id()
    {
        return $this->conn->lastInsertId();
    }
}