<?php

namespace App\Entities;

use CodeIgniter\Entity;
use App\Models\CompInfoModel;
use App\Models\UserRolesModel;
class User extends Entity
{

    public function getCompany(){
       $model = new CompInfoModel();
       $item = $model->where('ci_id', $this->u_company)->first();
       return $item;
    }

    public function getRoles()
    {
        $model = new UserRolesModel();
        $items = $model->where('ur_user_id', $this->u_id)->findAll() ?? [];
        $roles = [];
        if($items){
            foreach ($items as $item) {
                $roles[] = $item->ur_role_id;
            }
        }
        return $roles;
    }

    public function getRoleNames()
    {
        $model = new UserRolesModel();
        $items = $model
                ->join('roles','user_roles.ur_role_id = roles.r_id')
                ->where('ur_user_id', $this->u_id)->findAll() ?? [];
        $roles = [];
        if ($items) {
            foreach ($items as $item) {
                $roles[] = $item->r_name;
            }
        }
        return $roles;
    }
}
