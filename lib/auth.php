<?php 

$current_user = null;
$current_user_id = null;

function get_current_user_data()
{
    global $current_user;
    return $current_user;
}

function get_current_user_id()
{
    global $current_user_id;
    return $current_user_id;
}

function is_user_logged_in()
{
    global $current_user;
    if(($current_user!=='') and ($current_user!==null))
    {
        return true;
    }
    return false;
}

function clear_user_session()
{
    unset($_SESSION["last_access"]);
    unset($_SESSION["user_id"]);
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);
}

function set_user_session($userid, $username,$password)
{
    $_SESSION["last_access"]=time();
    $_SESSION["user_id"]=$userid;
    $_SESSION["username"]=$username;
    $_SESSION["password"]=$password;
}

function check_for_previous_login()
{
    $last_access = 0;
    if(isset($_SESSION['last_access']))
    {
        $last_access = $_SESSION['last_access'];
    }
    $expired = ((time() - $last_access) > SESSION_EXPIRATION_TIME);
    if($expired)
    {
        clear_user_session();
        return;
    }

    $username = $_SESSION["username"];
    $user = get_user($username);
    if(!$user)
    {
        clear_user_session();
        return;
    }

    if(!$user['id'] === $_SESSION["user_id"])
    {
        clear_user_session();
        return;        
    }

    if(!$user['password'] === $_SESSION["password"])
    {
        clear_user_session();
        return;        
    }

    global $current_user;
    $current_user = $_SESSION["username"];
    global $current_user_id;
    $current_use_id = $_SESSION["user_id"];

    return;
}

function user_logout()
{
    clear_user_session();
    global $current_user;
    $current_user = null;
    global $current_user_id;
    $current_use_id = null;    
}

function user_login($username , $password)
{
    if((!$username) or (!$password))
    {
        add_messages("Username and Password can not be empty.","error");
        return;
    }

    $user = get_user($username);
    if(!$user) 
    {
        add_messages("This username is not registered.","error");
        return;
    }

    if(!($user['password']===sha1($password)))
    {
        add_messages("password is not true","error");
        return;
    }

    set_user_session($user['id'],$user['username'],$user['password']);

    global $current_user;
    $current_user = $user['username'];
    global $current_user_id;
    $current_use_id = $user['id'];        

}
