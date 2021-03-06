<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Ahmed Samy
 */
class Quote extends FrontController {

    protected $email_address;

    public function __construct() {
        parent::__construct();
        $this->load->model('settings_model');
        foreach ($this->settings_model->get() as $setting) {
            if ($setting->key == 'email')
                $this->email_address = $setting->value;
        }
        $this->data['assets_js'] = array_merge($this->assets_js, array(
            'core-script.js',
            'parsley.extend.min.js'
        ));
    }

    public function index() {
        $this->data['flash_message'] = $this->session->flashdata('message');

        $this->data['main_content'] = 'quote';
        $this->load->view('site/layouts/inner_no_slider', $this->data);
    }

    public function send() {

        $data = array('details' => array(
                'name' => $this->input->post('name'),
                'company' => $this->input->post('company'),
                'city' => $this->input->post('city'),
                'phone' => $this->input->post('phone'),
                'fax' => $this->input->post('fax'),
                'email' => $this->input->post('email'),
                'Daily need' => $this->input->post('daily_need'),
                'Vertical Lift' => $this->input->post('vertical_lift'),
                'Depth of the well' => $this->input->post('depth_well'),
                'Static water level' => $this->input->post('water_level'),
                'Pipe length' => $this->input->post('length_pipe'),
                'Pipe Diameter'=>$this->input->post('pipe_diameter'),
                'Water temprature' => $this->input->post('temprature'),
                'Application ' => $this->input->post('water_quality'),
                'Tank available' => $this->input->post('tank_available'),
                'Cable length' => $this->input->post('cable_length'),
                'Power supply' => $this->input->post('power_supply'),
                'notes' => $this->input->post('notes'),
               
            )
        );
        $this->load->library('email');

        $this->email->from($data['details']['email'], $data['details']['name']);
        $this->email->to($this->email_address);


        $this->email->subject('Quote from -' . $data['details']['name']);
        $message = $this->load->view('site/email/quote', $data, TRUE);
        
        $this->email->message($message);

        if (!$this->email->send())
            $this->notify->set_message(lang('quote.error'), 'error');
        else
            $this->notify->set_message(lang('quote.success'), 'success');
        redirect('quote');
    }

}