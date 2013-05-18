<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * @author Ahmed Samy
 * @date 11/05/2013
 */

class Product extends FrontController {

    public function __construct() {
        parent::__construct();
        $this->data['product_active'] = TRUE;
    }

    function product_list($id = 0) {
        $this->data['assets_js'] = array_merge($this->assets_js, array(
            "js/jquery.elastislide.js",
            "js/core-script.js"
                ));
        $this->data['main_content'] = 'product_list';
        $this->load->view('site/layouts/inner_no_slider', $this->data);
    }

    function load($id = 0) {
        $this->data['assets_js'] = array_merge($this->assets_js, array(
            'accordion.js',
            'core-script.js'
                ));

        $this->data['main_content'] = 'product_details';
        $this->load->view('site/layouts/inner_no_slider', $this->data);
    }

}