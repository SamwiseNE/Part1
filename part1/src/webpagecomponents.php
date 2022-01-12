<?php

class WebpageComponents
{
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

    public static function webpageFoot() {
        return <<<EOT
        </body>
        </html>
EOT;
    }

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