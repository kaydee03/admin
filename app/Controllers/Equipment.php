<?php namespace App\Controllers;
 
use App\Models\EquipmentModel;
use App\Libraries\Crud;


class Equipment extends BaseController
{

    protected $crud;

    function __construct(){
        $params = [
            'table' => 'equipment',
            'dev' => false,
            'fields' => $this->field_options(),
            'form_title_add' => 'Add',
            'form_title_update' => 'Edit Equipment',
            'form_submit' => 'Add',
            'table_title' => 'Equipments',
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
            'eq_unit_num',      
            'eq_type',       
            'eq_trailer_type',       
            'eq_year',    
            'eq_make',    
            'eq_model',      
            'eq_vin',    
            'eq_plate',    
            'eq_irp',     
            'eq_unladen_wt',      
            ];
        $where = null;
        $order = [
            ['equipment.eq_id', 'DESC']
        ];

        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);

        return view('equipment/table', $data);

    }


    public function add(){
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getAddTitle();

		if(is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);

		return view('equipment/form', $data);
    }

    public function edit($id){

        $model = new EquipmentModel();

        $data['equipment'] = $model->where('eq_id', $id)->first();

        return view('editequipment', $data);


        // if(!$this->crud->current_values($id))
		// 	return redirect()->to($this->crud->getBase() . '/' . $this->crud->getTable());

		// $data['item_id'] = $id;
		// $data['form'] = $form = $this->crud->form();
		// $data['title'] = $this->crud->getEditTitle();

		// if (is_array($form) && isset($form['redirect']))
		// 	return redirect()->to($form['redirect']);

		// return view('equipment/form', $data);
	}

    protected function field_options(){
        $fields = [];

        $fields['eq_id'] = ['label' => 'ID'];
        $fields['eq_unit_num'] = ['label' => 'Unit num'];      
        $fields['eq_type'] = ['label' => 'Type'];       
        $fields['eq_trailer_type'] = ['label' => 'Trailer type'];       
        $fields['eq_year'] = ['label' => 'Year'];    
        $fields['eq_make'] = ['label' => 'Make'];    
        $fields['eq_model'] = ['label' => 'Model'];      
        $fields['eq_vin'] = ['label' => 'Vin'];    
        $fields['eq_plate'] = ['label' => 'Plate'];    
        $fields['eq_irp'] = ['label' => 'Irp'];     
        $fields['eq_unladen_wt'] = ['label' => 'Unladen wt']; 

        return $fields;
    }


    // public function equipment()
    // {    
    //     $model = new EquipmentModel();

    //     $data['equipment'] = $model->orderBy('eq_id', 'ASC')->findAll();
    //     return view('equipment', $data);
    // }    



    public function createequipment()
    {    
        return view('createequipment');
    }



    public function storeequipment()
    {  
 
        helper(['form', 'url']);
         
        $model = new EquipmentModel();
 


        $data = [
            'eq_unit_num' => $this->request->getVar('unit_num'),
            'eq_type'  => $this->request->getVar('type'),
            'eq_trailer_type'  => $this->request->getVar('trailer_type'),
            'eq_year'  => $this->request->getVar('year'),
            'eq_make'  => $this->request->getVar('make'),
            'eq_model'  => $this->request->getVar('model'),
            'eq_vin'  => $this->request->getVar('vin'),
            'eq_plate'  => $this->request->getVar('plate'),
            'eq_irp'  => $this->request->getVar('irp'),
            'eq_unladen_wt'  => $this->request->getVar('unladen_wt'),
            ];
 
        $save = $model->insert($data);
 
        return redirect()->to( base_url('/equipment') );
    }



    // public function editequipment($id = null)
    // {
      
    //  $model = new EquipmentModel();
 
    //  $data['equipment'] = $model->where('eq_id', $id)->first();
 
    //  return view('editequipment', $data);
    // }



    public function updateequipment()
    {  
 
        helper(['form', 'url']);
         
        $model = new EquipmentModel();
 
        $id = $this->request->getVar('eq_id');
 
        $data = [
            'eq_unit_num' => $this->request->getVar('unit_num'),
            'eq_type'  => $this->request->getVar('type'),
            'eq_trailer_type'  => $this->request->getVar('trailer_type'),
            'eq_year'  => $this->request->getVar('year'),
            'eq_make'  => $this->request->getVar('make'),
            'eq_model'  => $this->request->getVar('model'),
            'eq_vin'  => $this->request->getVar('vin'),
            'eq_plate'  => $this->request->getVar('plate'),
            'eq_irp'  => $this->request->getVar('irp'),
            'eq_unladen_wt'  => $this->request->getVar('unladen_wt'),
            ];
 
        $save = $model->update($id,$data);
 
        return redirect()->to('/equipment');
    }



    public function deleteequipment($id = null)
    {
 
     $model = new EquipmentModel();
 
     $data['equipment'] = $model->where('eq_id', $id)->delete();
      
     return redirect()->to('/equipment');
    }
}
