<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('lang')) {
    function lang($value)
    {
        $ci = &get_instance();
        $ci->load->database();
        if ($_SESSION['language'] == 'ar') {
            $sql = "select value_2 as value from tbl_constant where constantName='$value'";
        } else { 
            $sql = "select value_1 as value from tbl_constant where constantName='$value'";
        }
        $query = $ci->db->query($sql);
        $data=$query->result();
        return  $data[0]->value;
    }
}
