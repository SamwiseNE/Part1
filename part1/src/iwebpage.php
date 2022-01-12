<?php

/*
 * Interface for human readable webpages
 *
 * This addresses Task 8.2. We have chosen to use a uniform constructor for
 * the webpages. This will mean the Contactpage and Homepage classes will need
 * to use this constructor and hence be rethought.
 *
 * @author Anon Anon w123456789
 */
interface IWebpage
{
    /*
     * @param string  $title      Title for page heading
     * @param array   $links      Associative array of name=>link pairs for menu
     * @param string  $activePage Name of current active page
     * @param $string $heading1   The main heading for the page
     */
    public function __construct($title, $links, $activePage, $heading1);

    /*
     * Add a paragraph of text in <p> tags
     *
     * @param string $text The text to add as a paragraph
     */
    public function addParagraph($text);

    /*
     * Return a valid HTML5 webpage
     *
     * @return string webpage
     */
    public function generateWebpage();
}