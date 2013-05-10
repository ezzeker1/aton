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
                'parsley.extend.min.js'
            
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
}