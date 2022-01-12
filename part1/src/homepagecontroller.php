<?php

class HomePageController extends Controller
{
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