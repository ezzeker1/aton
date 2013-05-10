<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product_model
 *
 * @author jason
 */
class product_model extends CI_Model{
    private $categories_table;    
//put your code here
function __construct() {
    parent::__construct();
    $this->categories_table='roducts';
    
}
/**
 * @param array $payloadData Data to be persisted in the database.
 * @return boolean True if insert is successful false if not.
 */
    function create_product($payloadData){
        $this->db->insert($this->categories_table,$payloadData);
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        else{
            return FALSE;
    }}
        /**
         * 
         */
        function update_product($id,$payload){
          $this->db->where('id',$id);
        $this->db->update($this->categories_table,$payload);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }  
        }
        /**
         * 
         */
        function delete_product($id){
        $this->db->where('id',$id);
        $this->db->delete($this->categories_table);
       if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }   
        }
        
        /**
         * 
         */
        function get_product($id=FALSE){
             if($id){
           $this->db->where('id',$id);   
        }
        $query=  $this->db->get($this->categories_table);
        if($query->num_rows()>0){
        return $query->result();
        }
        else{
            return false;
        }
        }
        /**
         * 
         */
       
    function get_product_list(){
        $result = $this->get_product();
        if($result){
            foreach($result as $row){
                $product_names[$row->id]=$row->name;
            }
        return $product_names;
        
            }
            else{
                return FALSE;
            }
        }
        

        function get_products_by_categoryid($id){
            $this->db->from('categories');
            $this->db->join('products','products.category_id =categories.id');
            $this->db->where('products.category_id',$id);
            $query = $this->db->get();
            
            if($query->num_rows()>0){
                return $query->result();       
            }else{
                return false;
            }
    
        
        }           

    
    
}