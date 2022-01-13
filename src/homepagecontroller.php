<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @date 12/01/2022
 * @time 16:00
 *
 */

class HomePageController extends Controller {

    protected function processRequest() {

        $menu = Menu::menuItems();
	    $page = new HomePage("Homepage",
        $menu,
        "Homepage",
        "Homepage");
						
        $page->generateHomepage();

        return $page->generateWebpage();
    }
}