<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

class ErrorPage extends Webpage {

    public function setErrorPage() {

        $this->setBody("Error! Page Not Found.");
        http_response_code(404);
    }
}
