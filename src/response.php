<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

abstract class Response {

    protected $data;


    public function __construct() {

    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }
}
