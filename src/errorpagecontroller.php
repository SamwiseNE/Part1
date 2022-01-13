<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

class ErrorPageController extends Controller {

    protected function processRequest() {
        $menu = Menu::menuItems();
        $page = new ErrorPage(
            "Error",
            $menu,
            "ERROR",
            "ERROR"
        );

        $page->setErrorPage();

        return $page->generateWebpage();
    }
}
