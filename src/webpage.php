<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

abstract class Webpage implements IWebpage {

    private $head;
    private $foot;
    private $body;

    /**
     * Set key information
     *
     * @param string $title
     * @param array $links
     * @param string $activePage
     * @param string $heading1
     */
    public function __construct($title, $links, $activePage, $heading1) {
        $this->setHead($title);
		$this->addMenu($links, $activePage);
        $this->addHeading1($heading1);
        $this->setFoot();
    }

    /**
     * Sets webpage title using webpageComponents
     *
     * @param string $title
     */
    protected function setHead($title) {
        $this->head = webpageComponents::webpageHead($title);
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

    //Sets webpage footer using webpageComponents
    protected function setFoot() {
        $this->foot = webpageComponents::webpageFoot();
    }

    private function getFoot() {
        return $this->foot;
    }

    /**
     * Sets menu items
     *
     * @param array $links
     * @param string $activePage
     */
    protected function addMenu($links, $activePage) {
        $menu = webpageComponents::menu($links,$activePage);
        $this->setBody($menu);
    }

    /**
     * Sets header using <h1> tag
     *
     * @param string $text
     */
    protected function addHeading1($text) {
        $this->setBody("<h1>$text</h1>");
    }

    /**
     * Sets body using <p> tag
     *
     * @param string $text
     */
    public function addParagraph($text) {
        $this->setBody("<p>$text</p>");
    }

    /**
     * Generates HTML webpage
     *
     * @return string webpage
     */
    public function generateWebpage() {
        return $this->head . $this->body . $this->foot;
    }

}