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
                'demo/validation.js',
                'plugins/msgbox/jquery.msgbox.min.js'
            )),
            'assets_css' => array_merge($this->assets_css, array(
                '../js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css',
            ))
        );
    }

    function index() {
        $this->data['images'] = $this->gallery_model->get_images();
        $this->data['main_content'] = 'gallery';
        $this->load->view('admin/layouts/template', $this->data);
    }

    function add($image_group = false,$subfolder=FALSE) {
        $this->_upload($image_group,$subfolder);
    }

    function delete($url, $image_group, $subfolder = false) {
        $path=$image_group;
        if ($subfolder)
            $path = $image_group . '/' . $subfolder;

        $deleted = $this->gallery_model->delete($url, $path);
        if (!$deleted)
            $this->notify->set_message('Error occured while deleting the image', 'error');
        else
            $this->notify->set_message('Image has been deleted successfully', 'success');

        $uri = $this->input->get('backuri');
        if (isset($uri))
            redirect('admin/' . $uri);
        else
            redirect('admin/gallery');
    }

    function _upload($image_group, $subfolder = false) {

        $path = $image_group;
        if ($subfolder)
            $path = $image_group . '/' . $subfolder;

        $sizes = $this->config->item('image_sizes');
        $config[0] = array(
            'input_name' => 'userfile',
            'file_name' => $this->input->post('caption'),
            'path' => $path,
            'sizes' => array($sizes[$image_group]['large'])
        );

        $config[1] = array(
            'input_name' => 'userfile',
            'file_name' => $this->input->post('caption'),
            'path' => $path . '/thumbs',
            'sizes' => array($sizes[$image_group]['medium'])
        );

        $this->load->library('upload');
        $original = $this->upload->custom_upload_multi($config, true);


        if (is_string($original))
            $this->notify->set_message($original, 'error');
        else
            $this->notify->set_message('Image has been added successfully', 'success');

        //TODO to know how to redirect to the same page
        $uri = $this->input->get('backuri');
        if (isset($uri))
            redirect('admin/' . $uri);
        else
            redirect('admin/gallery');
    }

}