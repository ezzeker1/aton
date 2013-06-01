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
        $this->load->model('products_model');
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
        $this->table->set_heading('#', 'Title', 'Description', 'اسم ', 'تفصيل', 'Edit', 'Delete');
        $this->data['buttons'] = anchor('admin/' . $this->router->class . '/add', 'Add new application', 'class="btn btn-primary"');
        $this->data['h3'] = 'Applications managment';
        $this->data['tableTitle'] = 'Applications';
        $this->load->view('admin/layouts/table', $this->data);
    }

    function add() {
        $this->data['h3'] = 'Add new application';
        $this->data['controller_action'] = $this->data['form_action_button'] = 'add';
        $this->data['related_products'] = $this->products_model->get_product_list_2();

        $this->data['application'] = null;
        if ($this->validate()) {
            $data = array(
                'title_en' => $this->input->post('title_en'),
                'title_ar' => $this->input->post('title_ar'),
                'description_en' => $this->input->post('description_en'),
                'description_ar' => $this->input->post('description_ar'),
                'related_products' => $this->input->post('related_products'),
            );
            $id = $this->applications_model->save($data);
            if ($id) {
                if ($this->upload_photos($id))
                    $this->notify->set_message('Applicaton has been added succssfully', 'success');
                else {
                    $this->notify->set_message('Error occured while uploading application photos', 'error');
                }
            }
            else
                $this->notify->set_message('Error occured while adding aapplication', 'error');
            redirect('admin/applications');
        }
        $this->data['main_content'] = 'application_edit';
        $this->load->view('admin/layouts/template', $this->data);
    }

    function edit($id) {
        $this->data['h3'] = 'Add new application';
        $this->data['controller_action'] = $this->data['form_action_button'] = 'add';
        $this->data['related_products'] = $this->products_model->get_product_list_2();

        $this->data['application'] = null;
        if ($this->validate()) {
            $data = array(
                'title_en' => $this->input->post('title_en'),
                'title_ar' => $this->input->post('title_ar'),
                'description_en' => $this->input->post('description_en'),
                'description_ar' => $this->input->post('description_ar'),
                'related_products' => $this->input->post('related_products'),
            );
            $id = $this->applications_model->save($data,$id);
            if ($id) {
                if ($this->upload_photos($id))
                    $this->notify->set_message('Applicaton has been updated succssfully', 'success');
                else {
                    $this->notify->set_message('Error occured while uploading application photos', 'error');
                }
            }
            else
                $this->notify->set_message('Error occured while adding aapplication', 'error');
            redirect('admin/applications');
        }
        $this->data['main_content'] = 'application_edit';
        $this->load->view('admin/layouts/template', $this->data);
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
        $this->datatables->select('id,title_en,title_ar,description_en,description_ar')
                ->add_column('Edit', anchor('admin/' . $this->router->class . '/edit/$1', '<i class="btn-icon-only icon-pencil"></i>', 'class="btn btn-small"'), 'id')
                ->add_column('Delete', anchor('admin/' . $this->router->class . '/delete/$1', '<i class="btn-icon-only icon-remove "></i>', 'class="confirm-popup btn btn-small btn-warning"'), 'id')
                ->from('applications');

        echo $this->datatables->generate();
    }

    function validate() {
        $this->form_validation->set_rules('title_en', 'required', 'English title is required');
        $this->form_validation->set_rules('title_ar', 'required', 'Arabic title is required');
        $this->form_validation->set_rules('description_en', 'required', 'English description is required');
        $this->form_validation->set_rules('description_ar', 'required', 'Arabic description is required');
        return $this->form_validation->run();
    }

    function upload_photos($id) {

        $path = 'applications/' . $id;
        $folder_path = 'uploads/' . $path . '/thumbs';
        if (!is_dir($folder_path))
            mkdir($folder_path, '0777', TRUE);


        $sizes = $this->config->item('image_sizes');


        $smallPhoto = array($sizes['applications']['medium']);
        $largePhoto = array($sizes['applications']['large']);


        foreach ($_FILES['userfile'] as $key => $val) {
            $i = 1;
            foreach ($val as $v) {
                $field_name = "file_" . $i;
                $_FILES[$field_name][$key] = $v;
                $i++;
            }
        }
        unset($_FILES['userfile']);




        foreach ($_FILES as $field_name => $file) {
            $original = $this->_prep_upload($field_name, $file['name'], $smallPhoto, $largePhoto, $path);
        }
        if (is_string($original)) {
            return false;
        } else {
            return true;
        }
    }

    function _prep_upload($input_name, $photo_name, $smallPhoto, $largePhoto, $path) {

        $config[0] = array(
            'input_name' => $input_name,
            'file_name' => $photo_name,
            'path' => $path,
            'sizes' => $largePhoto
        );

        $config[1] = array(
            'input_name' => $input_name,
            'file_name' => $photo_name,
            'path' => $path . '/thumbs',
            'sizes' => $smallPhoto
        );
        $this->load->library('upload');
        return $this->upload->custom_upload_multi($config, true);
    }

}
