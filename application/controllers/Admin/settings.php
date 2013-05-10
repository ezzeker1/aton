<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * @Author:Ahmed Samy
 * @Porject: ATON
 * @Date: 10/05/2013
 */
class Settings extends Logged_controller{
   function __construct() {
        parent::__construct();
        $this->load->model('SettingsModel');
        $this->data=array(
            'title'=>'ATON | Admin panel | Home'
        );
    }
    function index()
    {
        $this->data['settings']=$this->SettingsModel->get();
        $this->data['main_cotent']='settings';
        $this->load->view('Admin/Layouts/template',$this->data);  
    }
    function update()
    {
        
    }
}