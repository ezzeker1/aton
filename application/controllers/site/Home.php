<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Ahmed Samy
 */
class Home extends FrontController{
    
    public function __construct() {
        parent::__construct();
    }
    function index()
    {
        $this->data['main_content']='home';
        $this->load->view('site/layouts/general',$this->data);
    }
    function load_page($page)
    {
        $this->load->model('PagesModel');
        $this->data['main_content']='about';
        $this->load->view('site/layouts/inner',$this->data);
    }
}
    