<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CompInfoModel;
use App\Models\RoleModel;
use App\Models\UserRolesModel;
use App\Libraries\Crud;


class Users extends BaseController
{
	protected $crud, $table;
	
	function __construct(){

		$this->table = 'users';

        $params = [
            'table' => $this->table,
			'dev' => false,
			'fields' => $this->field_options(),
			'form_title_add' => 'Add User',
			'form_title_update' => 'Edit User',
			'form_submit' => 'Add',
			'table_title' => 'Users',
			'form_submit_update' => 'Update',
			'base' => '',
			'main_segment' => $this->table,
			'edit_segment' => 'edit',
			'redirects' => false,
			'edit_card_header' => false,
            ];

        $this->crud = new Crud($params, service('request'));
			// echo '<pre>';
			//  print_r(session('roles'));
			// echo '</pre>';
			// 'roles' => $user->getRoles(),
			// 'roleNames' => $user->getRoleNames(),
	}
	
	public function index()
    {
		//hasAccess('Super');
		
        $page = 1;
        if(isset($_GET['page'])){
            $page = (int) $_GET['page'];
            $page = max(1, $page);
        }

        $data['title'] = $this->crud->getTableTitle();

        $per_page = 10;
        $columns = [
			'u_id',
			'u_username',
			'u_firstname',       
			'u_lastname',     
			'u_email',     
			// 'u_password',  	  
			'u_company',     
			'u_create_datetime',      
			'roles', 
			// 'u_active',       
			'u_status',       
        ];
        $where = null;
        $order = [
            ['users.u_id', 'DESC']
        ];

        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);

