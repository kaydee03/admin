<?php namespace App\Controllers;

use App\Models\DispatchersModel;


class Dispatchers extends BaseController
{

    public function index()
    {       
        helper('form');
        $model = new DispatchersModel();

        $data['dispatchboard'] = $model->orderBy('id', 'ASC')->findAll();
        return view('dispatchboard', $data);
    }    


 
    public function createdispatchboard()
    {    
        return view('createdispatchboard');
    }



    public function storedispatchboard()
    {  
 
        helper(['form', 'url']);
         
        $model = new DispatchersModel();
 

        $data = [
            'db_status' => $this->request->getVar('status'),
            'db_type'  => $this->request->getVar('type'),
            'db_load_size'  => $this->request->getVar('load_size'),
            'db_date'  => $this->request->getVar('date'),
            'db_pickup_time'  => $this->request->getVar('pickup_time'),
            'db_pick_up'  => $this->request->getVar('pick_up'),
            'db_drop_off_date'  => $this->request->getVar('drop_off_date'),
            'db_drop_off_time'  => $this->request->getVar('drop_off_time'),
            'db_drop_off'  => $this->request->getVar('drop_off'),
            'db_deadhead'  => $this->request->getVar('deadhead'),
            'db_loaded_miles'  => $this->request->getVar('loaded_miles'),
            'db_loaded_pay'  => $this->request->getVar('loaded_pay'),
            'db_driver'  => $this->request->getVar('driver'),
            'db_dispatched_by'  => $this->request->getVar('dispatched_by'),
            'db_broker_shipper'  => $this->request->getVar('broker_shipper'),
            'db_notes'  => $this->request->getVar('notes'),
            ];
 
        $save = $model->insert($data);
 
        return redirect()->to( base_url('/dispatchboard') );
    }



    public function editdispatchboard($id = null)
    {
     helper('form');
     $model = new DispatchersModel();
 
     $data['dispatchboard'] = $model->where('id', $id)->first();
 
     return view('editdispatchboard', $data);
    }



    public function updatedispatchboard()
    {  
 
        helper(['form', 'url']);
         
        $model = new DispatchersModel();
 
        $id = $this->request->getVar('id');
 

        $data = [
            'db_status' => $this->request->getVar('status'),
            'db_type'  => $this->request->getVar('type'),
            'db_load_size'  => $this->request->getVar('load_size'),
            'db_date'  => $this->request->getVar('date'),
            'db_pickup_time'  => $this->request->getVar('pickup_time'),
            'db_pick_up'  => $this->request->getVar('pick_up'),
            'db_drop_off_date'  => $this->request->getVar('drop_off_date'),
            'db_drop_off_time'  => $this->request->getVar('drop_off_time'),
            'db_drop_off'  => $this->request->getVar('drop_off'),
            'db_deadhead'  => $this->request->getVar('deadhead'),
            'db_loaded_miles'  => $this->request->getVar('loaded_miles'),
            'db_loaded_pay'  => $this->request->getVar('loaded_pay'),
            'db_driver'  => $this->request->getVar('driver'),
            'db_dispatched_by'  => $this->request->getVar('dispatched_by'),
            'db_broker_shipper'  => $this->request->getVar('broker_shipper'),
            'db_notes'  => $this->request->getVar('notes'),
            ];
 
        $save = $model->update($id,$data);
 
        return redirect()->to('/dispatchboard');
    }



    public function deletedispatchboard($id = null)
    {
 
     $model = new DispatchersModel();
 
     $data['dispatchboard'] = $model->where('id', $id)->delete();
      
     return redirect()->to('/dispatchboard');
    }
}
