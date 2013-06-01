<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Ahmed Samy
 */
class Home extends FrontController {

    public function __construct() {
        parent::__construct();
        $this->load->model('pages_model');
        $this->load->model('gallery_model');
    }

    function index() {
        $this->data['assets_js'] = array_merge($this->assets_js, array(
            'jquery.elastislide.js',
            'core-script.js'
                ));
        $this->load->model('products_model');
        $this->data['slider_images'] = $this->gallery_model->get_images(false, 'slider');
        $this->data['home_products'] = $this->products_model->get_products_max(4);
        $this->data['page_home'] = $this->pages_model->get('home');
        $this->data['home_active'] = TRUE;
        $this->data['main_content'] = 'home';
        $this->load->view('site/layouts/general', $this->data);
    }

    function load_about($aboutus) {
        $this->load->model('pages_model');
        $this->data['about_us'] = $this->pages_model->get_about();
        $this->data['about_active'] = TRUE;
        $this->data['main_content'] = 'about';
        $this->load->view('site/layouts/inner_no_slider', $this->data);
    }

    function load_contact() {
        $this->data['assets_js'] = array_merge($this->assets_js, array(
            'core-script.js',
            'parsley.extend.min.js',
            'jquery.elastislide.js'
                ));
        $this->data['contact_active'] = TRUE;

        $this->load->model('pages_model');
        $this->load->model('settings_model');
        $this->data['page_contactus'] = $this->pages_model->get('contactus');

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

    function load_application($id) {
        $this->data['assets_js'] = array_merge($this->assets_js, array(
            'responsiveslides.min.js',
            "core-script.js"
                ));
        $this->data['assets_css'] = array_merge($this->assets_css, array(
            'responsiveslides.css'
                ));
        $this->data['id'] = $id;
        $this->load->model('gallery_model');
        $this->load->model('applications_model');
        $this->data['images'] = $this->gallery_model->get_images(false, 'applications/' . $id);
        $this->data['related_products'] = $this->applications_model->get_related_products($id);
        $this->data['application'] = $this->applications_model->get_one($id);
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