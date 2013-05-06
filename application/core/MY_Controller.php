<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logged_controller extends CI_Controller
{
    var $user;
    public function __construct() {
        parent::__construct();
        $this->_is_logged();
    }
    function _is_logged()
    {
        $logged=$this->session->userdata('is_logged_in');
        if(isset($logged) && $logged !=FALSE )
        {
            $this->user->is_logged_in=TRUE;
            $this->user->username=$this->session->userdata('username');
            $this->load->vars(array(
                'user'=>$this->user
            ));
        }
        else
            redirect('Admin/login');
    }
}