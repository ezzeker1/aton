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
        $this->data['table']=$this->generateTable();
        $this->data['main_cotent']='settings';
        $this->load->view('admin/Layouts/template',$this->data);  
    }
    function update()
    {
        
    }
    function generateTable()
    {
        foreach($this->data['settings']=$this->SettingsModel->get() as $setting) 
        {
            $this->table->add_row(
                    array(
                        $setting->key,
                        '<input id="name" class="input-large" type="text" name="name" value="'.$setting->value.'">'
                    ));
        }
        return $this->table->generate();
    }
}