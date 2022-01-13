<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

class DocumentationPageController extends Controller {

    protected function processRequest() {

        $menu = Menu::menuItems();
	    $page = new Documentationpage("Documentation",
        $menu,
        "Welcome to my Documentation",
        "Documentation");

        $page->generateDocumentation("api",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api",
            "HTTP Method: GET",
        "Parameters: N/A",
        "Description: Basic End Point",
        "Authentication: NO",
        "JSON Structure: status code, status message, link, count, results",
        "Results Structure: author, id, message, documentation, endpoints",
        "HTTP Codes: 200, 404, 500",
        "Example: .../part1/api");


        $page->generateDocumentation("api/authors",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/authors",
            "HTTP Method: GET",
            "Parameters: N/A",
            "Description: Displays all Authors",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: author_id, first_name, middle_name, last_name",
            "HTTP Codes: 200, 404, 405, 500",
            "Example: .../part1/api/authors");


        $page->generateDocumentation("api/authors?id=",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/authors",
            "HTTP Method: GET",
            "Parameters: author_id as $.id",
            "Description: Displays information on Author based on specific author id",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: author_id, first_name, middle_name, last_name",
            "HTTP Codes: 200, 404, 405, 500",
            "Example: .../part1/api/authors?id=59482");


        $page->generateDocumentation("api/authors?first_name=",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/authors?first_name=",
            "HTTP Method: GET",
            "Parameters: firstname as $.first_name",
            "Description: Displays authors information based on firstname search. Search uses LIKE function and % wildcards",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: author_id, first_name, middle_name, last_name",
            "HTTP Codes: 200, 404, 405, 500",
            "Example: .../part1/api/authors?firstname=Michael");


        $page->generateDocumentation("api/authors?middle_name=",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/authors?middle_name=",
            "HTTP Method: GET",
            "Parameters: middlename as $.middle_name",
            "Description: Displays authors information based on middlename search. Search uses LIKE function and % wildcards",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: author_id, first_name, middle_name, last_name",
            "HTTP Codes: 200, 404, 405, 500",
            "Example: .../part1/api/authors?middlename=G");



        $page->generateDocumentation("api/authors?search=",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/authors?search=",
            "HTTP Method: GET",
            "Parameters: last_name as $.search",
            "Description: Displays authors and papers based on lastname search. Search uses LIKE function and % wildcards",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: author_id, first_name, middle_name, last_name, paper, p.title, abstract, doi, video, preview",
            "HTTP Codes: 200, 404, 405, 500",
            "Example: .../part1/api/authors?search=lee");


        $page->generateDocumentation("api/authors?content",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/authors?content",
            "HTTP Method: GET",
            "Parameters: author_id as $.content",
            "Description: Displays author and paper information linked to papers table",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: title, abstract, first_name, last_name",
            "HTTP Codes: 200, 404, 405, 500",
            "Example: .../part1/api/authors?content");


        $page->generateDocumentation("api/papers",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/papers",
            "HTTP Method: GET",
            "Parameters: N/A",
            "Description: Displays all Papers",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: title, paper_id, abstract",
            "HTTP Codes: 200, 404, 405, 500",
            "Example: .../part1/api/papers");


        $page->generateDocumentation("api/papers?title=",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/papers?title=",
            "HTTP Method: GET",
            "Parameters: $.title",
            "Description: Displays papers based on  title search. Search uses LIKE function and % wildcards",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: title, paper_id, abstract",
            "HTTP Codes: 200, 404, 405, 500",
            "Example: .../part1/api/papers?title=");


        $page->generateDocumentation("api/papers?id=",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/papers?id=",
            "HTTP Method: GET",
            "Parameters: $.paper_id as 'id'",
            "Description: Displays paper information based on a specific paper id",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: title, paper_id, abstract",
            "HTTP Codes: 200, 404, 405, 500",
            "Example: .../part1/api/papers?id=60078");


        $page->generateDocumentation("api/papers?authorid=",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/papers?authorid=",
            "HTTP Method: GET",
            "Parameters: $.author_id",
            "Description: Displays paper and author information based on a specific author id",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: title, paper_id, abstract, first_name, last_name, author_id",
            "HTTP Codes: 200, 404, 405, 500",
            "Example: .../part1/api/papers?authorid=59469");


        $page->generateDocumentation("api/papers?award",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/papers?award",
            "HTTP Method: GET",
            "Parameters: N/A",
            "Description: Displays papers that have won an award",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: paper_id, title, name",
            "HTTP Codes: 200, 404, 405, 500",
            "Example: .../part1/api/papers?award=all");


        $page->generateDocumentation("api/papers?search=",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/papers?search=",
            "HTTP Method: GET",
            "Parameters: last_name as $.search",
            "Description: Displays paper and author information based on last name search. Search uses LIKE function and % wildcards",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: title, paper_id, abstract, first_name, last_name, author_id",
            "HTTP Codes: 200, 404, 405, 500",
            "Example: .../part1/api/papers?search=Lee");


        $page->generateDocumentation("api/papers?content",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/papers?content",
            "HTTP Method: GET",
            "Parameters: paper_id as $.content",
            "Description: Displays authors information linked to papers table",
            "Authentication: NO",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: author_id, first_name, last_name",
            "HTTP Codes: 200, 404, 405, 500",
            "Example: .../part1/api/papers?content");


        $page->generateDocumentation("api/readinglist",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/readinglist",
            "HTTP Method: POST",
            "Parameters: $.user_id, $.add, $.remove",
            "Description: ...",
            "Authentication: YES",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: paper_id ",
            "HTTP Codes: 200, 401, 404, 405, 500",
            "Example: N/A");


        $page->generateDocumentation("api/authenticate",
            "URL: http://unn-w17004648.newnumyspace.co.uk/kf6012/coursework/part1/api/authenticate",
            "HTTP Method: POST",
            "Parameters: $.email, $.password",
            "Description: ...",
            "Authentication: YES",
            "JSON Structure: status code, status message, link, count, results",
            "Results Structure: ",
            "HTTP Codes: 200, 401, 404, 405, 500",
            "Example: N/A");

        $page->generateDocumentationPage();

        /**
         * @return string html
         */

        return $page->generateWebpage();
    }
}