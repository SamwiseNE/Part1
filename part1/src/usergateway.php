<?php

class UserGateway extends Gateway  {

    public function __construct() {
        $this->setDatabase(DATABASE2);
    }


    public function findPassword($email)
    {
        $sql = "SELECT id, password FROM user WHERE email = :email";
        $params = [":email" => $email];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

}