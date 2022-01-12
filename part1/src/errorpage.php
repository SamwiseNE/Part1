<?php

class ErrorPage extends Webpage {

    public function setErrorPage(){

        $this->setBody("Error! Page Not Found.");
        http_response_code(404);
    }
}
