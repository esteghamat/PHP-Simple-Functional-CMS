<?php 

function render_page()
{
    include_once full_path("templates/header.php");

    /* Get from $_POST the user data from Login form*/
    if(function_exists('get_UserData_From_LoginForm')) {
        get_UserData_From_LoginForm();
    }

    show_messages();
    if(function_exists('get_content'))
    {
        get_content();
    }
    include_once full_path("templates/footer.php");
}

function load_modules()
{
    check_for_previous_login();

    $module_name = get_module_name();
    
    if(empty($module_name))
    {
        $module_name = 'home';
    }
    
    if(is_user_logged_in() and $module_name=='login')
    {
        $module_name = 'home';
    }

    $module_file = full_path('templates/modules/' . $module_name . '.php') ;
    if(file_exists($module_file))
    {
        require_once($module_file);
        if(is_authentication_required())
        {
            if(!is_user_logged_in())
            {
                $login_url = home_url('login');
                redirect_to($login_url);
            }
        }
    }
    else
    {
        add_messages('The URL is not correct.' , 'error');
        require_once(full_path('templates/modules/' . 'home' . '.php' ));
    }
}

function is_authentication_required()
{
    if(function_exists('authentication_required'))
    {
        return authentication_required();
    }
    else
    {
        return false;
    }
}

$messages = array();
function add_messages($message = null , $type = 'error')
{
    if(!$message)
    {
        return;
    }
    global $messages;
    $messages[] = array(
        'message' => $message,
        'type' => $type
    );
}

function show_messages()
{
    global $messages;
    if(empty($messages))
    {
        return;
    }
    foreach($messages as $item)
    {
        $message = $item['message'];
        $type = $item['type'];
        if($type == 'error') {
            $type = 'danger';
        }
        ?>
        <div class="alert alert-<?php echo $type; ?> alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $message; ?>
        </div>
        <?php        
    }
}


