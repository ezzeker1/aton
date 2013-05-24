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
        $this->load->model("products_model");
        $this->load->model("categories_model");
        $this->load->library("pagination");
    }

    function product_list() {
        $this->data['assets_js'] = array_merge($this->assets_js, array(
            "js/jquery.elastislide.js",
            "js/core-script.js"
                ));
        $this->data['main_content'] = 'product_list';
        $this->init_pagination(3);
        $this->data["products"] = $this->products_model->get_products_max(3);
        $this->data["categories"] = $this->categories_model->get_category();
        $this->data['pages'] = $this->pagination->create_links();
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

    function init_pagination($per_page) {
        $config['base_url'] = base_url() . 'product/product_list';
        $config['total_rows'] = $this->products_model->get_products_count();
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
    }

}