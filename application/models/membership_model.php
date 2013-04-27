<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function login()
    {
        $this->db->where('username',$this->input->post('username'));
        $this->db->where('password',  md5($this->input->post('password')));
        $query=$this->db->get('users');
        if($query->num_rows() ==1 )
            return true;
        else return false;
    }
}