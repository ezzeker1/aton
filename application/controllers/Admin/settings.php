<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * @Author:Ahmed Samy
 * @Porject: ATON
 * @Date: 10/05/2013
 */

class Settings extends Logged_controller {

    function __construct() {
        parent::__construct();
        $this->load->model('settings_model');
        $this->data = array(
            'title' => 'ATON | Admin panel | Home'
        );
    }

    function index() {
        $this->output->enable_profiler();
        $this->data['h3'] = 'Website settings';
        $this->data['buttons'] = form_submit('save', 'save', 'class="btn btn-danger btn"');
        anchor('admin/' . $this->router->class . '/add', 'Add new product', 'class="btn btn-primary"');
        $this->data['table'] = $this->generateTable();
        $this->data['main_content'] = 'settings';
        $this->load->view('admin/layouts/template', $this->data);
    }

    function update() {
        $data=array();
        foreach ($_POST as $key => $value) {
            if ($value != 'save')
                $data[$key] = $value;
        }
        if (!$this->settings_model->update($data))
            $this->notify->set_message('Error occured while saving settings', 'error');
        else
            $this->notify->set_message('Website settings has been updated successfully', 'success');
        redirect('admin/settings');
    }

    function generateTable() {
        foreach ($this->data['settings'] = $this->settings_model->get() as $setting) {
            $this->table->add_row(
                    array(
                        $setting->key,
                        '<input name="' . $setting->key . '" class="input-large" type="text" value="' . $setting->value . '">'
            ));
        }
        return $this->table->generate();
    }

}