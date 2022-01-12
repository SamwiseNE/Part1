<?php
/**
 * Created by PhpStorm
 * @Author: Sam Johnston
 * Date: 17/11/2021
 * Time: 12:30
 */

abstract class Webpage implements IWebpage
{
    private $head;
    private $foot;
    private $body;


    public function __construct($title, $links, $activePage, $heading1) {
        $this->setHead($title);
		$this->addMenu($links, $activePage);
        $this->addHeading1($heading1);
        $this->setFoot();
    }

    protected function setHead($title) {
        $this->head = webpageComponents::webpageHead($title);
		/*
        $css = BASEPATH . "assets/style.css";
        $this->head = <<<EOT
<!DOCTYPE html>
<html lang="en-gb">
<head>
    <title>$title</title>
    <meta charset="utf-8">
        <link rel="stylesheet" href=$css>
</head>
<body>
EOT;
*/
    }

    private function getHead() {
        return $this->head;
    }

    protected function setBody($text) {
        $this->body .= $text;
    }

    private function getBody() {
        return $this->body;
    }

    protected function setFoot() {
        $this->foot = webpageComponents::webpageFoot();
		
		/*
        $this->foot = <<<EOT
</body>
</html>
EOT;
*/
    }

    private function getFoot() {
        return $this->foot;
    }

    protected function addMenu($links, $activePage) {
        $menu = webpageComponents::menu($links,$activePage);
        $this->setBody($menu);
    }

    protected function addHeading1($text) {
        $this->setBody("<h1>$text</h1>");
    }

    public function addParagraph($text) {
        $this->setBody("<p>$text</p>");
    }

    public function generateWebpage() {
        return $this->head . $this->body . $this->foot;
    }

}