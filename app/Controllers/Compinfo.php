<?php namespace App\Controllers;

use App\Models\CompInfoModel;
use App\Libraries\Crud;


class Compinfo extends BaseController
{
    protected $crud;

    function __construct(){
        $params = [
            'table' => 'compinfo',
            'dev' => false,
            'fields' => $this->field_options(),
            'form_title_add' => 'Add',
            'form_title_update' => 'Edit Company',
            'form_submit' => 'Add',
            'table_title' => 'Companies',
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
                'ci_usdot_number',
                'ci_legal_name',
                'ci_mc_number',
                'ci_primary_contact',
                'ci_primary_title',
                'ci_primary_phone',
                'ci_secondary_contact',
                'ci_secondary_title',
                'ci_secondary_phone',
                'ci_duns_number',
                'ci_irs_tax_id_number',
                'ci_sti_number',
                'ci_withholding_acct_number',
                'ci_dol_sui',
                'ci_uiia_scac_code',
                'ci_insurance_agent_code',
                'ci_bnsf_pin',
                'ci_email',
                'ci_address',
                'ci_city',
                'ci_state',
                'ci_zip',
                'ci_power_units',
                'ci_trailers',
                'ci_carrier_operation',
                'cargo_carried',];
        $where = null;
        $order = [
            ['ci_id', 'DESC']
        ];

        $data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);

