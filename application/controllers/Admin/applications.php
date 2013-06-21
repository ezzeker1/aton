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
                $this->upload_pdf($id);
                $this->notify->set_message('Applicaton has been added succssfully, you can add photos now', 'success');
            }
            else
                $this->notify->set_message('Error occured while adding aapplication', 'error');
            redirect('admin/applications/edit/' . $id);
        }
        $this->data['main_content'] = 'application_edit';
        $this->load->view('admin/layouts/template', $this->data);
    }

    function edit($id) {
        $this->data['h3'] = 'Add new application';
        $this->data['controller_action'] = 'edit/' . $id;
        $this->data['form_action_button'] = 'Save';
        $this->data['related_products'] = $this->products_model->get_product_list_2();
        $this->data['checked_products'] = $this->prep_checked_products($this->applications_model->get_related_products($id));
        $data['id'] = $id;
        $this->set_widget($data, $id);

        $this->data['application'] = $this->applications_model->get_one($id);
        if ($this->validate()) {
            $data = array(
                'title_en' => $this->input->post('title_en'),
                'title_ar' => $this->input->post('title_ar'),
                'description_en' => $this->input->post('description_en'),
                'description_ar' => $this->input->post('description_ar'),
                'related_products' => $this->input->post('related_products'),
            );

            $saved = $this->applications_model->save($data, $id);
            if ($saved) {
                $this->upload_pdf($id);
                $this->notify->set_message('Application has been updated successfully', 'success');
            }
            else
                $this->notify->set_message('Error occured while adding application', 'error');
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

    function prep_checked_products($array) {
        $data = array();
        foreach ($array as $obj) {
            $data[] = $obj->id;
        }
        return $data;
    }

    function set_widget($data, $id) {
        $this->load->model('gallery_model');
        $data['images'] = $this->gallery_model->get_images(false, 'applications/' . $id);
        $this->widgets->set('application', $data);
    }

    function upload_pdf($recordId) {
        //configuring upload
        $config['upload_path'] = './uploads/applications/'.$recordId.'/pdf';
        $config['allowed_types'] = 'pdf';
        $config['input_name'] = 'product_pdf';
        $config['file_name'] = $recordId;
        $this->load->library('upload',$config);

        $uploadResult = $this->upload->do_upload('application_pdf');

        if ($uploadResult) {
            return FALSE;
        }
        return TRUE;
    }

}
