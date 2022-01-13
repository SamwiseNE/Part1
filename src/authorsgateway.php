<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

class AuthorsGateway extends Gateway  {


    public function __construct() {
        $this->setDatabase(DATABASE1);
    }


    //Executes SQL query
    //returns all from author
    //sets data to $result
    public function findAll() {

        $sql = "SELECT * 
                FROM author
                ORDER BY first_name";
        $result = $this->getDatabase()->executeSQL($sql);
        $this->setResult($result);
    }

    /**
     * Param is passed into the SQL query
     * allows for authors to be searched by id
     * sets data to $result
     *
     * @param integer $id
     */
    public function findOneAuthor($id) {

        $sql = "SELECT * 
                FROM author 
				WHERE author_id = :id";
        $params = ["id" => $id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    /**
     * Param is passed into the SQL query
     * allows for authors to be searched by first name
     * uses LIKE and wildcards to achieve this
     * sets data to $result
     *
     * @param string $first_name
     */
    public function findFirstName($first_name) {

        $find = "%".$first_name."%";
        $sql= "SELECT * 
               FROM author 
               WHERE first_name LIKE :firstname
               ORDER BY first_name";
        $params = ["firstname" => $first_name];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    /**
     * Param is passed into the SQL query
     * allows for authors to be searched by middle name
     * uses LIKE and wildcards to achieve this
     * sets data to $result
     *
     * @param string $middle_name
     */
    public function findMiddleName($middle_name) {

        $find = "%".$middle_name."%";
        $sql= "SELECT * 
               FROM author 
               WHERE middle_name LIKE :middlename
               ORDER BY first_name";
        $params = ["middlename" => $find];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    /**
     * Param is passed into the SQL query
     * allows for authors to be searched by last name
     * used in part2
     * uses LIKE and wildcards to achieve this
     * linked to the papers table to display more information
     * sets data to $result
     *
     * @param string $search
     */
    public function searchAuthor($search) {
        $find = "%".$search."%";
        $sql= " SELECT *
                FROM author a
                INNER JOIN paper_author pa on (a.author_id = pa.author_id) 
                INNER JOIN paper p on (pa.paper_id = p.paper_id) 
                WHERE a.last_name LIKE :name
                ORDER BY a.first_name";
        $params = ["name" => $find];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    /**
     * Param is passed into the SQL query
     * allows for authors_id to be passed and used in part2
     * uses LIKE and wildcards to achieve this
     * linked to the papers table to display more information
     * sets data to $result
     *
     * @param integer $content
     */
    public function findContent($content) {

        $sql = "SELECT p.title, p.abstract, a.first_name, a.last_name
                FROM author a
                INNER JOIN paper_author pa on a.author_id = pa.author_id
                INNER JOIN paper p on pa.paper_id = p.paper_id
                WHERE a.author_id = :content
                ORDER BY a.last_name";
        $params = ["content" => $content];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

}
