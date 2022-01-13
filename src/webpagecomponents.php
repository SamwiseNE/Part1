<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

class WebpageComponents {

    /**
     * Sets head of the webpage using HTML code
     * title is passed in through the parameter
     * css path defined
     *
     * @param string $title
     *
     * @uses EOT
     *
     * @return string html
     */
    public static function webpageHead($title) {
        $css = BASEPATH . CSSPATH;
        return <<<EOT
        <!DOCTYPE html>
        <html lang="en-gb">
        <head>
            <title>$title</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="$css">
        </head>
        <body>
EOT;
    }

    /**
     * Footer of the page is set in HTML
     *
     * @uses EOT
     *
     * @return string html
     */
    public static function webpageFoot() {
        return <<<EOT
        </body>
        </html>
EOT;
    }

    /**
     * Menu items are set
     *
     * @param array $links
     * @param string $activePage
     * @return string
     *
     */
    public static function menu($links, $activePage) {
        $menu = "<nav><ul>";

        foreach($links as $name=>$link) {
            $active = ($name === $activePage) ? "active" : "";
            $menu .= "<li><a href='$link' class='$active'>$name</a></li>";
        }

        $menu .= "</ul></nav>";

        return $menu;
    }
}