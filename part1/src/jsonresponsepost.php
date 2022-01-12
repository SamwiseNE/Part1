<?php

class JSONResponsePOST extends Response
{
    private $message;
    private $statusCode;
    private $link;


    public function __construct() {
        $this->headers();
        parent::__construct();
    }

    protected function headers()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
    }

    public function setLink($link) {
        $this->link = $link;
    }


    public function getData() {

        if (is_null($this->message)) {
            if (count($this->data) === 0) {
                $this->statusCode= 204;
                $this->message = "No Content";
                $this->link = "http://unn-w17004648.newnumyspace.co.uk". BASEPATH . "documentation";
            } else {
                $this->statusCode = 200;
                $this->message = "Ok";
                $this->link = "http://unn-w17004648.newnumyspace.co.uk". BASEPATH . "documentation";
            }
        }

        http_response_code($this->statusCode);

        $response['status code'] = $this->statusCode;
        $response['status message'] = $this->message;
        $response['link'] = $this->link;
        $response['count'] = count($this->data);
        $response['results'] = $this->data;


        return json_encode($response);
    }
}
