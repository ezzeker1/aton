<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends Logged_controller{
    
    function __construct() {
        parent::__construct();
    }
    function index()
    {
         $data['main_content'] = 'Admin/template/index'  ;
         $data['load_footer'] = TRUE;
         $this->load->view('Admin/Layouts/template',$data);  
    }
}