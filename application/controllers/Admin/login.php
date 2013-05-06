<?php
class Login extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('membership_model');
    }
    
    function  index(){
      $data['main_content'] = 'Admin/template/login'  ;
      $this->load->view('Admin/Layouts/Login',$data);
    }
    
    function auth(){
      $query = $this->membership_model->login();
    
    if($query){
       
         $session_data=array(      
                'username'=> $this->input->post('username'),
                'is_logged_in' =>true
            );
         $this->session->set_userdata($session_data);
         redirect('Admin/home');
        }
    else{//user is not validated
        $this->logout();
       }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('Admin/login');
    }
}
?>
