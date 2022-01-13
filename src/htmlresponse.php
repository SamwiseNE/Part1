<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @date 12/01/2022
 * @time 16:00
 *
 */

class HTMLResponse extends Response {

    public function __construct() {
        $this->headers();
        parent::__construct();
    }

    //Set content to html
    protected function headers() {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: text/html; charset=UTF-8");
    }
}