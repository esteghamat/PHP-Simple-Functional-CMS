<?php

function home_url($path = '')
{
    if($path==='')
    {
        return BASE_URL;
    }
    return BASE_URL . $path;
}

function full_path($file_path)
{
    return BASE_PATH . $file_path;
}

function get_module_name() {
    $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $req = str_replace(BASE_URL, '', $url);

    $question_mark_pos = strpos($req, '?');
    if($question_mark_pos !== false) 
    {
        $req = substr($req, 0, $question_mark_pos);
    }

    if ($req === '')
    {
        $req = 'home';
    }
    return $req;

}

function is_valid_url($url) 
{
    if(empty($url)) {
        return false;
    }
    
    return (filter_var($url, FILTER_VALIDATE_URL) !== false);
}

function redirect_to($url) 
{
    if(!is_valid_url($url)) {
        return;
    }
    header("Location: $url");
    die();
}


