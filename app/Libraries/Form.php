<?php namespace App\Libraries;


class Form{
 public function datetime(array $params){

     return view('cmps/datetime', $params);
 }

 public function abbrevstates(array $params){

    return view('cmps/abbrevstates', $params);
}

    public function select(array $params)
    {
        return view('cmps/selectField', $params);
    }


}