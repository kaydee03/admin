<?php namespace App\Models;

    use CodeIgniter\Model;


    class CompInfoModel extends Model {

        protected $table = 'compinfo';
        protected $returnType     = 'object';
        protected $allowedFields = ['ci_usdot_number', 'ci_legal_name', 'ci_mc_number', 'ci_primary_contact', 'ci_primary_title', 'ci_primary_phone', 'ci_secondary_contact', 'ci_secondary_title', 'ci_secondary_phone', 'ci_duns_number', 'ci_irs_tax_id_number', 'ci_sti_number', 'ci_withholding_acct_number', 'ci_dol_sui', 'ci_uiia_scac_code', 'ci_insurance_agent_code', 'ci_bnsf_pin', 'ci_email', 'ci_address', 'ci_city', 'ci_state', 'ci_zip', 'ci_drivers', 'ci_power_units', 'ci_trailers', 'ci_carrier_operation', 'ci_cargo_carried'];


    }
