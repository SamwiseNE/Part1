<?php

class DocumentationPageController extends Controller
{
    protected function processRequest() {
        $menu = Menu::menuItems();
	$page = new Documentationpage("Documentation",
        $menu,
        "Welcome to my Documentation",
        "Documentation");
						
        $page->generateDocumentationPage();

        $page->generateDocumentation("API",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api",
            "HTTP Method: GET",
        "Parameters: N/A",
        "Description: Basic End Point",
        "Authentication: NO",
        "JSON Structure: status code, status message, link, count, results",
        "Results Structure: name, id, message, documentation",
        "HTTP Codes: 200, 404, 500",
        "Example: N/A");

        $page->generateDocumentation("API/Authors",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/authors",
            "HTTP Method: GET",
            "Parameters: id, firstname, middlename, lastname",
            "Description: Displays information on Authors",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: author_id, first_name, middle_name, last_name",
            "HTTP Codes: 200, 404, 500",
            "Example: .../part1/api/authors?id=65465");

        $page->generateDocumentation("API/Papers",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/papers",
            "HTTP Method: GET",
            "Parameters: title, id, authorid, award",
            "Description: Displays information on Papers",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: paper_id, title, abstract, doi, video, preview, author_id, first_name, middle_name, last_name",
            "HTTP Codes: 200, 404, 500",
            "Example: .../part1/api/papers?award=all");

        $page->generateDocumentation("API/Authenticate",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/authenticate",
            "HTTP Method: POST",
            "Parameters: email, password",
            "Description: ...",
            "Authentication: YES",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: ",
            "HTTP Codes: 200, 401, 404, 405, 500",
            "Example: ...");

        $page->generateDocumentation("API/Reading List",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/readinglist",
            "HTTP Method: POST",
            "Parameters: user_id, add, remove",
            "Description: ...",
            "Authentication: YES",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: ",
            "HTTP Codes: 200, 401, 404, 405, 500",
            "Example: ...");


        return $page->generateWebpage();
    }
}