        return view('compinfo/table', $data);

    }


    public function add(){
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getAddTitle();

		if(is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);

		return view('compinfo/form', $data);
    }

    public function edit($id){
		if(!$this->crud->current_values($id))
			return redirect()->to($this->crud->getBase() . '/' . $this->crud->getTable());

		$data['item_id'] = $id;
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getEditTitle();

		if (is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);

		return view('compinfo/form', $data);
	}

    protected function field_options(){
        $fields = [];

        $fields['ci_id'] = ['label' => 'ID'];
        $fields['ci_usdot_number'] = [ 'label' => 'Usdot number' ];
        $fields['ci_legal_name']  = [ 'label' => 'Legal name' ];
        $fields['ci_mc_number']  = [ 'label' => 'Mc number' ];
        $fields['ci_primary_contact']  = [ 'label' => 'Primary contact', 'class' => 'col-12 col-sm-4'];
        $fields['ci_primary_title']  = [ 'label' => 'Primary title', 'class' => 'col-12 col-sm-4'];
        $fields['ci_primary_phone']  = [ 'label' => 'Primary phone', 'class' => 'col-12 col-sm-4'];
        $fields['ci_secondary_contact']  = [ 'label' => 'Secondary contact', 'class' => 'col-12 col-sm-4'];
        $fields['ci_secondary_title']  = [ 'label' => 'Secondary title', 'class' => 'col-12 col-sm-4'];
        $fields['ci_secondary_phone']  = [ 'label' => 'Secondary phone', 'class' => 'col-12 col-sm-4'];
        $fields['ci_duns_number']  = [ 'label' => 'Duns number' ];
        $fields['ci_irs_tax_id_number']  = [ 'label' => 'Tax id number' ];
        $fields['ci_sti_number']  = [ 'label' => 'Sti number' ];
        $fields['ci_withholding_acct_number']  = [ 'label' => 'Withholding acc number' ];
        $fields['ci_dol_sui']  = [ 'label' => 'Dol sui' ];
        $fields['ci_uiia_scac_code']  = [ 'label' => 'Uiia scac code' ];
        $fields['ci_insurance_agent_code']  = [ 'label' => 'Insurance agent code' ];
        $fields['ci_bnsf_pin']  = [ 'label' => 'Bnsf pin' ];
        $fields['ci_email']  = [ 'label' => 'Email' ];
        $fields['ci_address']  = [ 'label' => 'Address', 'class' => 'col-12 col-md-6' ];
        $fields['ci_city']  = [ 'label' => 'City', 'class' => 'col-12 col-md-6' ];
        $fields['ci_state']  = [
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
        $fields['ci_zip']  = [ 'label' => 'Zip', 'class' => 'col-12 col-md-6' ];
        $fields['ci_power_units']  = [ 'label' => 'Power units' ];
        $fields['ci_trailers']  = [ 'label' => 'Trailers' ];
        $fields['ci_carrier_operation']  = [
                                        'label' => 'Carrier Operation',
                                        'type' => 'radio',
                                        'relation' => [
                                            'table'=> 'carrier_operation',
                                            'primary_key' => 'co_id',
                                            'display' => ['co_name'],
                                            'order_by' => 'co_name',
                                            'order' => 'ASC'
                                            ]
                                        ];
        $fields['ci_drivers'] = [
                    			'label' => 'Driver',
                    			'type' => 'unset',
                    			// 'relation' => [
                                //     'save_table' => 'compinfo',
                                //     'parent_field' => 'ci_id',
                                //     'child_field' => 'ci_drivers',
                                //     'inner_class' => 'col-6 col-md-3',
                    			// 	'table'=> 'empinfo',
                    			// 	'primary_key' => 'ei_id',
                    			// 	'display' => ['ei_firstname', 'ei_lastname'],
                    			// 	'order_by' => 'ei_firstname',
                    			// 	'order' => 'ASC'
                    			// 	]
                                ];
        // $fields['ci_cargo_carried'] = ['type' => 'unset'];
                                
        $fields['cargo_carried'] = [
            'label' => 'Cargo Carried',
			'required' => false,
            'type' => 'checkboxes',
            'relation' => [
                'save_table' => 'company_cargo_carried',
                'parent_field' => 'ccc_company_id',
                'child_field' => 'ccc_cargo_carrier_id',
                'inner_class' => 'col-6 col-md-3',
                'table' => 'cargo_carrier',
                'primary_key' => 'cc_id',
                'display' => ['cc_name'],
                'order_by' => 'cc_name',
                'order' => 'ASC'
            ]
        ];
        return $fields;
    }


    // public function createcompinfo()
    // {
    //     return view('createcompinfo');
    // }



    // public function storecompinfo()
    // {

    //     helper(['form', 'url']);

    //     $model = new CompInfoModel();


    //     $data = [
    //         'ci_usdot_number' => $this->request->getVar('usdot_num'),
    //         'ci_legal_name'  => $this->request->getVar('legal_name'),
    //         'ci_mc_number'  => $this->request->getVar('mc_num'),
    //         'ci_primary_contact'  => $this->request->getVar('primary_contact'),
    //         'ci_primary_title'  => $this->request->getVar('primary_title'),
    //         'ci_primary_phone'  => $this->request->getVar('primary_phone'),
    //         'ci_secondary_contact'  => $this->request->getVar('secondary_contact'),
    //         'ci_secondary_title'  => $this->request->getVar('secondary_title'),
    //         'ci_secondary_phone'  => $this->request->getVar('secondary_phone'),
    //         'ci_duns_number'  => $this->request->getVar('duns_num'),
    //         'ci_irs_tax_id_number'  => $this->request->getVar('irs_tax_id_num'),
    //         'ci_sti_number'  => $this->request->getVar('sti_num'),
    //         'ci_withholding_acct_number'  => $this->request->getVar('withholding_acct_num'),
    //         'ci_dol_sui'  => $this->request->getVar('dol_sui'),
    //         'ci_uiia_scac_code'  => $this->request->getVar('uiia_scac_code'),
    //         'ci_insurance_agent_code'  => $this->request->getVar('insurance_agent_code'),
    //         'ci_bnsf_pin'  => $this->request->getVar('bnsf_pin'),
    //         'ci_email'  => $this->request->getVar('email'),
    //         'ci_address'  => $this->request->getVar('address'),
    //         'ci_city'  => $this->request->getVar('city'),
    //         'ci_state'  => $this->request->getVar('state'),
    //         'ci_zip'  => $this->request->getVar('zip'),
    //         'ci_drivers'  => $this->request->getVar('drivers'),
    //         'ci_power_units'  => $this->request->getVar('power_units'),
    //         'ci_trailers'  => $this->request->getVar('trailers'),
    //         'ci_carrier_operation'  => $this->request->getVar('carrier_operation'),
    //         'ci_cargo_carried'  => $this->request->getVar('cargo_carried'),
    //         ];

    //     $save = $model->insert($data);

    //     return redirect()->to( base_url('/compinfo') );
    // }



    // public function editcompinfo($id = null)
    // {
    //  helper('form');
    //  $model = new CompInfoModel();

    //  $data['compinfo'] = $model->where('id', $id)->first();

    //  return view('editcompinfo', $data);
    // }



    // public function updatecompinfo()
    // {

    //     helper(['form', 'url']);

    //     $model = new CompInfoModel();

    //     $id = $this->request->getVar('id');


    //     $data = [
    //         'ci_usdot_number' => $this->request->getVar('usdot_num'),
    //         'ci_legal_name'  => $this->request->getVar('legal_name'),
    //         'ci_mc_number'  => $this->request->getVar('mc_num'),
    //         'ci_primary_contact'  => $this->request->getVar('primary_contact'),
    //         'ci_primary_title'  => $this->request->getVar('primary_title'),
    //         'ci_primary_phone'  => $this->request->getVar('primary_phone'),
    //         'ci_secondary_contact'  => $this->request->getVar('secondary_contact'),
    //         'ci_secondary_title'  => $this->request->getVar('secondary_title'),
    //         'ci_secondary_phone'  => $this->request->getVar('secondary_phone'),
    //         'ci_duns_number'  => $this->request->getVar('duns_num'),
    //         'ci_irs_tax_id_number'  => $this->request->getVar('irs_tax_id_num'),
    //         'ci_sti_number'  => $this->request->getVar('sti_num'),
    //         'ci_withholding_acct_number'  => $this->request->getVar('withholding_acct_num'),
    //         'ci_dol_sui'  => $this->request->getVar('dol_sui'),
    //         'ci_uiia_scac_code'  => $this->request->getVar('uiia_scac_code'),
    //         'ci_insurance_agent_code'  => $this->request->getVar('insurance_agent_code'),
    //         'ci_bnsf_pin'  => $this->request->getVar('bnsf_pin'),
    //         'ci_email'  => $this->request->getVar('email'),
    //         'ci_address'  => $this->request->getVar('address'),
    //         'ci_city'  => $this->request->getVar('city'),
    //         'ci_state'  => $this->request->getVar('state'),
    //         'ci_zip'  => $this->request->getVar('zip'),
    //         'ci_drivers'  => $this->request->getVar('drivers'),
    //         'ci_power_units'  => $this->request->getVar('power_units'),
    //         'ci_trailers'  => $this->request->getVar('trailers'),
    //         'ci_carrier_operation'  => $this->request->getVar('carrier_operation'),
    //         'ci_cargo_carried'  => $this->request->getVar('cargo_carried'),
    //         ];

    //     $save = $model->update($id,$data);

    //     return redirect()->to('/compinfo');
    // }



    // public function deletecompinfo($id = null)
    // {

    //  $model = new DispatchersModel();

    //  $data['compinfo'] = $model->where('id', $id)->delete();

    //  return redirect()->to('/compinfo');
    // }
}
