<?php namespace App\Controllers;
 
use App\Models\EmpInfoModel;
use App\Libraries\Crud;


class Empinfo extends BaseController
{

    protected $crud;

    function __construct(){
        $params = [
            'table' => 'empinfo',
            'dev' => false,
            'fields' => $this->field_options(),
            'form_title_add' => 'Add',
            'form_title_update' => 'Edit Employee',
            'form_submit' => 'Add',
            'table_title' => 'Employees',
            'form_submit_update' => 'Update',
            'base' => '',
            ];

        $this->crud = new Crud($params, service('request'));

    }


    public function index()
    {
        $page = 1;
        if(isset($_GET['page'])){
            $page = (int) $_GET['page'];
            $page = max(1, $page);
        }

        $data['title'] = $this->crud->getTableTitle();

        $per_page = 20;
        $columns = [
            'ei_firstname',  
            'ei_lastname', 
            'ei_position', 
            'ei_title',  
            'ei_employer', 
            'ei_employment', 
            'ei_pay_structure',   
            'ei_compensation', 
            'ei_phone_number', 
            'ei_email',   
            'ei_address', 
            'ei_city',   
            'ei_state',   
            'ei_zip',   
            'ei_gender',   
            'ei_dob',   
            'ei_hire_date',  
            'ei_cdl_num',   
            'ei_cdl_state',   
            'ei_cdl_exp',   
            'ei_med_cert_exp',  
        ];
        $where = null;
        $order = [
            ['empinfo.ei_id', 'DESC']
        ];

        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);

