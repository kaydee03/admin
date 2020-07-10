<?php namespace App\Controllers;

use App\Models\RoleModel;
// use App\Models\CompInfoModel;


class Roles extends BaseController
{

	public function index(){
    
		$model = new RoleModel();
	
		$data['items'] = $model->orderBy('r_id', 'ASC')->findAll();
		return view('roles/roles', $data);
	}

	public function create()
	{
		if($this->request->getPost()){
			helper(['form', 'url']);
			$model = new RoleModel();
			$data = [
				'r_name' => $this->request->getVar('r_name'),
			];
			$role_id = $model->insert($data);
			return redirect()->to(base_url('/roles'));
		}
		return view('roles/create');
	}


	public function edit($id = null)
	{
		$model = new RoleModel();

		if ($this->request->getPost()) {
			helper(['form', 'url']);
			$data = [
				'r_id' => $this->request->getVar('id'),
				'r_name' => $this->request->getVar('r_name'),
			];
			$model->save($data);
			return redirect()->to(base_url('/roles/edit/' . $id));
		}
		$data['item'] = $model->where('r_id', $id)->first();

		return view('roles/edit', $data);
	}

	public function delete($id = null)
	{
		$model = new RoleModel();
		$data['users'] = $model->where('r_id', $id)->delete();
		return redirect()->to('/roles');
	}




	public function index2()
	{
		$data = [];
		$data['bodyClass'] = 'login';
		helper(['form']);


		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
//				'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'username' => 'required|min_length[3]|max_length[20]',
				'password' => 'required|min_length[4]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' => ['validateUser' => 'Email or Password don\'t match']
			];

			if (!$this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();
        	    $user = $model->where('u_username', $this->request->getVar('username'))
        	                      ->first();

				$this->setUserSession($user);


//UPDATE USERS LAST LOGIN DATE/TIME
//----------------------------------------------------------------------------------
//				$last_login = date("Y-m-d H:i:s");
				
//				$newData = [
//					'id' =>  $user['id'],
//					'u_last_login' => $last_login,
//				];

				
//				$user['u_last_login'] = $last_login;
//				unset($user['u_password']);
//				$model->save($user);
				//$model->where('id',  session()->get('id'))->set($newData);
//----------------------------------------------------------------------------------


				return redirect()->to('/dashboard');

			}
		}

		return view('login');
	}



	private function setUserSession($user){
		//Add the groups and access level to the session

		
		$data = [
			'id' => $user['id'],
            'username' => $user['u_username'],
			'firstname' => $user['u_firstname'],
			'lastname' => $user['u_lastname'],
			'email' => $user['u_email'],
			'isLoggedIn' => true,
//			'permissions' = [
//				'dispatchers' =
//			]
		];

		session()->set($data);
		return true;
	}



	public function register(){
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
//                'username' => 'required|min_length[3]|max_length[20]',
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.u_email]',
//                  'password' => 'required|min_length[8]|max_length[256]'
				'password' => 'required|min_length[4]|max_length[256]',
                'confirmpassword' => 'matches[password]',
			];



			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{

				$model = new UserModel();
				$username = $this->createUsername($this->request->getVar('firstname'), $this->request->getVar('lastname'));

				$newData = [
					'u_username' => $username,
                    'u_firstname' => $this->request->getVar('firstname'),
                    'u_lastname' => $this->request->getVar('lastname'),
                    'u_email' => $this->request->getVar('email'),
                    'u_password' => $this->request->getVar('password'),
				];


				$model->save($newData);

				$session = session();
				$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/register');

			}
		}

		return view('register');
	}



    



	public function storeuser()
	{
		helper(['form', 'url']);

		$model = new UserModel();
	//    $username = $this->createUsername($this->request->getVar('firstname'), $this->request->getVar('lastname'));


		$data = [
//            'u_username' => $username,
			'u_first_name' => $this->request->getVar('firstname'),
			'u_first_name' => $this->request->getVar('lastname'),
			'u_email' => $this->request->getVar('email'),
			'u_password' => $this->request->getVar('password'),
			'u_role' => $this->request->getVar('role'),
			'u_company' => $this->request->getVar('company'),
			'u_status' => $this->request->getVar('status'),
		];


print_r($data);
echo "TEST";
exit ();


		$save = $model->insert($data);

		return redirect()->to( base_url('/userslist') );
	}



    



    public function updateuser()
    {  
 
        helper(['form', 'url']);
         
        $model = new UserModel();
 
        $id = $this->request->getVar('id');
	
		$data = [

			//'id' => $this->request->getVar('id'),
			'u_firstname' => $this->request->getVar('firstname'),
			'u_lastname' => $this->request->getVar('lastname'),
			'u_email' => $this->request->getVar('email'),
			//'u_password' => $this->request->getVar('password'),
			'u_role' => $this->request->getVar('role'),
			'u_company' => $this->request->getVar('company'),
			'u_status' => $this->request->getVar('status'),
		];
	
		 $user = new \App\Entities\User();
		 $user->fill($data);

		
        $model->update($id, $user);
	
        return redirect()->to('/users/edituser/' . $id);
    }



   


	public function admin(){
		$data = [];
		helper(['form']);
		$model = new UserModel();


		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
                'username' => 'required|min_length[3]|max_length[20]',
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
			];

			if($this->request->getPost('password') != ''){
				$rules['password'] = 'required|min_length[4]|max_length[255]';
				$rules['confirmpassword'] = 'matches[password]';
			}


			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{

				$newData = [
					'id' => session()->get('id'),
                    'u_username' => $this->request->getPost('username'),
					'u_fname' => $this->request->getPost('firstname'),
					'u_lname' => $this->request->getPost('lastname'),
					'u_email' => $this->request->getPost('email'),
				];


			    if($this->request->getPost('password') != ''){
				    $newData['u_password'] = $this->request->getPost('password');
				}


				$model->save($newData);

				session()->setFlashdata('success', 'Successfuly Updated');
				return redirect()->to('/dev/public/userslist');

			}
		}

		$data['user'] = $model->where('id', session()->get('id'))->first();

		return view('admin');
	}



	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}



	protected function createUsername($firstname, $lastname){
		$un = substr($firstname, 0, 1).''.$lastname;
		$un = strtolower($un);
		$unTemp = $un;

		$model = new UserModel();
		$usernameExists = true;
		
		$i = 0;
		while($usernameExists){
			$user = $model->where('u_username', $unTemp)->first();
			$i++;
			if($user){
				$unTemp = $un.''.$i;
			}else{
				break;
			}
		}

		return $unTemp;
	}

	

	public function test()
	{
		$data = [];
		$data['bodyClass'] = 'login';
		helper(['form']);


		return view('test');
	}

	
	//--------------------------------------------------------------------

}