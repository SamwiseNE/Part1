<?php

/**
 * Created by PhpStorm
 * @author Sam Johnston
 * @id W17004648
 * @date 12/01/2022
 * @time 16:00
 *
 */

include "config/config.php";

$request = new Request();


/**
 * Sets response
 * HTML or JSON
 *
 * @uses substr()
 * @uses set_exception_handler()
 */
if (substr($request->getPath(),0,3) === "api") {
        $response = new JSONResponse();
} else {
    set_exception_handler("HTMLexceptionHandler");
    $response = new HTMLResponse();
}


/**
 * Sets which controller based on url
 *
 * Default check if 'api' is entered after basepath
 */
switch ($request->getPath()) {
    case "":
    case 'home':
        $controller = new HomePageController($request, $response);
        break;
    case 'documentation':
        $controller = new DocumentationPageController($request, $response);
        break;
    case 'api':
        $controller = new ApiBaseController($request, $response);
        break;
    case 'api/papers':
        $controller = new ApiPapersController($request, $response);
        break;
    case 'api/authors':
        $controller = new ApiAuthorsController($request, $response);
        break;
    case 'api/authenticate':
        $controller = new ApiAuthenticateController($request, $response);
        break;
    case 'api/readinglist':
        $controller = new ApiReadingListController($request, $response);
        break;
    default:
        if (substr($request->getPath(),0,3) === "api") {
            $response = new JSONResponse();
        } else {
            $controller = new ErrorPageController($request, $response);
        }
        break;
}

echo $response->getData();