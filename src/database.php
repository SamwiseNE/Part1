<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

class Database
{
    private $dbConnection;


    public function __construct($dbName) {
        $this->setDbConnection($dbName);
    }

    /**
     * Create the Database connection
     *
     * @param string $dbName
     */
    private function setDbConnection($dbName) {
        $this->dbConnection = new PDO('sqlite:'.$dbName);
        $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Execute SQL query
     * with parameters if any
     *
     * @param $sql
     * @param array $params
     * @return mixed
     */
    public function executeSQL($sql, $params=[]) {
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}