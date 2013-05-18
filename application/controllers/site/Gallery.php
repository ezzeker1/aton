<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * @author Ahmed Samy
 * @date 11/05/2013
 */

class Gallery extends FrontController {

    public function __construct() {
        parent::__construct();
        $this->data = array(
            'assets_js' => array_merge($this->assets_js, array(
                'gallery/jquery.tmpl.min.js',
                'gallery/jquery.easing.1.3.js',
                'gallery/jquery.elastislide.js',
                'gallery/gallery.js',
            )),
            'assets_css' => array_merge($this->assets_css, array(
                'gallery.css'
            ))
        );
    }

    function index() {
        $this->data['gallery_active'] = TRUE;
        $this->data['main_content'] = 'gallery';
        $this->load->view('site/layouts/inner_no_slider', $this->data);
    }

}