<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * @Author:Ahmed Samy
 * @Porject: ATON
 * @Date: 09/05/2013
 */

class Pages extends Logged_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pages_model');
        $this->data = array(
            'title' => 'ATON | Admin panel | Pages | ' . $this->uri->segment(3),
            'pages_active' => true,
            'assets_js' => array_merge($this->assets_js, array(
                'plugins/hoverIntent/jquery.hoverIntent.minified.js',
                'plugins/lightbox/jquery.lightbox.min.js',
                'demo/gallery.js',
                'plugins/validate/jquery.validate.js',
                'demo/validation.js'
            )),
            'tinymce' => initialize_tinymce()
        );
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title_en','required','Title is required');
        $this->form_validation->set_rules('title_ar','required','content is required');
        $this->form_validation->set_rules('content_en','required','Arabic title is required');
        $this->form_validation->set_rules('content_ar','required','Arabic content is required');
    }

    function edit($page) {
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'title_en' => $this->input->post('title_en'),
                'title_ar' => $this->input->post('title_ar'),
                'content_en' => $this->input->post('content_en'),
                'content_ar' => $this->input->post('content_ar'),
            );
            $page=$this->input->post('page_name');
            if (!$this->pages_model->update($page, $data))
                $this->notify->set_message('Error occured while updating the '.$data['title_en'], 'error');
            else
                $this->notify->set_message('Page has been updated successfully'.$data['title_en'], 'success');

//            var_dump($_POST);
            redirect('admin/pages/'.$page );
        }
        $this->data['h3'] = $page;
        $this->data['page'] = $this->pages_model->get($page);
        $this->data['main_content'] = 'PageEdit';
        $this->load->view('admin/layouts/template', $this->data);
    }

}