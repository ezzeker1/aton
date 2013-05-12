<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('membership_model');
        $this->data=array(
             'title'=>'ATON | Admin panel | Login',
             'assets_js'=>array(
                'libs/jquery-1.8.3.min.js',
                'libs/jquery-ui-1.10.0.custom.min.js',
                'libs/bootstrap.min.js',
                'Application.js',
                'signin.js'
             ),
             'assets_css'=>array(
                 'bootstrap.min.css',
                 'bootstrap-responsive.min.css',
                 'font-awesome.min.css',
                 'ui-lightness/jquery-ui-1.10.0.custom.min.css',
                 'base--2.css',
                 'base--2-responsive.css',
                 'pages/signin.css',
                 'custom.css'
             )
        );
    }
    function  index(){
      $this->data['main_content'] = 'login';
      $this->load->view('admin/layouts/Login',$this->data);
    }
    
    function auth(){
      $query = $this->membership_model->login();
    
    if($query){
       
         $session_data=array(      
                'username'=> $this->input->post('username'),
                'is_logged_in' =>true
            );
         $this->session->set_userdata($session_data);
         redirect('admin/home');
        }
    else{//user is not validated
        $this->logout();
       }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
?>
