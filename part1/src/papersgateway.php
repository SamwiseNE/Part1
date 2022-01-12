<?php


class PapersGateway extends Gateway  {


    public function __construct() {
        $this->setDatabase(DATABASE1);
    }

    public function findAll() {

        $sql = "SELECT DISTINCT p.title, p.paper_id, p.abstract
                FROM paper p";
        $result = $this->getDatabase()->executeSQL($sql);
        $this->setResult($result);
    }

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

    public function findOnePaper($paper_id) {

        $sql = "SELECT DISTINCT p.title, p.paper_id, p.abstract
                FROM paper p
                WHERE p.paper_id = :id
                ORDER BY p.title";
        $params = ["id" => $paper_id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

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


    public function findAwards() {

        $sql = "SELECT p.paper_id, p.title, at.name
                FROM paper p
                JOIN award aw on p.paper_id = aw.paper_id
                JOIN award_type at on aw.award_type_id = at.award_type_id
                ORDER BY p.title";
        $result = $this->getDatabase()->executeSQL($sql);
        $this->setResult($result);
    }

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


}
