<?php

class HTMLResponse extends Response
{

    public function __construct() {
        $this->headers();
        parent::__construct();
    }

    protected function headers() {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: text/html; charset=UTF-8");
    }
}