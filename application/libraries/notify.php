<?php

/*
 * @Author:Ahmed Samy , HypeLabs inc.
 * @Porject: Aton
 * @Date:11/05/2013
 * copy rights reserved for HypeLabs  http://www.hypelabs.net
 */

class notify {

    var $type;
    var $message;

    public function __construct() {
        $this->ci = & get_instance();
        $this->ci->load->helper('url');
        $this->ci->load->library('session');
    }

    /*
     * @$msg is the notification message
     * $type is either  ---->warning, success , info , error
     * $size is either small or large 
     */

    function set_message($msg, $type) {
        $this->ci->session->set_flashdata('message', array(
            'message' => $msg,
            'type' => strtolower($type)
        ));
    }

    function get_message() {
        $data = $this->ci->session->flashdata('message');
        return $data;
    }

    function get() {
        $data = $this->get_message();
        if ($data) {
            $this->ci->load->vars($data);
            $this->ci->load->view('admin/common/notifications', $data);
        }
    }

}