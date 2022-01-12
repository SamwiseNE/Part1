<?php

class DocumentationPage extends Webpage
{
    public function generateDocumentationPage()
    {
        $this->setBody("Sam Johnston - W17004648 <br/>");
        $this->setBody("2021 KF6012 Assessment Part 1 <br/>");
    }

    public function generateDocumentation($name, $url, $method, $parameters, $description, $authentication, $jsonStructure, $resultsStructure, $codes, $example)
    {
        $this->setBody("<h2> $name </h2 >");
        $this->setBody($url . "<br>");
        $this->setBody($method . "<br>");
        $this->setBody($parameters . "<br>");
        $this->setBody($description . "<br>");
        $this->setBody($jsonStructure . "<br>");
        $this->setBody($resultsStructure . "<br>");
        $this->setBody($codes . "<br>");
        $this->setBody($authentication . "<br>");
        $this->setBody($example . "<br>");

    }
}

