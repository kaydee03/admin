<?php namespace App\Models;

    use CodeIgniter\Model;


    class DispatchersModel extends Model {

    	protected $table = 'dispatchboard';
        protected $allowedFields = ['db_status', 'db_type', 'db_load_size', 'db_date', 'db_pickup_time', 'db_pick_up', 'db_drop_off_date', 'db_drop_off_time', 'db_drop_off', 'db_deadhead', 'db_loaded_miles', 'db_total_miles', 'db_loaded_pay', 'db_cpm_wo_dh', 'db_cpm_with_dh', 'db_min_bid_wo_dh', 'db_minimum_bid', 'db_fuel_cost', 'db_driver', 'db_driver_pay', 'db_load_expenses', 'db_operating_cost', 'db_profits', 'db_dispatched_by', 'db_broker_shipper', 'db_notes'];
        protected $beforeInsert = ['calculation'];
        protected $beforeUpdate = ['calculation'];


        protected function calculation(array $data) {

            $data['data']['db_total_miles'] = $data['data']['db_deadhead'] + $data['data']['db_loaded_miles'];

            $data['data']['db_cpm_wo_dh'] = $data['data']['db_loaded_pay'] / $data['data']['db_loaded_miles'];

            $data['data']['db_cpm_with_dh'] = $data['data']['db_loaded_pay'] / $data['data']['db_total_miles'];

            $cpm = 1.68;  //VALUE FROM COST OF OPERATIONS SHEET I10

            $data['data']['db_min_bid_wo_dh'] = $data['data']['db_loaded_miles'] * $cpm;

            $data['data']['db_minimum_bid'] = $data['data']['db_total_miles'] * $cpm;

            $truck_fuel_mileage = 5.35;  //VALUE FROM COST OF OPERATIONS SHEET C11
            $fuel_cost_per_gallon = 1.92;  //VALUE FROM COST OF OPERATIONS SHEET C10

            $data['data']['db_fuel_cost'] = $data['data']['db_total_miles'] / ($truck_fuel_mileage * $fuel_cost_per_gallon);

            $driver_pay_structure = .25;  //VALUE FROM COST OF OPERATIONS SHEET D29 AND EMPINFO DB TABLE

            $data['data']['db_driver_pay'] = $data['data']['db_loaded_pay'] * $driver_pay_structure;

            $data['data']['db_load_expenses'] = $data['data']['db_fuel_cost'] * $data['data']['db_driver_pay'];

            $operating_profit = .0541;  //VALUE FROM COST OF OPERATIONS SHEET L22

            $data['data']['db_operating_cost'] = ($data['data']['db_loaded_pay'] * $operating_profit) - $data['data']['db_loaded_pay'];

            $data['data']['db_profits'] = $data['data']['db_loaded_pay'] * $operating_profit;

            return $data;
        }
    }
