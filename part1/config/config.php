<?php


$ini['MAIN'] = parse_ini_file("config.ini", true);

define('BASEPATH', $ini ['MAIN']['PATHS']['BASEPATH']);
define('CSSPATH', $ini['MAIN']['PATHS']['CSS']);
define('DATABASE1', $ini['MAIN']['DATABASE']['DB1']);
define('DATABASE2', $ini['MAIN']['DATABASE']['DB2']);
define('SECRET_KEY', $ini['MAIN']['JWT']['KEY']);

define('DEVELOPMENT_MODE', true);
ini_set('display_errors', DEVELOPMENT_MODE);
ini_set('display_startup_errors', DEVELOPMENT_MODE);


function autoloader($className) {
    $filename = "src\\" . strtolower($className) . ".php";
    $filename = str_replace('\\', DIRECTORY_SEPARATOR, $filename);
    if (is_readable($filename)) {
        include_once $filename;
    } else {
        throw new exception("File not found: " . $className . " (" . $filename . ")");
    }
}
spl_autoload_register("autoloader");


function JSONexceptionHandler($e) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET, POST");

    http_response_code(500);
    $output['error'] = "Internal server error! (Status 500)";

    if (DEVELOPMENT_MODE) {
        $output['Message'] = $e->getMessage();
        $output['File'] = $e->getFile();
        $output['Line'] = $e->getLine();
    }

    echo json_encode($output);
    logErrorJSON($output);
}
set_exception_handler("JSONexceptionHandler");


function logErrorJSON($output){
    $file = 'db/logJSON.txt';
    file_put_contents($file, $output);
    json_decode(file_get_contents($file), TRUE);
}


function errorHandler($errno, $errstr, $errfile, $errline) {
    if (($errno != 2 && $errno != 8) || DEVELOPMENT_MODE) {
        throw new Exception("Error Detected: [$errno] $errstr file: $errfile line: $errline", 1);
    }

    logError($errno, $errstr, $errline);
}
set_error_handler("errorHandler");


function logError($errno, $errstr, $errline){
    $file = 'db/log.txt';
    file_put_contents($file, $errno, $errstr, $errline);
    file_get_contents($file);
}


function HTMLexceptionHandler($e) {
    header("Access-Control-Allow-Origin: *");
    http_response_code(500);
    echo "<p>Internal server error!</p>";
    if (DEVELOPMENT_MODE) {
        echo "<p>";
        echo "Message: ".  $e->getMessage();
        echo "<br>File: ". $e->getFile();
        echo "<br>Line: ". $e->getLine();
        echo "</p>";
    }
}
