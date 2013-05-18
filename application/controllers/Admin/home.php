<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends Logged_controller {

    function __construct() {
        parent::__construct();
        $this->data = array(
            'title' => 'ATON | Admin panel | Home',
            'home_active' => true
        );
    }

    function index() {
        $this->data['main_content'] = 'index';
        $this->data['load_footer'] = TRUE;
        $this->load->view('admin/layouts/template', $this->data);
    }

}