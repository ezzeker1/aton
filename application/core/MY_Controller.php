<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logged_controller extends CI_Controller
{
    var $user;
    var $assets_css;
    var $assets_js;
    public function __construct() {
        parent::__construct();
        $this->_load_assets();
        $this->_is_logged();
        $this->_set_table();
    }
    /*
     * check if user is authorized
     */
    function _is_logged()
    {
        $logged=$this->session->userdata('is_logged_in');
        if(isset($logged) && $logged !=FALSE )
        {
            $this->user= new stdClass();
            $this->user->is_logged_in=TRUE;
            $this->user->username=$this->session->userdata('username');
            $this->load->vars(array(
                'user'=>$this->user
            ));
        }
        else
            redirect('Admin/login');
    }
    /*
     * Function to load common assets on the whole template
     */
    function _load_assets()
    {
        $this->assets_js=array(
                'Application.js',
                'parsley.extend.min.js',
                'aton.js'
            
             );
        $this->assets_css=array(
                 'bootstrap.min.css',
                 'bootstrap-responsive.min.css',
                 'font-awesome.min.css',
                 'ui-lightness/jquery-ui-1.10.0.custom.min.css',
                 'base-admin-2.css',
                 'base-admin-2-responsive.css',
                 'plugins/lightbox/themes/evolution-dark/jquery.lightbox.css',
                 'custom.css'
             );
        $this->load->vars(array(
            'assets_js'=>$this->assets_js,
            'assets_css'=>$this->assets_css
        ));
    }
    function _set_table()
    {
        $this->load->library('table');
        $tmpl = array (
                    'table_open'=> '<table id="big_table" class="table table-bordered table-striped table-highlight">'
              );
        $this->table->set_template($tmpl); 
    }
}
class FrontController extends CI_Controller{
    var $lang;
    public function __construct() {
        parent::__construct();
        $this->load->helper('language');
        $this->_set_locale();
    }
    /*
     * sets the locale data
     */
    function _set_locale()
    {
        $user_data=$this->session->userdata('user_data');
        
        if(isset($user_data['language']))
            $this->lang=$user_data['language'];
        else
        {
            $this->load->model('SettingsModel');
            $this->lang=$this->SettingsModel->getSetting('default_language');
        }
    }
}