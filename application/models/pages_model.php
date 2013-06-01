<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * @Author:Ahmed Samy
 * @Porject: ATON
 * @Date: 09/05/2013
 */

class Pages_model extends CI_Model {

    function get($page) {
        $this->db->where('name', $page);
        return $this->db->get('pages')->row();
    }

    function get_all() {
        return $this->db->get('pages')->result();
    }

    function update($page, $data) {
        $this->db->where('name', $page);
        $this->db->set('content_ar', $data['content_ar']);
        $this->db->set('content_en', $data['content_en']);
        $this->db->set('title_ar', $data['title_ar']);
        $this->db->set('title_en', $data['title_en']);
        $this->db->update('pages');
        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function get_about() {
        $this->db->like('name', 'about', 'after');
        return $this->db->get('pages')->result();
    }

    function update_about($data) {

        $index = 'name';
        $data = transpose_array($data);
        foreach ($data as $val) {
            foreach ($val as $k2 => $val2) {
                if ($k2 != $index) {
                    $this->db->set($k2, $val2);
                }
                else
                    $this->db->where('name', $val2);
            }
            $this->db->update('pages');
        }
        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

}