<?php namespace App\Models;

    use CodeIgniter\Model;


    class EquipmentModel extends Model{
    	protected $table = 'equipment';
    	protected $allowedFields = ['eq_unit_num', 'eq_type', 'eq_trailer_type', 'eq_year', 'eq_make', 'eq_model', 'eq_vin', 'eq_plate', 'eq_irp', 'eq_unladen_wt'];
    }
