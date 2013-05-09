<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categories
 *
 * @author jason
 */
class Categories extends Logged_controller{
    //put your code here
    private $table_name;
    
      function __construct() {
        parent::__construct();
        $this->load->model('GenericCRUD');
        $this->table_name='categories';
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('is_unique','Category name already exist');
        
    }
    function index(){
        $data['main_content'] = 'Categories'  ;
        $this->load->view('Admin/Layouts/template',$data);
    }
    
    function add_category(){
        //Validate user input
        if($this->validate_user_input()==false){
            //Validation Failed
            $this->index();
        }
        else{
            //Validation Successful
        $name= $this->input->post('category_name');
        $description=$this->input->post('category_description');
        /**
         * Should change after we agree on the Crud design to hold multi lang
         * Data
         */
        $payload=array('name'=>$name,
            'description'=>$description);
        $this->GenericCRUD->create($this->table_name,$payload);
       //============================================================
        redirect('Admin/Categories');
        }
    }
    //validating user input
    //@Return Validation results
    function validate_user_input(){
        
        //Form validation Rules
        //Category name must be unique and it is required.
        //Category description is not required and is not unique.
        $this->form_validation->set_rules('category_name','Category Name','required|is_unique[categories.name]');
        return ($this->form_validation->run());
        
    }
    
    
}
