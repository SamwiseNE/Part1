<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @date 12/01/2022
 * @time 16:00
 *
 */

class PapersGateway extends Gateway  {


    public function __construct() {
        $this->setDatabase(DATABASE1);
    }


    //Executes SQL query
    //returns all from paper with link to awards
    //sets data to $result
    public function findAll() {

        $sql = "SELECT p.title, p.paper_id, p.abstract, at.name AS 'award'
                FROM paper p
                LEFT JOIN award a on p.paper_id = a.paper_id
                LEFT JOIN award_type at on a.award_type_id = at.award_type_id";
        $result = $this->getDatabase()->executeSQL($sql);
        $this->setResult($result);
    }

    /**
     * Param is passed into the SQL query
     * allows for papers to be searched by title
     * uses LIKE and wildcards to achieve this
     * sets data to $result
     *
     * @param $title
     */
    public function findPaperTitle($title) {

        $search = "%".$title."%";
        $sql = "SELECT DISTINCT p.title, p.paper_id, p.abstract
                FROM paper p
                WHERE p.title LIKE :title
                ORDER BY p.title";
        $params = ["title" => $search];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    /**
     * Param is passed into the SQL query
     * searches for specific paper linked to id
     * sets data to $result
     *
     * @param $paper_id
     */
    public function findOnePaper($paper_id) {

        $sql = "SELECT DISTINCT p.title, p.paper_id, p.abstract
                FROM paper p
                WHERE p.paper_id = :id
                ORDER BY p.title";
        $params = ["id" => $paper_id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    /**
     * Param is passed into the SQL query
     * information is returned based on author_id
     * linked to the papers table to display more information
     * sets data to $result
     *
     * @param $author_id
     */
    public function findAuthorID($author_id) {

        $sql= "SELECT p.title, p.paper_id, p.abstract, a.first_name, a.last_name, a.author_id
                FROM paper p
                INNER JOIN paper_author pa on p.paper_id = pa.paper_id
                INNER JOIN author a on (pa.author_id = a.author_id)
                WHERE a.author_id = :authorid
                ORDER BY p.title";
        $params = ["authorid" => $author_id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }


    //Executes SQL query
    //only returns papers with an award
    //sets data to $result
    public function findAwards() {

        $sql = "SELECT p.paper_id, p.title, at.name
                FROM paper p
                JOIN award aw on p.paper_id = aw.paper_id
                JOIN award_type at on aw.award_type_id = at.award_type_id
                ORDER BY p.title";
        $result = $this->getDatabase()->executeSQL($sql);
        $this->setResult($result);
    }

    /**
     * Param is passed into the SQL query
     * allows for papers to filtered by author  last name
     * uses LIKE and wildcards to achieve this
     * sets data to $result
     *
     * @param $search
     */
    public function findAuthor($search) {

        $find = "%".$search."%";
        $sql = " SELECT p.title, p.paper_id, p.abstract, a.first_name, a.last_name, a.author_id
                FROM paper p
                INNER JOIN paper_author pa on p.paper_id = pa.paper_id
                INNER JOIN author a on (pa.author_id = a.author_id)
                WHERE a.last_name LIKE :name
                ORDER BY a.last_name";
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
     * @param $content
     */
    public function findContent($content) {

        $sql = "SELECT a.author_id, a.first_name, a.last_name
                FROM paper p
                INNER JOIN paper_author pa on p.paper_id = pa.paper_id
                INNER JOIN author a on pa.author_id = a.author_id
                WHERE p.paper_id = :content
                ORDER BY a.last_name";
        $params = ["content" => $content];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    //returns basic information from table paper
    public function findReading() {

        $sql = "SELECT p.title, p.paper_id, p.abstract
                FROM paper p";
        $result = $this->getDatabase()->executeSQL($sql);
        $this->setResult($result);
    }

}
