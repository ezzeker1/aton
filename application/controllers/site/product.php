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
        $this->load->library("pagination");
        $this->data['assets_js'] = array_merge($this->assets_js, array(
            "jquery.elastislide.js",
            "accordion.js"
                ));
        $this->data['side_products'] = $this->categories_model->get_products_by_category(false);
    }

    function load_cat($id) {

        $this->data['products'] = $this->categories_model->get_products_by_category($id);

        $this->data['pages'] = null;
        $this->data['main_content'] = 'product_list';
        $this->load->view('site/layouts/inner_no_slider', $this->data);
    }

    function product_list() {
//        $this->init_pagination(1);
        $this->data["products"] = $this->products_model->get_products_max(3);
//        var_dump( $this->data["products"]);

        $this->data['pages'] = $this->pagination->create_links();
    }

    function load($id = 0) {
        $this->data['assets_js'] = array_merge($this->assets_js, array(
            'accordion.js',
            'core-script.js'
                ));

        $this->data['product']=$this->products_model->get_product($id);
        $this->data['main_content'] = 'product_details';
        $this->load->view('site/layouts/inner_no_slider', $this->data);
    }

    function init_pagination($per_page) {
        $config['base_url'] = base_url() . 'product-list/page';
        $config['total_rows'] = $this->products_model->get_products_count();
        $config['uri_segment'] = 3;
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
    }

}