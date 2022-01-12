<?php

class ErrorPageController extends Controller {
    protected function processRequest()
    {
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
