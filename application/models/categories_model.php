<?php

/**
 * Description of CategoriesModel
 *
 * @author jason
 */
class Categories_model extends CI_Model {

    private $categories_table;

    function __construct() {
        parent::__construct();
        $this->categories_table = 'categories';
    }

    /**
     * @param array $payloadData Data to be persisted in the database.
     * @return boolean True if insert is successful false if not.
     */
    function create_category($payloadData) {

        $this->db->insert($this->categories_table, $payloadData);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * get only the category unique names
     * @return  array of category names or FALSE if none was found.
     */
    function get_category($id = FALSE) {
        if ($id) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get($this->categories_table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /**
     * 
     */
    function update_category($id, $payload) {

        $this->db->where('id', $id);
        $this->db->update($this->categories_table, $payload);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function delete_category($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->categories_table);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_category_list() {
        $result = $this->get_category();
        if ($result) {
            foreach ($result as $key => $row) {
                $category_names[$row->id] = $row->name_en . '/' . $row->name_ar;
            }
            return $category_names;
        } else {
            return FALSE;
        }
    }

    /*
     * gets all products per category
     */

    function get_products_by_category($id = false) {
//        $this->output->enable_profiler();
        $query = 'select c.name_en as cat_name_en, c.name_ar as cat_name_ar, c.id as cat_id ,p.*
                        from categories c, products p
                        where c.id = p.category_id';
        if ($id)
            $query .= ' AND c.id  = ' . $id . '';
        $result=$this->db->query($query);
        return $result->result();
    }

}