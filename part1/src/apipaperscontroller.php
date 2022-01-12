<?php


class ApiPapersController extends Controller {

    public function __construct($request, $response) {
        $this->setGateway();
        parent::__construct($request, $response);
    }

    protected function setGateway() {
        $this->gateway = new PapersGateway();
    }

    protected function processRequest() {

        $title = $this->getRequest()->getParameter("title");
        $paper_id = $this->getRequest()->getParameter("id");
        $author_id = $this->getRequest()->getParameter("authorid");
        $award = $this->getRequest()->getParameter("award");
        $author = $this->getRequest()->getParameter("author");
        $content = $this->getRequest()->getParameter("content");


        if ($this->getRequest()->getRequestMethod() === "GET") {

            if (isset($title)) {
                $this->getGateway()->findPaperTitle($title);

            } elseif (isset($paper_id)) {
                $this->getGateway()->findOnePaper($paper_id);

            } elseif (isset($author_id)) {
                $this->getGateway()->findAuthorID($author_id);

            } elseif (isset($award)) {
                $this->getGateway()->findAwards();

            } elseif (isset($author)) {
                $this->getGateway()->findAuthor($author);

            } elseif (isset($content)) {
                $this->getGateway()->findContent($content);

            } else {
                $this->getGateway()->findAll();

            }
        } else {
            $this->getResponse()->setJsonMessage("Method not allowed");
            $this->getResponse()->setStatusCode(405);
        }
        return $this->getGateway()->getResult();
    }
}
