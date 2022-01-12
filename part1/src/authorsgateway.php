<?php


class AuthorsGateway extends Gateway  {


    public function __construct() {
        $this->setDatabase(DATABASE1);
    }

    public function findAll() {

        $sql = "SELECT * 
                FROM author
                ORDER BY first_name ASC";
        $result = $this->getDatabase()->executeSQL($sql);
        $this->setResult($result);
    }

    public function findOneAuthor($id) {

        $sql = "SELECT * 
                FROM author 
				WHERE author_id = :id";
        $params = ["id" => $id];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    public function findFirstName($first_name) {

        $sql= "SELECT * 
               FROM author 
               WHERE first_name = :firstname
               ORDER BY first_name ASC";
        $params = ["firstname" => $first_name];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    public function findMiddleName($middle_name) {

        $sql= "SELECT * 
               FROM author 
               WHERE middle_name = :middlename
               ORDER BY first_name ASC";
        $params = ["middlename" => $middle_name];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    public function findLastName($last_name) {

        $sql= "SELECT * 
               FROM author 
               WHERE last_name = :lastname
               ORDER BY first_name ASC";
        $params = ["lastname" => $last_name];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

    public function searchAuthor($search)
    {
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

    public function findContent($content)
    {

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
