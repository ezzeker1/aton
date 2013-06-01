<?php

/**
 *
 * @author Ahmed Samy
 */
class Applications_model extends CI_Model {

    /**
     * Creates new application
     * @params data
     * @return  true or false
     */
    function save($data, $id = false) {

        $return = false;
        if (!$id) {
            $related_products = $data['related_products'];
            unset($data['related_products']);
            $this->db->insert('applications', $data);
            if ($this->db->affected_rows() > 0) {
                $insert_id = $this->db->insert_id();
                $this->update_related_products($related_products, $insert_id);
                $this->create_folder($this->db->$insert_id);
                $return = $insert_id;
            } else {
                return false;
            }
        } else {
            $this->db->where('id', $id);
            $this->db->update('applications', $data);
            $return = true;
        }
        if ($this->db->affected_rows() > 0)
            return $return;
        else
            return FALSE;
    }

    /**
     * get all applications
     * @return  array of objects
     */
    function get() {
        return $this->db->get('applications')->result();
    }

    /**
     * @params id application id
     * @return single object of application
     */
    function get_one($id) {
        $this->db->where('id', $id);
        return $this->db->get('applications')->row();
    }

    /**
     * Delete application
     * @params id application id
     * @return true or false
     */
    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('applications');
        if ($this->db->affected_rows() > 0) {
            $this->db->where('application_id', $id);
            $this->db->delete('applications_products');
            return true;
        }
        else
            return false;
    }

    /*
     * update related products
     * @params array related products
     * @return true or false
     */

    function update_related_products($related_products, $id) {
        if (!empty($related_products)) {
            foreach ($related_products as $product) {
                $this->db->set('application_id', $id);
                $this->db->set('product_id', $product);
                $this->db->insert('applications_products');
            }
        }
    }

    function get_related_products($app_id) {
        $query = 'select *
                from applications_products ap , products p 
                where ap.application_id='.$app_id.'
                and p.id = ap.product_id';
        $result=$this->db->query($query);
        return $result->result();
    }

    function create_folder($id) {
        mkdir('uploads/applications/' . $id . '/thumbs', '0777', TRUE);
    }

}