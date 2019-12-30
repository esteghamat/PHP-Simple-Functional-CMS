<?php

function get_UserData_From_LoginForm()
{
    user_logout();
    redirect_to(home_url('login'));
}


