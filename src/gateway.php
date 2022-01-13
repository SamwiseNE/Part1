<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @date 12/01/2022
 * @time 16:00
 *
 */

abstract class Gateway {

    private $database;
    private $result;


    protected function setDatabase($database) {
        $this->database = new Database($database);
    }

    protected function getDatabase() {
        return $this->database;
    }

    protected function setResult($result) {
        $this->result = $result;
    }

    public function getResult() {
        return $this->result;
    }
}