<?php namespace App\Models;

    use CodeIgniter\Model;

	
    class UserModel extends Model{
    	protected $table = 'users';
	   	protected $primaryKey = 'id';
    	protected $allowedFields = ['u_username', 'u_firstname', 'u_lastname', 'u_email', 'u_password', 'u_role', 'u_company', 'u_create_datetime',  'u_active', 'u_status'];
    	// protected $beforeInsert = ['beforeInsert'];
		// protected $beforeUpdate = ['beforeUpdate'];
		protected $returnType    = 'App\Entities\User';


    	protected function beforeInsert(array $data) {

            $data = $this->passwordHash($data);
    		return $data;
        }


    	protected function beforeUpdate(array $data) {

            $data = $this->passwordHash($data);
    		return $data;
    	}


    	protected function passwordHash(array $data) {

    		if (isset($data['data']['u_password']))
    		{
        		$data['data']['u_password'] = password_hash($data['data']['u_password'], PASSWORD_DEFAULT);
    	    	return $data;

    	    }
		}
		
		
    }
    