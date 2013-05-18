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
    }

    function load($page) {
        $this->data['h3'] = $page;
        $this->data['page'] = $this->pages_model->get($page);
        $this->data['main_content'] = 'PageEdit';
        $this->load->view('admin/layouts/template', $this->data);
    }

}