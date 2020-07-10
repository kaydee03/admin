<?php 

function in_group($role){
    if(in_array($role, session()->roles) || in_array($role, session()->roleNames)|| isSuper())
        return true;

    return false;
}

function hasAccess($role)
{
    if (in_array($role, session()->roles) || in_array($role, session()->roleNames) || isSuper())
    return true;

    die('You are not allowed to access this page');
}

function isSuper(){
    if(in_array('Super', session()->roleNames))
        return true;
    
    return false;
}

?>