<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of products
 *
 * @author jason
 */
class Products extends Logged_controller{
    //Loading constructor
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('is_unique','Category name already exist');
        //Temp usage of the General Crud to get the category data
        $this->load->model('CategoriesModel');
        $this->data=array(
            'title'=>'ATON | Admin panel | Products'
        );
    }
    
    function index()
    {
     $category_names = $this->CategoriesModel->get_category_list();
        if(!$category_names)
            $this->data['']='error';
        
        $this->data['main_content'] = 'products';
        $this->data['category_names']=$category_names;
        $this->load->view('Admin/Layouts/template',$this->data);   
    }
}