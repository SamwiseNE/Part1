<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

class ListGateway extends Gateway  {

    public function __construct() {
        $this->setDatabase(DATABASE2);
    }

    /**
     * Param is passed into the SQL query
     * user_id is taken from the session
     * sets data to $result
     *
     * @param integer $user_id
     */
    public function findAll($user_id) {
        $sql = "SELECT DISTINCT paper_id FROM list WHERE user_id = :user_id";
        $params = [":user_id" => $user_id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    /**
     * Param is passed into the SQL query
     * user_id and paper_id are inserted into the database
     *
     * @param integer $user_id
     * @param integer $paper_id
     */
    public function add($user_id, $paper_id) {
        $sql = "INSERT INTO list (user_id, paper_id) VALUES (:user_id, :paper_id)";
        $params = [":user_id" => $user_id, ":paper_id" => $paper_id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    /**
     * Param is passed into the SQL query
     * user_id and paper_id are removed from the database
     *
     * @param integer $user_id
     * @param integer $paper_id
     */
    public function remove($user_id, $paper_id) {
        $sql = "DELETE FROM list WHERE (user_id = :user_id) AND (paper_id = :paper_id)";
        $params = [":user_id" => $user_id, ":paper_id" => $paper_id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }
}