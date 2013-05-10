<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of products
 *
 * @author jason
 */
class products extends Logged_controller{
    //Loading constructor
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('is_unique','Category name already exist');
        //Temp usage of the General Crud to get the category data
        $this->load->model('CategoriesModel');
    }
    
    function index(){
     $category_names = $this->CategoriesModel->get_category_names();
    if($category_names !=FALSE){
     $data['main_content'] = 'products';
     $data['category_names']=$category_names;
     $this->load->view('Admin/Layouts/template',$data);   
    }
    else{
        /**
         * In case of no category names were found we have to view 
         * Error message since user has to list products under category name
         */
    }
    }
    
}

?>
