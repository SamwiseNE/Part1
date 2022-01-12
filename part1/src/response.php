<?php

abstract class Response
{
    protected $data;


    public function __construct()
    {

    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}
