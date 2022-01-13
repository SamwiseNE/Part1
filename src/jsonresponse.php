<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

class JSONResponse extends Response
{
    private $message;
    private $statusCode;
    private $link;


    public function __construct() {
        $this->headers();
        parent::__construct();
    }

    //Set JSON headers
    //GET and POST
    protected function headers()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST");
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


    /**
     * Set JSON response
     *
     * Data is sent to message
     * IF count of data is identical to 0
     * THEN set HTTP code, message and link
     * encode data
     *
     * @uses is_null()
     * @uses count()
     * @uses http_response_code()
     *
     * @return false|string $response
     */
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
