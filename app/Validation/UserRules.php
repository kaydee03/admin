<?php

    namespace App\Validation;

    use App\Models\UserModel;


    class UserRules {

        public function validateUser(string $str, string $fields, array $data) {
        	$model = new UserModel();


//        	$user = $model->where('emailUsers', $data['email'])
        	$user = $model->where('u_username', $data['username'])
        	              ->first();
        	
        	if (!$user)
        	    return false;

        	return password_verify($data['password'], $user->u_password);
        	
        }

    }

