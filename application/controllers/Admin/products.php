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
     $category_names = $this->CategoriesModel->get_category_list();
        if(!$category_names)
            $this->data['']='error';
        
        $this->data['main_content'] = 'products';
        $this->data['category_names']=$category_names;
        $this->load->view('admin/Layouts/template',$this->data);   
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
}