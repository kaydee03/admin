<?php
namespace App\Libraries;

class Admin
{
    public function title($params)
    {
        if ($params['title'])
            return view('cmps/title', $params);
    }

    // public function selectDropdown($params)
    // {    
    //     if ($params)
    //         return view('cmps/select', $params);
    // }

}