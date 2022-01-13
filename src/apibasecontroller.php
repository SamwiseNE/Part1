<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

class ApiBaseController extends Controller {

    /**
     * API information
     *
     * @return array $data
     */
    protected function processRequest() {
        $data = array(
            'Author'=> "Sam Johnston",
            'ID' => "W17004648",
            'message' => "Web Application Programming Interface (API) is an access point to resources or services through a web server.",
            'Endpoints' => [
                "/KF6012/coursework/part1/api",
                "/KF6012/coursework/part1/api/authors",
                "/KF6012/coursework/part1/api/authors?id=",
                "/KF6012/coursework/part1/api/authors?first_name=",
                "/KF6012/coursework/part1/api/authors?middle_name=",
                "/KF6012/coursework/part1/api/authors?last_name=",
                "/KF6012/coursework/part1/api/authors?search=",
                "/KF6012/coursework/part1/api/authors?content=",
                "/KF6012/coursework/part1/api/papers",
                "/KF6012/coursework/part1/api/papers?title=",
                "/KF6012/coursework/part1/api/papers?id=",
                "/KF6012/coursework/part1/api/papers?authorid=",
                "/KF6012/coursework/part1/api/papers?award",
                "/KF6012/coursework/part1/api/papers?search=",
                "/KF6012/coursework/part1/api/papers?content=",
                "/KF6012/coursework/part1/api/readinglist/",
                "/KF6012/coursework/part1/api/authenticate/"
            ]);

        return $data;

    }
}