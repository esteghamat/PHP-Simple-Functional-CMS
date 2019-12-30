<?php

session_start();
// Automatic Get URL and Base Path 
//echo "<br>This is my config file. <br>";
define('BASE_PATH', str_replace('\\', '/', dirname(__FILE__)) . '/');
//echo ".";

$tempPath1 = explode('/', str_replace('\\', '/', dirname($_SERVER['SCRIPT_FILENAME'])));
$tempPath2 = explode('/', substr(BASE_PATH, 0, -1));
$tempPath3 = explode('/', str_replace('\\', '/', dirname($_SERVER['PHP_SELF'])));

for ($i = count($tempPath2); $i < count($tempPath1); $i++)
    array_pop ($tempPath3);

$urladdr = $_SERVER['HTTP_HOST'] . implode('/', $tempPath3);

if ($urladdr{strlen($urladdr) - 1}== '/')
    define('BASE_URL', 'http://' . $urladdr);
else
    define('BASE_URL', 'http://' . $urladdr . '/');

unset($tempPath1, $tempPath2, $tempPath3, $urladdr);

//output Sample : 
/*
E:/0-Job in Turky/0-Online Marketing/00-Vahid/newxampp/htdocs/php3.exp/CMS/
http://localhost:8080/CMS/
*/
// End Automatic Get URL and Base Path 

define('DB_FILENAME' , "myapp.data");
define('SESSION_EXPIRATION_TIME' , 24*3600);
define('APP_TITLE' , 'Functional CMS');

define('BOOTSTRAP_PATH' , BASE_URL . "includes/bootstrap/");
define('CSS_PATH' ,  BASE_URL . "includes/bootstrap/css/");
define('JS_PATH' ,  BASE_URL . "includes/bootstrap/js/");

foreach(glob(BASE_PATH . "lib/*.php") as $lib_page)
{
    include ($lib_page);
}

create_tables();
initialize_users();


