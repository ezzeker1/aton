<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @author Ahmed Samy
 */
class Applications extends Logged_controller {

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->model('applications_model');
        $this->form_validation->set_message('required', '*');
        $this->form_validation->set_message('is_unique', 'Category name already exist');
        $this->data = array(
            'title' => 'ATON | Admin panel | Applications',
            'applications_active' => true,
            'assets_js' => array_merge($this->assets_js, array(
                'plugins/hoverIntent/jquery.hoverIntent.minified.js',
                'plugins/lightbox/jquery.lightbox.min.js',
                'plugins/msgbox/jquery.msgbox.min.js'
            )),
            'tinymce' => initialize_tinymce(300, 400)
        );
    }

    function index() {
        $this->table->set_heading('#', 'Title', 'Description', 'اسم ', 'تفصيل', 'Images', 'Related products', 'Edit', 'Delete');
        $this->data['buttons'] = anchor('admin/' . $this->router->class . '/add', 'Add new application', 'class="btn btn-primary"');
        $this->data['h3'] = 'Applications managment';
        $this->data['tableTitle'] = 'Applications';
        $this->load->view('admin/layouts/table', $this->data);
    }

    function add() {
        $this->data['h3'] = 'Add new application';
        $this->data['controller_action'] = $this->data['form_action_button'] = 'add';

        $this->data['application'] = null;
        if ($this->validate()) {
            $data = array(
                'title_en' => $this->input->post('title_en'),
                'title_ar' => $this->input->post('title_ar'),
                'description_en' => $this->input->post('description_en'),
                'description_ar' => $this->input->post('description_ar')
            );
            if ($this->applications_model->add($data))
                $this->notify->set_message('Applicaton has been added succssfully', 'success');
            else
                $this->notify->set_message('Error occured while adding aapplication', 'error');
        }
        $this->data['main_content'] = 'application_edit';
        $this->load->view('admin/layouts/template', $this->data);
    }

    function edit($id) {
        $this->data['controller_action'] = 'edit/' . $id;
        $this->data['form_action_button'] = 'Save';
    }

    function delete($id) {
        if (isset($id)) {
            if (!$this->applications_model->delete($id))
                $this->notify->set_message('Error has been occured while deleting  application', 'error');
            else
                $this->notify->set_message('Application#' . $id . ' has been deleted successfully', 'success');
        }
        redirect('admin/applications');
    }

    function datatable() {
        $this->datatables->select('id,title_en,title_ar,description_en,description_ar,related_products')
                ->add_column('Edit', anchor('admin/' . $this->router->class . '/edit/$1', '<i class="btn-icon-only icon-pencil"></i>', 'class="btn btn-small"'), 'id')
                ->add_column('Delete', anchor('admin/' . $this->router->class . '/delete/$1', '<i class="btn-icon-only icon-remove "></i>', 'class="confirm-popup btn btn-small btn-warning"'), 'id')
                ->from('applications');

        echo $this->datatables->generate();
    }

    function validate() {
        $this->form_validation->set_rules('title_en', 'required', 'English title is required');
        $this->form_validation->set_rules('title_ar', 'required', 'Arabic title is required');
        $this->form_validation->set_rules('description_en', 'required', 'English description is required');
        $this->form_validation->set_rules('description_ar', 'required', 'English description is required');
        return $this->form_validation->run();
    }

}
