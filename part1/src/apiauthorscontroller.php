<?php

class ApiAuthorsController extends Controller {

    public function __construct($request, $response) {
        $this->setGateway();
        parent::__construct($request, $response);
    }

    protected function setGateway() {
        $this->gateway = new AuthorsGateway();
    }

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

