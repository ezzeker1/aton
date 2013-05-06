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
class Categories extends CI_Controller{
    //put your code here
    private $table_name;
      function __construct() {
        parent::__construct();
        $this->load->model('GenericCRUD');
        $this->table_name='categories';
    }
    function index(){
        $data['main_content'] = 'Admin/template/Categories'  ;
        $this->load->view('Admin/Layouts/template',$data);
    }
    
    function add_category(){
        $name= $this->input->post('category_name');
        $description=$this->input->post('category_description');
        echo $name;
        echo $description;
        $payload=array('name'=>$name,
            'description'=>$description);
        $this->GenericCRUD->create($this->table_name,$payload);
       redirect($base_url+'Admin/Categories');
    }
}

?>
