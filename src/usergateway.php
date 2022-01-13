<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

class UserGateway extends Gateway  {

    public function __construct() {
        $this->setDatabase(DATABASE2);
    }

    /**
     * @param string $email
     */
    public function findPassword($email) {

        $sql = "SELECT id, password FROM user WHERE email = :email";
        $params = [":email" => $email];
        $result = $this->getDatabase()->executeSQL($sql, $params);
        $this->setResult($result);
    }

}