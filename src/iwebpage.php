<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

interface IWebpage {

    /**
     * Set key information
     *
     * @param string $title
     * @param array  $links
     * @param string $activePage
     * @param string $heading1
     */
    public function __construct($title, $links, $activePage, $heading1);

    /**
     * Add text to page using <p>
     *
     * @param string $text
     */
    public function addParagraph($text);

    /**
     * Return HTML page
     *
     * @return string webpage
     */
    public function generateWebpage();

}