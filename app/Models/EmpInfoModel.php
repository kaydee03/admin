<?php namespace App\Models;

    use CodeIgniter\Model;


    class EmpInfoModel extends Model{
    	protected $table = 'empinfo';
    	protected $allowedFields = ['ei_firstname', 'ei_lastname', 'ei_position', 'ei_title', 'ei_employer', 'ei_employment', 'ei_pay_structure', 'ei_compensation', 'ei_phone_number', 'ei_email', 'ei_address', 'ei_city', 'ei_state', 'ei_zip', 'ei_gender', 'ei_dob', 'ei_hire_date', 'ei_cdl_num', 'ei_cdl_state', 'ei_cdl_exp', 'ei_med_cert_exp'];
    }