        return view('empinfo/table', $data);

    }

    public function add(){
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getAddTitle();

		if(is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);

		return view('empinfo/form', $data);
    }

    public function edit($id){
		if(!$this->crud->current_values($id))
			return redirect()->to($this->crud->getBase() . '/' . $this->crud->getTable());

		$data['item_id'] = $id;
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getEditTitle();

		if (is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);

		return view('empinfo/form', $data);
	}
    
    protected function field_options(){
        $fields = [];
        
        $fields['id'] = ['label' => 'ID'];
        $fields['ei_firstname'] = ['required' => true, 'label' => 'Firstname', 'class' => 'col-12 col-md-6' ]; 
        $fields['ei_lastname'] = ['required' => true, 'label' => 'Lastname', 'class' => 'col-12 col-md-6' ];
        $fields['ei_position'] = [ 'label' => 'Position', 'class' => 'col-12 col-md-6' ];
        $fields['ei_title'] = [ 'label' => 'Title', 'class' => 'col-12 col-md-6' ]; 
        $fields['ei_employer'] = [
            'label' => 'Employer',
            'type' => 'dropdown',
            'required' => true,
            'class' => 'col-12 col-md-4',
			'relation' => [
                'table'=> 'compinfo',
				'primary_key' => 'ci_id',
				'display' => ['ci_legal_name'],
				'order_by' => 'ci_legal_name',
				'order' => 'ASC'
				]
			];     
        $fields['ei_employment'] = [ 'label' => 'Employment', 'required' => true, 'class' => 'col-12 col-md-4' ];
        $fields['ei_hire_date'] = [ 'label' =>'Hire date', 'required' => true, 'class' => 'col-12 col-md-4' ]; 
        $fields['ei_pay_structure'] = [ 'label' => 'Pay structure', 'class' => 'col-12 col-md-6' ];  
        $fields['ei_compensation'] = [ 'label' => 'Compensation', 'class' => 'col-12 col-md-6' ];
        $fields['ei_phone_number'] = [ 'label' => 'Phone number', 'required' => true, 'class' => 'col-12 col-md-6' ];
        $fields['ei_email'] = [ 'label' => 'Email', 'required' => true, 'class' => 'col-12 col-md-6'];  
        $fields['ei_address'] = [ 'label' => 'Address', 'class' => 'col-12 col-md-6' ];
        $fields['ei_city'] = [ 'label' => 'City', 'class' => 'col-12 col-md-6' ];  
        $fields['ei_state']  = [
            'label' => 'State',
            'type' => 'dropdown',
            'class' => 'col-12 col-md-6',
            'relation' => [
                'table'=> 'states',
                'primary_key' => 'state_id',
                'display' => ['state_code'],
                'order_by' => 'state_code',
                'order' => 'ASC'
                ]
            ];
        $fields['ei_zip'] = [ 'label' => 'Zip', 'class' => 'col-12 col-md-6' ];  
        $fields['ei_gender'] = [ 'label' => 'Gender', 'required' => true, 'class' => 'col-12 col-md-6' ];  
        $fields['ei_dob'] = [ 'label' => 'Dob', 'class' => 'col-12 col-md-6' ];  
        $fields['ei_cdl_num'] = [ 'label' => 'Cdl num', 'class' => 'col-12 col-sm-4' ];  
        $fields['ei_cdl_state'] = [ 
            'label' => 'Cdl state', 
            'class' => 'col-12 col-sm-4',
            'type' => 'dropdown',
            'relation' => [
                'table'=> 'states2',
                'primary_key' => 'state2_id',
                'display' => ['state2_code'],
                'order_by' => 'state2_code',
                'order' => 'ASC'
                ]
              
        ];  
        $fields['ei_cdl_exp'] = [ 'label' => 'Cdl exp', 'class' => 'col-12 col-sm-4' ];  
        $fields['ei_med_cert_exp'] = [ 'label' => 'Med cert exp' ];  
        $fields['ei_status'] = [ 'label' => 'Status' ];  


        return $fields;
    }
    

    // public function empinfo()
    // {
    //     $model = new EmpInfoModel();

    //     $data['empinfo'] = $model->orderBy('id', 'ASC')->findAll();
    //     return view('empinfo', $data);
    // }



    // public function createempinfo()
    // {    
    //     return view('createempinfo');
    // }



    // public function storeempinfo()
    // {  
 
    //     helper(['form', 'url']);
         
    //     $model = new EmpInfoModel();
 

    //     $data = [
    //         'ei_firstname' => $this->request->getVar('first_name'),
    //         'ei_lastname'  => $this->request->getVar('last_name'),
    //         'ei_position'  => $this->request->getVar('position'),
    //         'ei_title'  => $this->request->getVar('title'),
    //         'ei_employer'  => $this->request->getVar('employer'),
    //         'ei_employment'  => $this->request->getVar('employment'),
    //         'ei_pay_structure'  => $this->request->getVar('pay_structure'),
    //         'ei_compensation'  => $this->request->getVar('compensation'),
    //         'ei_phone_number'  => $this->request->getVar('phone_number'),
    //         'ei_email'  => $this->request->getVar('email'),
    //         'ei_address'  => $this->request->getVar('address'),
    //         'ei_city'  => $this->request->getVar('city'),
    //         'ei_state'  => $this->request->getVar('state'),
    //         'ei_zip'  => $this->request->getVar('zip'),
    //         'ei_gender'  => $this->request->getVar('gender'),
    //         'ei_dob'  => $this->request->getVar('dob'),
    //         'ei_hire_date'  => $this->request->getVar('hire_date'),
    //         'ei_cdl_num'  => $this->request->getVar('cdl_num'),
    //         'ei_cdl_state'  => $this->request->getVar('cdl_state'),
    //         'ei_cdl_exp'  => $this->request->getVar('cdl_exp'),
    //         'ei_med_cert_exp'  => $this->request->getVar('med_cert_exp'),
    //         ];


    //     $save = $model->insert($data);
 
    //     return redirect()->to( base_url('/empinfo') );
    // }



    // public function editempinfo($id = null)
    // {
      
    //  $model = new EmpInfoModel();
 
    //  $data['empinfo'] = $model->where('id', $id)->first();
 
    //  return view('editempinfo', $data);
    // }

    
    // public function updateempinfo()
    // {  
 
    //     helper(['form', 'url']);
         
    //     $model = new EmpInfoModel();
 
    //     $id = $this->request->getVar('id');
 
    //     $data = [
    //         'ei_firstname' => $this->request->getVar('fname'),
    //         'ei_lastname'  => $this->request->getVar('lname'),
    //         'ei_position'  => $this->request->getVar('position'),
    //         'ei_title'  => $this->request->getVar('title'),
    //         'ei_employer'  => $this->request->getVar('employer'),
    //         'ei_employment'  => $this->request->getVar('employment'),
    //         'ei_pay_structure'  => $this->request->getVar('pay_structure'),
    //         'ei_compensation'  => $this->request->getVar('compensation'),
    //         'ei_phone_number'  => $this->request->getVar('phone_number'),
    //         'ei_email'  => $this->request->getVar('email'),
    //         'ei_address'  => $this->request->getVar('address'),
    //         'ei_city'  => $this->request->getVar('city'),
    //         'ei_state'  => $this->request->getVar('state'),
    //         'ei_zip'  => $this->request->getVar('zip'),
    //         'ei_gender'  => $this->request->getVar('gender'),
    //         'ei_dob'  => $this->request->getVar('dob'),
    //         'ei_hire_date'  => $this->request->getVar('hire_date'),
    //         'ei_cdl_num'  => $this->request->getVar('cdl_num'),
    //         'ei_cdl_state'  => $this->request->getVar('cdl_state'),
    //         'ei_cdl_exp'  => $this->request->getVar('cdl_exp'),
    //         'ei_med_cert_exp'  => $this->request->getVar('med_cert_exp'),
    //         ];
 
    //     $save = $model->update($id,$data);
 
    //     return redirect()->to('/empinfo');
    // }
 
    // public function deleteempinfo($id = null)
    // {
 
    //  $model = new EmpInfoModel();
 
    //  $data['empinfo'] = $model->where('id', $id)->delete();
      
    //  return redirect()->to('/empinfo');
    // }
}
