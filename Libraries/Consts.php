<?php
namespace App\Libraries;

class Consts
{
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->setConstants();
    }
    private function setConstants()
    {
        $dcc_id = session()->get('usr_dcc_id');
        if($dcc_id){
            $query = $this->db->query('SELECT dcc_timezone FROM tbl_dcc WHERE dcc_id = "'.$dcc_id.'"');
            $timezone = $query->getRow();
           
            $query2 = $this->db->query('SELECT tz_timezone_location FROM tbl_timezone WHERE tz_id = "'.$timezone->dcc_timezone.'"');
            $timezone_set = $query2->getRow();
            define('GLOBAL_TIMEZONE', isset($timezone_set->tz_timezone_location) ? $timezone_set->tz_timezone_location : "America/New_York");  
            
            date_default_timezone_set(GLOBAL_TIMEZONE);
            
            
        }
        define('TODAY_DATE', date('Y-m-d'));
        define('TOMORROW_DATE', date("Y-m-d", strtotime("+1 day")));
        define('TODAY_DATE_TIME', date('Y-m-d H:i:s'));
        define('TODAY_DATE_DISPLAY', date('m/d/Y'));
        define('TODAY_TIME', date('H:i:s'));
        define('TODAY_TIME_HOURS_MINUTES', date('H:i'));
        define('TODAY_TIME_12', date('h:i A'));
        define('CURR_FIRST_DATE', date('Y-m-01'));
        define('CURR_LAST_DATE', date('Y-m-t'));
        define('CURR_DAY', date('d'));
        define('CURR_MONTH', date('m'));
        define('CURR_YEAR', date('Y'));
        
        return true;
    }
}