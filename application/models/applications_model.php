<?php

/**
 *
 * @author Ahmed Samy
 */
class Applications_model extends CI_Model {

    protected $photo_path;

    public function __construct() {
        parent::__construct();
        $this->photo_path = APPPATH . '../uploads/applications/';
    }

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
                $return = $insert_id;
                $dir = $this->photo_path . $insert_id . '/';
                if (!is_dir($dir))
                {
                    mkdir($dir . '/thumbs', 0777, TRUE);
                    mkdir($dir . '/pdf', 0777, TRUE);
                }
            }
        } else {
            $related_products = $data['related_products'];
            unset($data['related_products']);

            $this->db->where('id', $id);
            $this->db->update('applications', $data);

            if ($this->db->affected_rows() > 0 || $this->update_related_products($related_products, $id)) {
                $return = true;
            }
        }


        return $return;
    }

    /**
     * get all applications
     * @return  array of objects
     */
    function get($limit = false) {
        if ($limit)
            $this->db->limit($limit);
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

            //remove photos folder
            $dir = $this->photo_path . $id . '/';
            if (is_dir($dir))
                deleteDirectory($dir);
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
        $return = false;
        if (!empty($related_products)) {
            $this->empty_related_products($id);

            foreach ($related_products as $product) {
                $this->db->set('application_id', $id);
                $this->db->set('product_id', $product);
                $this->db->insert('applications_products');
                if ($this->db->affected_rows() > 0)
                    $return = TRUE;
            }
        }
        return $return;
    }

    function get_related_products($app_id) {
        $query = 'select *
                from applications_products ap , products p 
                where ap.application_id=' . $app_id . '
                and p.id = ap.product_id';
        $result = $this->db->query($query);
        return $result->result();
    }

    function empty_related_products($id) {
        $this->db->where('application_id', $id);
        $this->db->delete('applications_products');
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    function get_with_images($limit=false) {
        $data=array();
        $this->load->model('gallery_model');
        $applications = $this->get($limit);
        foreach($applications as $application){
            $application->images=$this->gallery_model->get_images(false,'applications/'.$application->id);
            $data[]=$application;
        }
        return $data;
    }

}