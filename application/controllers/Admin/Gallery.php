<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * @Author:Ahmed Samy
 * @Porject: ATON
 * @Date: 06/05/2013
 */

class Gallery extends Logged_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('gallery_model');
        $this->data = array(
            'title' => 'ATON | Admin panel | Gallery',
            'gallery_active' => true,
            'assets_js' => array_merge($this->assets_js, array(
                'plugins/hoverIntent/jquery.hoverIntent.minified.js',
                'plugins/lightbox/jquery.lightbox.min.js',
                'demo/gallery.js',
                'plugins/validate/jquery.validate.js',
                'demo/validation.js'
            )),
            'assets_css'=>array_merge($this->assets_css,array(
                '../js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css',
            ))
        );
    }

    function index() {
        $this->data['images']=$this->gallery_model->get_images();
        $this->data['main_content'] = 'gallery';
        $this->load->view('admin/layouts/template', $this->data);
    }

    function add() {
        $this->_upload();
    }

    function _delete() {
        $deleted = $this->gallery_model->delete($this->input->post('images_names'));
        if (!$deleted)
            $this->notify->set_message('Error occured while deleting the image', 'error');
        else
            $this->notify->set_message('Image has been deleted successfully', 'success');
        redirect('admin/gallery');
    }

    function _upload() {

        $sizes = $this->config->item('image_sizes');
        $config[0] = array(
            'input_name' => 'userfile',
            'file_name' => $this->input->post('caption'),
            'path' => 'gallery',
            'sizes' => array($sizes['gallery']['large'])
        );

        $config[1] = array(
            'input_name' => 'userfile',
            'file_name' => $this->input->post('caption'),
            'path' => 'gallery/thumbs',
            'sizes' => array($sizes['gallery']['medium'])
        );

        $this->load->library('upload');
        $original = $this->upload->custom_upload_multi($config, true);


        if (is_string($original))
            $this->notify->set_message($original, 'error');
        else
            $this->notify->set_message('Image has been added successfully', 'success');

        redirect('admin/gallery');
    }

}