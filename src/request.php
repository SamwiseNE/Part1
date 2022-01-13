<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

class Request {

    private $path;
    private $basepath = BASEPATH;
    private $requestMethod;


    /**
     * Configures url/path and request method
     *
     * @uses parse_url()
     * @uses strtolower()
     * @uses str_replace()
     * @uses trim()
     */
    public function __construct() {
        $this->path = parse_url($_SERVER["REQUEST_URI"])['path'];
        $this->path = strtolower(str_replace($this->basepath, "", $this->path));
        $this->path = trim($this->path,"/");
        $this->requestMethod = $_SERVER["REQUEST_METHOD"];
    }

    public function getPath() {
        return $this->path;
    }

    public function getRequestMethod() {
        return $this->requestMethod;
    }

    /**
     * Sets request method
     *
     * @param $param
     *
     * @uses filter_input()
     *
     * @return mixed requestmethod
     */
    public function getParameter($param) {
        if ($this->getRequestMethod() === "GET") {
            $param = filter_input(INPUT_GET, $param, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if ($this->getRequestMethod() === "POST") {
            $param = filter_input(INPUT_POST, $param, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $param;
    }
}