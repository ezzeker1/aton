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
            'title'=>'ATON | Admin panel | Products',
             'tinymce'=>initialize_tinymce(300,400)
        );
    }
    function index()
    {
        $this->table->set_heading('#','Name','Description','اسم ','تفصيل','Image','Edit','Delete');
        $this->data['buttons']=  anchor('admin/'.$this->router->class.'/add','Add new product', 'class="btn btn-primary"');
        $this->data['h3']='Product managment';
        $this->data['tableTitle']='Products';
        $this->data['assets_js']=  array_merge($this->assets_js, array(
                'plugins/jquery.dataTables.min.js'
            ));
        $this->load->view('admin/Layouts/table',$this->data);
    }
    function add()
    {
        //Validating fields
//        if($this->form_validation->run()){
            $this->upload_picture(01); 
//        }
        
        //Loading the page
     $category_names = $this->CategoriesModel->get_category_list();
        if(!$category_names)
            $this->data['']='error';
        
//        $this->data['main_content'] = 'products';
//        $this->data['category_names']=$category_names;
//        $this->load->view('admin/Layouts/template',$this->data);   
    }
    function upload_picture($id){
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']    = '5000';
        $config['max_width']  = '9999';
        $config['max_height']  = '9999';
        $config['input_name'] = 'product_picture';
        
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('product_picture'))
        {
            //var_dump($this->upload);
           // redirect('admin/login/logout');
        }
          var_dump($this->upload->data());
        
		
//        
//         $original=$this->upload_model->custom_upload_multi($config,true);
//         if(is_string($original))
//            $this->notify->set_message($original,'error');
//        else
//            $this->notify->set_message('Picture(s) has been uploaded ','success');
//        redirect('admin/gallery');
    }
    
    
    function datatable()
    {
        $this->datatables->select('products.id,products.name_en,products.name_ar,products.description_en,products.description_ar,categories.id as cat_id')
                ->join('categories','categories.id=products.category_id')
        ->add_column('Edit',anchor('admin/'.$this->router->method.'/edit/$1', '<i class="btn-icon-only icon-pencil"></i>','class="btn btn-small"'),'id')
        ->add_column('Delete',anchor('/'.$this->router->method.'/delete/$1', '<i class="btn-icon-only icon-remove"></i>','class="btn btn-small btn-warning"'),'id')
        ->from('products');
        
        echo $this->datatables->generate();
    }
    
    function validateUserInput(){
        //Validate for arabic fields
      //$this->form_validation->set_rules('$category_name_ar','Category name','required');
        $this->form_validation->set_rules('product_name_ar','required');
//        $this->form_validation->set_rules('product_description_ar','required');
        //Validate English fields
        $this->form_validation->set_rules('$category_name_en','Category name','required');
        $this->form_validation->set_rules('product_name_en','required');
//        $this->form_validation->set_rules('product_description_en','required');
        //Validatin file uploads
        $this->form_validation->set_rules('product_picture','required');
        $this->form_validation->set_rules('product_pdf','required');
        
        return ($this->form_validation->run());
    }
}