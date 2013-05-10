<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
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
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('CategoriesModel');
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('is_unique','Category name already exist');
        $this->data=array(
            'title'=>'ATON | Admin panel | Categories',
            'assets_js'=>  array_merge($this->assets_js, array(
                'plugins/hoverIntent/jquery.hoverIntent.minified.js',
                'plugins/lightbox/jquery.lightbox.min.js',
                'demo/gallery.js',
            ))
        );
        
    }
    function index(){
        $this->data['main_content'] = 'Categories'  ;
        $this->load->view('Admin/Layouts/template',$this->data);
    }
    
    function add_category(){
        //Validate user input
        if($this->validate_user_input()==false){
            //Validation Failed
            $this->index();
        }
        else{
            //Validation Successful
        $name_ar= $this->input->post('category_name_ar');
        $name_en= $this->input->post('category_name_en');
        $description_ar=$this->input->post('category_description_ar');
        $description_en=$this->input->post('category_description_en');
        /**
         * Should change after we agree on the Crud design to hold multi lang
         * Data
         */
        $payload=array('name_ar'=>$name_ar,
            'name_en'=>$name_en,
            'description_ar'=>$description_ar,
            'description_en'=>$description_en);
        $this->CategoriesModel->create_category($payload);
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
        $this->form_validation->set_rules('category_name_ar','Category Name','required|is_unique[categories.name_ar]');
        $this->form_validation->set_rules('category_name_en','Category Name','required|is_unique[categories.name_en]');
        
        return ($this->form_validation->run());
        
    }
}
