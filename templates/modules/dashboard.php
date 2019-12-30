<?php 

function authentication_required()
{
    return true;
}

function get_title()
{
    return "Doshboard title";
}

function get_content()
{
    echo "This is Doshboard Content";
    echo "<br><br>";
    echo "For Just just just for logined user.";
}