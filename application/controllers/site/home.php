<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Ahmed Samy
 */
class Home extends FrontController {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->data['assets_js'] = array_merge($this->assets_js, array(
            'jquery.elastislide.js',
            'core-script.js'
                ));

        $this->data['main_content'] = 'home';
        $this->load->view('site/layouts/general', $this->data);
    }

    function load_about($page) {
        $this->data['about_active'] = TRUE;
        $this->data['main_content'] = 'about';
        $this->load->view('site/layouts/inner_no_slider', $this->data);
    }

    function load_contact() {
        $this->data['assets_js'] = array_merge($this->assets_js, array(
            'core-script.js'
                ));
        $this->data['contact_active'] = TRUE;
        $this->data['main_content'] = 'contact';
        $this->load->view('site/layouts/inner_no_slider', $this->data);
    }

    function load_application() {
        $this->data['assets_js'] = array_merge($this->assets_js, array(
            'responsiveslides.min.js',
            "core-script.js"
                ));
        $this->data['assets_css'] = array_merge($this->assets_css, array(
            'responsiveslides.css'
                ));
        $this->data['application_active'] = TRUE;
        $this->data['main_content'] = 'application';
        $this->load->view('site/layouts/inner', $this->data);
    }

    function change_locale($language, $uri) {
        set_locale($language);
        redirect($uri);
    }

}