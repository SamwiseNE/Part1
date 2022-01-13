<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

class ApiAuthorsController extends Controller {

    public function __construct($request, $response) {
        $this->setGateway();
        parent::__construct($request, $response);
    }

    protected function setGateway() {
        $this->gateway = new AuthorsGateway();
    }

    /**
     * Process the request of the user through the url
     *
     * IF any of the following @params are true in the getRequest
     * THEN call function and pass variable if present
     *
     * Only GET request method
     *
     * IF POST request method
     * THEN display message and set code
     *
     */
    protected function processRequest()
    {
        $id = $this->getRequest()->getParameter("id");
        $first_name = $this->getRequest()->getParameter("firstname");
        $middle_name = $this->getRequest()->getParameter("middlename");
        $last_name = $this->getRequest()->getParameter("lastname");
        $search = $this->getRequest()->getParameter("search");
        $content = $this->getRequest()->getParameter("content");


        if ($this->getRequest()->getRequestMethod() === "GET") {

            if (isset($id)) {
				$this->getGateway()->findOneAuthor($id);

            } elseif (isset($first_name)) {
                $this->getGateway()->findFirstName($first_name);

            } elseif (isset($middle_name)) {
                $this->getGateway()->findMiddleName($middle_name);

            } elseif (isset($last_name)) {
                $this->getGateway()->findLastName($last_name);

            } elseif (isset($search)) {
                $this->getGateway()->searchAuthor($search);

            } elseif (isset($content)) {
                $this->getGateway()->findContent($content);

            } else {
                $this->getGateway()->findAll();

            }
        } else {
            $this->getResponse()->setMessage("Method not allowed");
            $this->getResponse()->setStatusCode(405);
        }
        return $this->getGateway()->getResult();
    }
}

