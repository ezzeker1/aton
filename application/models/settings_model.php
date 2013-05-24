<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * @Author:Ahmed Samy
 * @Porject: ATON
 * @Date: 10/05/2013
 */

class Settings_model extends CI_Model {

    function get() {
        return $this->db->get('settings')->result();
    }

    function update($data) {
        $return = false;
        foreach ($data as $key => $value) {
            $this->db->where('key', $key);
            $this->db->set('value', $value);
            $this->db->update('settings');
            if ($this->db->affected_rows() > 0)
                $return = true;
        }
        return $return;
    }

    function getSetting($key) {
        $this->db->where('key', $key);
        return $this->db->get('settings')->row()->value;
    }

}