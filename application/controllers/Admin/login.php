<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends Logged_controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('membership_model');
        $this->data=array(
             'title'=>'ATON | Admin panel | Login',
             'assets_js'=>  array_merge($this->assets_js,array(
                'signin.js'
             )),
             'assets_css'=> array_merge($this->assets_css,array(
                 'pages/signin.css'
             ))
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
