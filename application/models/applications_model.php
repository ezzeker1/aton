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

        if (!$id)
            $this->db->insert('applications', $data);
        else {
            $this->db->where('id', $id);
            $this->db->update('applications', $data);
        }
        if ($this->db->affected_rows() > 0)
            return TRUE;
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
        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

}