<?php

function get_title()
{
    return "Login Title";
}

function get_content()
{ ?>
  <div class="row" style="padding-top: 20px">
    <div class="col-3"></div>
    <div class="col-6">

        <div class="card bg-light mb-3" >
            <div class="card-header">
                <h4>Login to system</h4>
            </div>
            <div class="card-body" >
                <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">username</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="username" name="username" placeholder="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name = "submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    <div class="col-3"></div>
  </div>

<?php
}
?>

<?php
function get_UserData_From_LoginForm()
{
    if(empty($_POST))
    {
        return;
    }

    $username ='';
    $password = '';
    $username = $_POST['username'];
    $password = $_POST['password'];

    user_login($username , $password);

    if(!is_user_logged_in()) {
        add_message('نام کاربری یا رمز عبور، اشتباه است.', 'error');
    } else {
        redirect_to(home_url());
    }
    
    return;
}


?>