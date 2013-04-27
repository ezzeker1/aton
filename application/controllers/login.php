<?php
class Login extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('membership_model');
    }
    
    function  index(){
      $data['main_content'] = 'template/login.html'  ;
      $data['load_footer'] = FALSE;
      $this->load->view('template/template',$data);
    }
    
    function auth(){
    $query = $this->membership_model->login();
    if($query){
        echo 'Ya ahlan ya pringy';
        $session_data=array(      
                'username'=> $this->input->post('username'),
                'is_logged_in' =>true
            );
         $this->session->set_userdata($session_data);
    }
    
    else{//user is not validated
        echo 'yalla yaa';
       }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('/login');
    }
}
?>
