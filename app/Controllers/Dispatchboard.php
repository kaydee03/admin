<?php namespace App\Controllers;

use App\Models\DispatchersModel;
use App\Libraries\Crud;


class Dispatchboard extends BaseController
{

    protected $crud;

    function __construct(){
        $params = [
            'table' => 'dispatchboard',
            'dev' => false,
            'fields' => $this->field_options(),
            'form_title_add' => 'Add',
            'form_title_update' => 'Edit Dispatcher',
            'form_submit' => 'Add',
            'table_title' => 'Dispatchers',
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
            'db_status',           
            'db_type',          
            'db_load_size',            
            'db_date',           
            'db_pickup_time',          
            'db_pick_up',            
            'db_drop_off_date',           
            'db_drop_off_time',           
            'db_drop_off',           
            'db_deadhead',           
            'db_loaded_miles',          
            'db_loaded_pay',           
            'db_driver',            
            'db_dispatched_by',         
            'db_broker_shipper',          
            'db_notes',       
        ];
        $where = null;
        $order = [
            ['dispatchboard.id', 'DESC']
        ];

        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);

        return view('dispatchboard/table', $data);

    }

    public function add(){
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getAddTitle();

		if(is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);

		return view('dispatchboard/form', $data);
    }

    public function edit($id){
		if(!$this->crud->current_values($id))
			return redirect()->to($this->crud->getBase() . '/' . $this->crud->getTable());

		$data['item_id'] = $id;
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getEditTitle();

		if (is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);

		return view('dispatchboard/form', $data);
	}

    protected function field_options(){
        $fields = [];

        $fields['id'] = ['label' => 'ID'];
        $fields['db_status'] = ['label' => 'Status'];           
        $fields['db_type'] = ['label' => 'Type'];          
        $fields['db_load_size'] = ['label' => 'Load size'];            
        $fields['db_date'] = ['label' => 'Date'];           
        $fields['db_pickup_time'] = ['label' => 'Pickup time'];          
        $fields['db_pick_up'] = ['label' => 'Pick up'];            
        $fields['db_drop_off_date'] = ['label' => 'Drop off date'];           
        $fields['db_drop_off_time'] = ['label' => 'Drop off time'];           
        $fields['db_drop_off'] = ['label' => 'Drop off'];           
        $fields['db_deadhead'] = ['label' => 'Deadhead'];           
        $fields['db_loaded_miles'] = ['label' => 'Loaded miles'];          
        $fields['db_loaded_pay'] = ['label' => 'Loaded pay'];           
        $fields['db_cpm_wo_dh'] = ['label' => 'Cpm wo dh'];           
        $fields['db_cpm_with_dh'] = ['label' => 'Cpm wo dh'];           
        $fields['db_min_bid_wo_dh'] = ['label' => 'Cpm wo dh'];           
        $fields['db_minimum_bid'] = ['label' => 'Minumum bid'];           
        $fields['db_fuel_cost'] = ['label' => 'Fuel cost'];           
        $fields['db_driver'] = [
                            'label' => 'Driver',
                            'type' => 'dropdown',
                            'relation' => [
                                'table'=> 'empinfo',
                                'primary_key' => 'ei_id',
                                'display' => ['ei_firstname', 'ei_lastname'],
                                'order_by' => 'ei_firstname',
                                'order' => 'ASC'
                                ]
                            ];           
        $fields['db_driver_pay'] = ['label' => 'Driver Pay'];            
        $fields['db_load_expenses'] = ['label' => 'Loat expenses'];            
        $fields['db_operating_cost'] = ['label' => 'Operating cost'];            
        $fields['db_profits'] = ['label' => 'Profits'];            
        $fields['db_dispatched_by'] = ['label' => 'Dispatched by'];         
        $fields['db_broker_shipper'] = ['label' => 'Broker shipper'];          
        $fields['db_notes'] = ['label' => 'Notes'];   


        return $fields;
    }
 
}
