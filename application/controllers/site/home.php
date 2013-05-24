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
            'core-script.js',
            'parsley.extend.min.js'
                ));
        $this->data['contact_active'] = TRUE;

        $this->load->model('pages_model');
        $this->load->model('settings_model');
        $this->data['page'] = $this->pages_model->get('contactus');

        $data = new stdClass();
        foreach ($this->settings_model->get() as $setting) {
            if ($setting->key == 'email')
                $data->email = $setting->value;
            if ($setting->key == 'phone')
                $data->phone = $setting->value;
            if ($setting->key == 'address')
                $data->address = $setting->value;
        }
        $this->data['settings'] = $data;
        $this->data['main_content'] = 'contact';
        $this->load->view('site/layouts/inner_no_slider', $this->data);
    }

    function contact_mail() {
        $this->load->library('email');

        $this->email->from('your@example.com', 'Your Name');
        $this->email->to('someone@example.com');
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();

        echo $this->email->print_debugger();
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

    function change_locale($language) {
        $uri = $this->input->get('back_url');
        set_locale($language);
        redirect($uri);
    }

}