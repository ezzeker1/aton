<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of products
 *
 * @author jason
 */
class Products extends Logged_controller {

    //Loading constructor
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('is_unique', 'Category name already exist');

        $this->load->model('categories_model');
        $this->load->model('products_model');
        $this->data = array(
            'title' => 'ATON | Admin panel | Products',
            'products_active' => true,
            'tinymce' => initialize_tinymce(300, 400),
            'assets_js' => array_merge($this->assets_js, array(
                'plugins/msgbox/jquery.msgbox.min.js'
            )),
        );
    }

    function index() {
        $this->table->set_heading('#', 'Name', 'Description', 'اسم ', 'تفصيل', 'Category', 'Edit', 'Delete');
        $this->data['buttons'] = anchor('admin/' . $this->router->class . '/add', 'Add new product', 'class="btn btn-primary"');
        $this->data['h3'] = 'Product managment';
        $this->data['tableTitle'] = 'Products';

        $this->load->view('admin/layouts/table', $this->data);
    }

    function add() {
        //Validating fields
        if ($this->validateUserInput()) {
            //Insert the data to database and return the recordID
            $recordId = $this->insert_record();
            if ($recordId) {
                $this->upload_picture($recordId);
                $this->upload_pdf($recordId);
                $this->notify->set_message('Product has been added successfully', 'success');
            }
            else
                $this->notify->set_message('Error occured while adding product', 'error');
            redirect('admin/products');
        }
        //set page data
        $this->data['widget_header'] = 'Add product';
        $this->data['form_action_button'] = 'Add';
        $this->data['controller_action'] = 'add';
        $this->data['product_info'] = NULL;
        $this->data['product_img_path'] = NULL;
        $this->loadform();
    }

    function edit($id) {

        //Validating fields
        if ($this->validateUserInput()) {
            //Insert the data to database and return the recordID
            $updated = $this->products_model->update_product($id, array(
                'category_id'=> $this->input->post('categoryNameSelect'),
                'name_en'=> $this->input->post('product_name_en'),
                'name_ar'=> $this->input->post('product_name_ar'),
                'description_en'=> $this->input->post('product_description_en'),
                'description_ar'=> $this->input->post('product_description_ar')
            ));

            if ($updated || isset($_FILES)) {
                $this->upload_picture($id);
                $this->upload_pdf($id);
                $this->notify->set_message('Product has been updated successfully', 'success');
            }
            else
                $this->notify->set_message('Error occured while updating product', 'error');
            redirect('admin/products');
        }

        $this->data['product_info'] = $this->products_model->get_product($id);
        $this->data['product_img'] = get_picture('uploads/products/small',$id);
        $this->data['widget_header'] = 'Edit product';
        $this->data['form_action_button'] = 'Save';
        $this->data['controller_action'] = 'edit/' . $id;

        $this->loadform();
    }

    /**
     * get_product_files scand the uploads/products/$product_id directory
     * to get all the files related to the product [product img, product pdf]
     * as per the specs of the projects only 1 pdf and 1 img should be uploaded
     * for each project.
     * 
     * @param Int $id product id.
     * @return array array of strings holding the file names or False incase of files not found.
     */
    function get_product_files($id) {
        $product_folder_path = './uploads/products/' . $id . '/';
        $directory_files = scandir($product_folder_path);
        $product_picture = $this->get_product_picture($directory_files);
        $product_pdf = $this->get_product_pdf($directory_files);
        $product_files = array('picture' => substr($product_folder_path, 2) . $product_picture,
            'pdf' => $product_folder_path . $product_pdf);
        return $product_files;
    }

    function loadform() {
        //Loading the page
        $category_names = $this->categories_model->get_category_list();
        $this->data['main_content'] = 'products';
        $this->data['category_names'] = $category_names;
        $this->load->view('admin/layouts/template', $this->data);
    }

    function delete($id) {
        if (isset($id)) {
            if (!$this->products_model->delete_product($id))
                $this->notify->set_message('Error has been occured while deleting product', 'error');
            else
                $this->notify->set_message('Product #' . $id . 'has been deleted successfully', 'success');
        }
        redirect('admin/products');
    }

    function insert_record() {
        $payload['category_id'] = $this->input->post('categoryNameSelect');
        $payload['name_en'] = $this->input->post('product_name_en');
        $payload['name_ar'] = $this->input->post('product_name_ar');
        $payload['description_en'] = $this->input->post('product_description_en');
        $payload['description_ar'] = $this->input->post('product_description_ar');
        return $this->products_model->create_product($payload);
    }

    function upload_picture($recordId) {
        //configuring upload
        if(!isset($_FILES))
            return false;
        
        $sizes = $this->config->item('image_sizes');
        $image_group = 'products';
        $config[0] = array(
            'input_name' => 'product_picture',
            'file_name' => $recordId,
            'path' => $image_group . '/large',
            'sizes' => array($sizes[$image_group]['large'])
        );

        $config[1] = array(
            'input_name' => 'product_picture',
            'file_name' => $recordId,
            'path' => $image_group . '/medium',
            'sizes' => array($sizes[$image_group]['medium'])
        );
        $config[2] = array(
            'input_name' => 'product_picture',
            'file_name' => $recordId,
            'path' => $image_group . '/small',
            'sizes' => array($sizes[$image_group]['small'])
        );

        $this->load->library('upload');
        $original = $this->upload->custom_upload_multi($config, true);
        if (is_string($original))
            return false;
        else
            return true;
    }

    function upload_pdf($recordId) {
        //configuring upload
        $config['upload_path'] = './uploads/products/pdf/';
//        $config['upload_path'] = realpath( APPPATH.'../uploads//' . $recordId);
        $config['allowed_types'] = 'pdf';
        $config['input_name'] = 'product_pdf';
        $config['file_name'] = $recordId;
        $this->upload->initialize ($config);

 
        

        unset($_FILES['product_picture']);



        $uploadResult = $this->upload->do_upload('product_pdf');
//        var_dump($_FILES);
//        var_dump($this->upload->display_errors());
//        echo '<pre>';
//        print_r($this->upload);
//        echo '</pre>';
//        die;
        if ($uploadResult) {
            return FALSE;
        }
        return TRUE;
    }

    function datatable() {
        $this->datatables->select('products.id,products.name_en,products.name_ar,products.description_en,products.description_ar,categories.id as cat_id,categories.name_en as cat_name')
                ->join('categories', 'categories.id=products.category_id')
                ->unset_column('cat_id')
                ->add_column('Edit', anchor('admin/' . $this->router->class . '/edit/$1', '<i class="btn-icon-only icon-pencil"></i>', 'class="btn btn-small"'), 'products.id')
                ->add_column('Delete', anchor('admin/' . $this->router->class . '/delete/$1', '<i class="btn-icon-only icon-remove"></i>', 'class="confirm-popup btn btn-small btn-warning"'), 'products.id')
                ->from('products');
        echo $this->datatables->generate();
    }

    function validateUserInput() {
        $this->form_validation->set_rules('product_name_ar', 'Arabic category name', 'required');
        $this->form_validation->set_rules('product_description_ar', 'required');

        $this->form_validation->set_rules('categoryNameSelect', 'English category name', 'required');
        $this->form_validation->set_rules('product_name_en', 'English product name', 'required');
        $this->form_validation->set_rules('product_description_en', 'required');

        return ($this->form_validation->run());
    }

}