        return view('userlist/table', $data);

	}
	
	public function add(){
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getAddTitle();

		if(is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);

		return view('userlist/add', $data);
    }

    public function edit($id){
		if(!$this->crud->current_values($id))
			return redirect()->to($this->crud->getBase() . '/' . $this->crud->getTable());

		$data['item_id'] = $id;
		$data['form'] = $form = $this->crud->form();
		$data['crud'] = $this->crud;
		$data['title'] = $this->crud->getEditTitle();
		$data['password_form'] = $this->getPasswordForm($id);


		if (is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);

			if (is_array($data['password_form']) && isset($data['password_form']['redirect']))
			return redirect()->to($data['password_form']['redirect']);

		return view('userlist/form', $data);
	}

    protected function field_options(){
		$fields = [];
		
        $fields['u_id'] = ['label' => 'ID'];
        $fields['u_username'] = ['label' => 'Username', 'type' => 'unset'];
		$fields['u_firstname'] = ['label' => 'First name'];       
		$fields['u_lastname'] = ['label' => 'Last name'];     
		$fields['u_email'] = ['label' => 'Email'];     
		$fields['u_password'] = [
			'label' => 'Password',
			'required' => true, 
			'only_add' => true,
			'type' => 'password',
			'class' => 'col-12 col-sm-6',
			'confirm' => true, 
			'password_hash' => true
		];  
		$fields['u_role'] = ['label' => 'Role', 'type' => 'unset'];       
		$fields['u_company'] = [
			'label' => 'Company',
			'type' => 'dropdown',
			'relation' => [
				'table'=> 'compinfo',
				'primary_key' => 'ci_id',
				'display' => ['ci_legal_name'],
				'order_by' => 'ci_legal_name',
				'order' => 'ASC'
				]
			];     
		$fields['u_create_datetime'] = ['label' => 'Create datetime', 'type' => 'unset'];       
		$fields['u_last_login'] = ['label' => 'Last login', 'type' => 'unset'];       
		$fields['u_active'] = ['label' => 'Active'];       
		$fields['u_status'] = ['label' => 'Status']; 
		$fields['roles'] = [
			'label' => 'Roles',
			'required' => false,
			'type' => 'checkboxes',
			'relation' => [
				'save_table' => 'user_roles',
				'parent_field' => 'ur_user_id',
				'child_field' => 'ur_role_id',
				'inner_class' => 'col-12',
				'table' => 'roles',
				'primary_key' => 'r_id',
				'display' => ['r_name'],
				'order_by' => 'r_name',
				'order' => 'ASC'
			]
		];

		// $fields['tags'] = [
		// 	'label' => 'Tags',
		// 	'required' => false,
		// 	'type' => 'checkboxes',
		// 	'relation' => [
		// 		'save_table' => 'project_tags',
		// 		'parent_field' => 'pt_project_id',
		// 		'child_field' => 'pt_tag_id',
		// 		'inner_class' => 'col-6 col-sm-3',
		// 		'table' => 'tags',
		// 		'primary_key' => 't_id',
		// 		'display' => ['t_name'],
		// 		'order_by' => 't_name',
		// 		'order' => 'ASC'
		// 	]
		// ];


        return $fields;
	}

	private function crud(){
		$params = [
			'table' => $this->table,
			'dev' => false,
			'fields' => $this->password_field_options(),
			'form_title_update' => 'Update Password',
			'form_submit_update' => 'Change Password',
			'form_id' => 'user_password',
			'edit_card_header' => false,
		];

		return new Crud($params, service('request'));
	}

	private function getPasswordForm($id){
		$passCrud = $this->crud();
		$passCrud->current_values($id);
		return $passCrud->form();
	}

	protected function password_field_options()
	{
		$fields = [];
		$field['id'] = ['label' => 'ID'];
		$fields['u_username'] = ['type' => 'unset'];
		$fields['u_firstname'] = ['type' => 'unset'];
		$fields['u_lastname'] = ['type' => 'unset'];
		$fields['u_email'] = ['type' => 'unset'];
		$fields['u_role'] = ['type' => 'unset'];
		$fields['u_company'] = ['type' => 'unset'];
		$fields['u_status'] = ['type' => 'unset' ];
		$fields['u_create_datetime'] = ['type' => 'unset'];
		$fields['u_active'] = ['type' => 'unset'];
		$fields['u_last_login'] = ['type' => 'unset'];
		$fields['u_password'] = [
			'label' => 'Password',
			'required' => true,
			'only_edit' => true,
			'type' => 'password',
			'class' => 'col-12 col-sm-6',
			'confirm' => true,
			'password_hash' => true
		];

		return $fields;
	}

	// public function userslist(){
	// 	hasAccess('Super');
	// 	$model = new UserModel();
	

	// 	$data['users'] = $model->orderBy('id', 'ASC')->findAll();
	// 	return view('userslist', $data);
	// }   



	public function login()
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
			'id' => $user->id,
            'username' => $user->u_username,
			'firstname' => $user->u_firstname,
			'lastname' => $user->u_lastname,
			'fullname' => $user->u_firstname.' '.$user->u_lastname,
			'email' => $user->u_email,
			'isLoggedIn' => true,
			'roles' => $user->getRoles(),
			'roleNames' => $user->getRoleNames(),
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



    public function createuser()
    {    
        return view('createuser');
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



    public function edituser($id = null)
    {
      
		$model = new UserModel();
		$companies = new CompInfoModel();
		$roles = new RoleModel();
		$data['companies'] = $companies = $companies->findAll();
		$data['roles'] = $roles = $roles->findAll();
	
		$data['user'] = $model->where('id', $id)->first();
 
     return view('edituser', $data);
	}
	

	public function updateroles(){
		if(!$this->request->getPost())
			die('Not allowed');

		$newRoles = $this->request->getPost('roles') ?? [];
		$id = $this->request->getPost('id');

		$userModel = new UserModel();
		$user = $userModel->where('id', $id)->first();
		$currentRoles = $user->getRoles();
		
		$toInsert = [];

		$userRolesModel = new UserRolesModel();
		
		foreach ($currentRoles as $item) {
			if(!in_array($item, $newRoles)){
				$where = [
					'ur_user_id' => $id,
					'ur_role_id' => $item
				];
				$userRolesModel->where($where)->delete();
			}
		}

		foreach ($newRoles as $item) {
			if (!in_array($item, $currentRoles)) {
				$data = [
					'ur_user_id' => $id,
					'ur_role_id' => $item
				];
				$userRolesModel->save($data);
			}
		}

		return redirect()->to('/users/edituser/' . $id);
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



    public function deleteuser($id = null)
    {
 
     $model = new UserModel();
 
     $data['users'] = $model->where('id', $id)->delete();
      
     return redirect()->to('/userslist');
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