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
        
        $this->load->model('categories_model');
        $this->load->model('products_model');
        $this->data=array(
            'title'=>'ATON | Admin panel | Products',
            'products_active'=>true,
            'tinymce'=>initialize_tinymce(300,400),
            'assets_js'=>  array_merge($this->assets_js, array(
                'plugins/msgbox/jquery.msgbox.min.js'
            )),
        );
    }
    function index()
    {
        $this->table->set_heading('#','Name','Description','اسم ','تفصيل','Image','Edit','Delete');
        $this->data['buttons']=  anchor('admin/'.$this->router->class.'/add','Add new product', 'class="btn btn-primary"');
        $this->data['h3']='Product managment';
        $this->data['tableTitle']='Products';
        
        $this->load->view('admin/layouts/table',$this->data);
    }
    
    function add()
    {
   
        //Validating fields
        if($this->validateUserInput()){
          //Insert the data to database and return the recordID
            $recordId=$this->insert_record();
            if($recordId){
              $this->createFilesFolder($recordId);
              $this->upload_picture($recordId);
              $this->upload_pdf($recordId);
              $this->notify->set_message('Product has been added successfully','success');
          }    
          else
               $this->notify->set_message('Error occured while adding product','error');
             redirect('admin/products');
        }

        
        //Loading the page
     $category_names = $this->categories_model->get_category_list();
        if(!$category_names)
            $this->data['']='error';
        
        $this->data['main_content'] = 'products';
        $this->data['category_names']=$category_names;
        $this->load->view('admin/layouts/template',$this->data);   
    }
    function loadform($data){
        
    }
    function delete($id){
      if(isset($id)){
            if(!$this->products_model->delete_product($id))
                $this->notify->set_message('Error has been occured while deleting product','error');
            else
                $this->notify->set_message('Product #'.$id.'has been deleted successfully','success');
       }
       redirect('admin/products');
    }
            
    function insert_record(){
        $payload['category_id'] =$this->input->post('categoryNameSelect');
        $payload['name_en']=$this->input->post('product_name_en');
        $payload['name_ar']=$this->input->post('product_name_ar');
        $payload['description_en']=$this->input->post('product_description_en');
        $payload['description_ar']=$this->input->post('product_description_ar');
        
        
       return  $this->products_model->create_product($payload);
        
    }
    function upload_picture($recordId){
        //configuring upload
        $config['upload_path'] = './uploads/products/'.$recordId.'/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']    = '5000';
        $config['max_width']  = '9999';
        $config['max_height']  = '9999';
        $config['input_name'] = 'product_picture';
        
        
        $this->load->library('upload', $config);
        //incase of failed upload 
        if ( ! $this->upload->do_upload('product_picture'))
        {
            return FALSE;
        }
        return TRUE;
    }
    function upload_pdf($recordId){
        //configuring upload
        $config['upload_path'] = './uploads/products/'.$recordId.'/';
        $config['allowed_types'] = 'pdf';
//        $config['max_size']    = '5000';
//        $config['max_width']  = '9999';
//        $config['max_height']  = '9999';
        $config['input_name'] = 'product_pdf';
        
        
        $this->load->library('upload', $config);
        //incase of failed upload 
        $uploadResult = $this->upload->do_upload('product_pdf');
        if ( $uploadResult )
        {
            return FALSE;
        }
        return TRUE;
    }
    function createFilesFolder($id){
        $permissions='755';
        return  mkdir('./uploads/products/'.$id,$permissions);
    }
    function datatable()
    {
        $this->datatables->select('products.id,products.name_en,products.name_ar,products.description_en,products.description_ar,categories.id as cat_id')
                ->join('categories','categories.id=products.category_id')
        ->add_column('Edit',anchor('admin/'.$this->router->class.'/edit/$1', '<i class="btn-icon-only icon-pencil"></i>','class="btn btn-small"'),'products.id')
        ->add_column('Delete',anchor('admin/'.$this->router->class.'/delete/$1', '<i class="btn-icon-only icon-remove"></i>','class="confirm-popup btn btn-small btn-warning"'),'products.id')
        ->from('products');
        
        echo $this->datatables->generate();
    }
    
    function validateUserInput(){
        //Validate for arabic fields
//      $this->form_validation->set_rules('$category_name_ar','Category name','required');
        $this->form_validation->set_rules('product_name_ar','Arabic category name','required');
        $this->form_validation->set_rules('product_description_ar','required');
        //Validate English fields
        $this->form_validation->set_rules('categoryNameSelect','English category name','required');
        $this->form_validation->set_rules('product_name_en','English product name','required');
        $this->form_validation->set_rules('product_description_en','required');
        //Validatin file uploads
//        $this->form_validation->set_rules('product_picture','Product picture','required');
////        $this->form_validation->set_rules('product_pdf','Product pdf','required');
//        
        return ($this->form_validation->run());
    }
}