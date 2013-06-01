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
        $this->table->set_heading('#', 'Name', 'Description', 'اسم ', 'تفصيل', 'Image', 'Edit', 'Delete');
        $this->data['buttons'] = anchor('admin/' . $this->router->class . '/add', 'Add new product', 'class="btn btn-primary"');
        $this->data['h3'] = 'Product managment';
        $this->data['tableTitle'] = 'Products';

        $this->load->view('admin/layouts/table', $this->data);
    }

    function add() {
        //Validating fields
        if ($this->validateUserInput()) {
            //Insert the data to database and return the recordID
            var_dump($_FILES);
            $recordId = $this->insert_record();
            if ($recordId) {
                $this->createFilesFolder($recordId);
                $this->upload_picture($recordId);
                $this->upload_pdf($recordId);
                $this->notify->set_message('Product has been added successfully', 'success');
            }
//            else
//                $this->notify->set_message('Error occured while adding product', 'error');
//            redirect('admin/products');
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
        $this->clean_pdf($id);
        $product_data = $this->products_model->get_product($id);
        $category_information = $this->categories_model->get_category($product_data[0]->category_id);
        $product_files = $this->get_product_files($id);
        $this->data['product_img_path'] = $product_files['picture'];
        $this->data['product_pdf_path'] = $product_files['pdf'];
        $this->data['categoryname_ar'] = $category_information[0]->name_ar;
        $this->data['categoryname_en'] = $category_information[0]->name_en;
        $this->data['category_value'] = $category_information[0]->id;
        $this->data['product_info'] = $product_data[0];
        $this->data['widget_header'] = 'Edit product';
        $this->data['form_action_button'] = 'Edit';
        $this->data['controller_action'] = 'do_edit/' . $id;

        $this->loadform();
    }

    function do_edit($id) {
        $payload['category_id'] = $this->input->post('categoryNameSelect');
        $payload['name_en'] = $this->input->post('product_name_en');
        $payload['name_ar'] = $this->input->post('product_name_ar');
        $payload['description_en'] = $this->input->post('product_description_en');
        $payload['description_ar'] = $this->input->post('product_description_ar');
        //should check for the return value of the update function if false redirect to error page
        $this->products_model->update_product($id, $payload);
        redirect('/admin/products');
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

    /**
     * get_product_pdf is for getting pdf file of the specified product
     * @param array $directory_files array of files names in the upload folder that corresponds to that product.
     * @return object string representing filename or false incase of file not found.
     */
    function get_product_pdf($directory_files) {
        foreach ($directory_files as $file) {
            if ($this->end_with($file, 'pdf')) {
                return $file;
            }
        }
        return FALSE;
    }

    /**
     * get_product_picture  is for getting img file of the specified product
     * function search for three extensions [gif - jpg - png] so any img file with extension other than 
     * these three will be ignored.
     * @param array $directory_files array of files names in the upload folder that corresponds to that product.
     * @return object string representing filename or false incase of file not found.
     */
    function get_product_picture($directory_files) {
        foreach ($directory_files as $file) {
            if ($this->end_with($file, 'gif') || $this->end_with($file, 'jpg') || $this->end_with($file, 'png')) {
                return $file;
            }
        }
        return FALSE;
    }

    /**
     * end_with function is for checking the file extension wither the file ends with the desired pattern or not
     * @param String $str string representing filename.ext 
     * @param String $pattern string representing file extension we want to check for.
     */
    function end_with($str, $pattern) {
        if (strlen($str) > strlen($pattern)) {
            $file_ext = substr($str, (strlen($pattern) * -1));
            if ($file_ext == $pattern) {
                return $str;
            }
        }
        return FALSE;
    }

    function loadform() {
        //Loading the page
        $category_names = $this->categories_model->get_category_list();
        if (!$category_names)
            $this->data[''] = 'error';
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

    /**
     * 
     * clean_picture delete the current product img in order to upload new one
     * @param string $product_id id of the traget product
     * @return boolean true in cese of successful deletion and false in case of error or file not found.
     */
    function clean_picture($product_id) {
        $product_files = $this->get_product_files($product_id);
        $product_img = $product_files['picture'];
        if ($product_img) {
            unlink($product_img);
            return TRUE;
        }
        return false;
    }

    /**
     * 
     * clean_pdf delete the current product pdf in order to upload new one
     * @param string $product_id id of the traget product
     * @return boolean true in cese of successful deletion and false in case of error or file not found.
     */
    function clean_pdf($product_id) {
        $product_files = $this->get_product_files($product_id);
        $product_pdf = $product_files['pdf'];
        if ($product_pdf) {
            unlink($product_pdf);
            return TRUE;
        }
        return false;
    }

    /**
     * remove_product_folder remove the product folder where related files [images, pdf] are saved.
     * function should be called only when deleting the product
     * 
     * @param string $product_id id of the product that will be deleted
     * @return bool return  bool true in case of success false in case of failure.
     */
    function remove_product_folder($product_id) {
        $base_product_path = './uploads/products/' . $product_id . '/';
        return rmdir($base_product_path);
    }

    function upload_picture($recordId) {
        //configuring upload
        $config['upload_path'] = './uploads/products/' . $recordId . '/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5000';
        $config['max_width'] = '9999';
        $config['max_height'] = '9999';
        $config['input_name'] = 'product_picture';
        $config['file_name'] = $recordId;
        $this->load->library('upload', $config);
        //incase of failed upload 
        if (!$this->upload->do_upload('product_picture')) {
            return FALSE;
        }
        return TRUE;
    }

    function upload_pdf($recordId) {
        //configuring upload
        $config['upload_path'] = './uploads/products/' . $recordId . '/';
        $config['allowed_types'] = 'pdf';
        $config['input_name'] = 'product_pdf';
        $config['file_name'] = $recordId;
        $this->load->library('upload', $config);
        //incase of failed upload 
        $uploadResult = $this->upload->do_upload('product_pdf');
        var_dump($this->upload->display_errors());
        if ($uploadResult) {
            return FALSE;
        }
        return TRUE;
    }

    function createFilesFolder($id) {
        $permissions = '755';
        return mkdir('./uploads/products/' . $id, $permissions);
    }

    function datatable() {
        $this->datatables->select('products.id,products.name_en,products.name_ar,products.description_en,products.description_ar,categories.id as cat_id')
                ->join('categories', 'categories.id=products.category_id')
                ->add_column('Edit', anchor('admin/' . $this->router->class . '/edit/$1', '<i class="btn-icon-only icon-pencil"></i>', 'class="btn btn-small"'), 'products.id')
                ->add_column('Delete', anchor('admin/' . $this->router->class . '/delete/$1', '<i class="btn-icon-only icon-remove"></i>', 'class="confirm-popup btn btn-small btn-warning"'), 'products.id')
                ->from('products');
        echo $this->datatables->generate();
    }

    function validateUserInput() {
        //Validate for arabic fields
//      $this->form_validation->set_rules('$category_name_ar','Category name','required');
        $this->form_validation->set_rules('product_name_ar', 'Arabic category name', 'required');
        $this->form_validation->set_rules('product_description_ar', 'required');
        //Validate English fields
        $this->form_validation->set_rules('categoryNameSelect', 'English category name', 'required');
        $this->form_validation->set_rules('product_name_en', 'English product name', 'required');
        $this->form_validation->set_rules('product_description_en', 'required');
        //Validatin file uploads
//        $this->form_validation->set_rules('product_picture','Product picture','required');
//        $this->form_validation->set_rules('product_pdf','Product pdf','required');
        return ($this->form_validation->run());
    }

}