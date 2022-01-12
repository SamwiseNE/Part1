<?php
//the ApiBaseController defines the data to return
//this isn't being stored in the db so can just be defined here

class ApiBaseController extends Controller {

    protected function processRequest() {
        $data['author']['name'] = "Sam Johnston";
        $data['author']['id'] = "W17004648";
        $data['message'] = "Web Application Programming Interface (API) is an access point to resources or services through a web server.";
        $data = array('Endpoints' =>
            [
                "/KF6012/coursework/part1/api",
                "/KF6012/coursework/part1/api/authors",
                "/KF6012/coursework/part1/api/authors?search=" ,
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