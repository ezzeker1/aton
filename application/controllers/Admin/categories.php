<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Categories
 *
 * @author jason
 */
class Categories extends Logged_controller {

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('categories_model');
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('is_unique', 'Category name already exist');
        $this->data = array(
            'title' => 'ATON | Admin panel | Categories',
            'products_active' => true,
            'assets_js' => array_merge($this->assets_js, array(
                'plugins/hoverIntent/jquery.hoverIntent.minified.js',
                'plugins/lightbox/jquery.lightbox.min.js',
                'plugins/msgbox/jquery.msgbox.min.js'
            )),
            'tinymce' => initialize_tinymce(300, 400)
        );
    }

    function index() {

        $this->table->set_heading('#', 'Name', 'Description', 'اسم ', 'تفصيل', 'Edit', 'Delete');
        $this->data['buttons'] = anchor('admin/categories/add', 'Add new category', 'class="btn btn-primary"');
        $this->data['h3'] = 'Category managment';
        $this->data['tableTitle'] = 'Categories';
        $this->load->view('admin/layouts/table', $this->data);
    }

    function add() {
        //Validate user input
        if ($this->validate_user_input() == true) {
            //Validation Successful
            $name_ar = $this->input->post('category_name_ar');
            $name_en = $this->input->post('category_name_en');
            $description_ar = $this->input->post('category_description_ar');
            $description_en = $this->input->post('category_description_en');
            /**
             * Should change after we agree on the Crud design to hold multi lang
             * Data
             */
            $payload = array(
                'name_ar' => $name_ar,
                'name_en' => $name_en,
                'description_ar' => $description_ar,
                'description_en' => $description_en);
            $added = $this->categories_model->create_category($payload);
            if (!$added)
                $this->notify->set_message('Error has been occured while adding category', 'error');
            else
                $this->notify->set_message('Category has been added successfully', 'success');
            redirect('admin/categories');
        }
        $this->data['category_info'] = null;
        $this->data['action_label'] = 'Add';
        $this->data['main_content'] = 'categories';
        $this->data['controller_action'] = 'add';
        $this->load->view('admin/layouts/template', $this->data);
    }


    function edit($id) {
        if (isset($id)) {
            //Validate user input
            if ($this->validate_user_input() == true) {
                //Validation Successful
                $name_ar = $this->input->post('category_name_ar');
                $name_en = $this->input->post('category_name_en');
                $description_ar = $this->input->post('category_description_ar');
                $description_en = $this->input->post('category_description_en');
                /**
                 * Should change after we agree on the Crud design to hold multi lang
                 * Data
                 */
                $payload = array('name_ar' => $name_ar,
                    'name_en' => $name_en,
                    'description_ar' => $description_ar,
                    'description_en' => $description_en);
                $added = $this->categories_model->update_category($id, $payload);
                if (!$added)
                    $this->notify->set_message('Error has been occured while adding category', 'error');
                else
                    $this->notify->set_message('Category has been edited successfully', 'success');
                redirect('admin/categories');
            }
            $category_info = $this->categories_model->get_category($id);
            $this->data['category_info'] = $category_info[0];
            $this->data['controller_action'] = 'edit/' . $id;
            $this->data['action_label'] = 'Save';
            $this->data['main_content'] = 'categories';
            $this->load->view('admin/layouts/template', $this->data);
        }
    }

    function delete($id) {
        if (isset($id)) {
            if (!$this->categories_model->delete_category($id))
                $this->notify->set_message('Error has been occured while deleting  category', 'error');
            else
                $this->notify->set_message('Category#' . $id . ' has been deleted successfully', 'success');
        }
        redirect('admin/categories');
    }

    //validating user input
    //@Return Validation results
    function validate_user_input() {

        //Form validation Rules
        //Category name must be unique and it is required.
        //Category description is not required and is not unique.
        $this->form_validation->set_rules('category_name_ar', 'Category Name', 'required');
        $this->form_validation->set_rules('category_name_en', 'Category Name', 'required');

        return ($this->form_validation->run());
    }

    function datatable() {
        $this->datatables->select('id,name_en,description_en,name_ar,description_ar')
                ->add_column('Edit', anchor('admin/' . $this->router->class . '/edit/$1', '<i class="btn-icon-only icon-pencil"></i>', 'class="btn btn-small"'), 'id')
                ->add_column('Delete', anchor('admin/' . $this->router->class . '/delete/$1', '<i class="btn-icon-only icon-remove "></i>', 'class="confirm-popup btn btn-small btn-warning"'), 'id')
                ->from('categories');

        echo $this->datatables->generate();
    }

}
