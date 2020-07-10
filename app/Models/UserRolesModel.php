<?php namespace App\Models;

    use CodeIgniter\Model;


    class UserRolesModel extends Model {

        protected $table = 'user_roles';
        protected $returnType     = 'object';
        protected $allowedFields = ['ur_user_id', 'ur_role_id','ur_level'];
        protected $primaryKey = 'ur_id';

    }
