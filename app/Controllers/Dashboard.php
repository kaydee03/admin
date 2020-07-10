<?php namespace App\Controllers;

use App\Models\DashboardModel;
use App\Libraries\Crud;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [];
		
		$firstname = session()->get('firstname');
		$lastname = session()->get('lastname');  
		
		$data['title'] = 'Hello '.$firstname[0].$lastname;

        return view('dashboard', $data);
	}

	//--------------------------------------------------------------------

}
