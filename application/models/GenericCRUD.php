<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenericCRUD
 *
 * @author jason
 */
class GenericCRUD extends CI_Model {
    //put your code here
    
    function create($tableName,$payloadData){
        $this->db->insert($tableName, $payloadData);
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    /**
     * Generic Crud for updating records
     */
    function update($tableName,$payload){
        $primary_id = $payload['id'];
        unset($payload['id']);
        $this->db->where('id',$primary_id);
        $this->db->update($tableName,$payload);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    /**
     * Generic Crud for reading
     */
    function read($tableName,$payload){
        
//        $this->db->select($tableName);
        if(isset($payload['id'])){
            $this->db->where('id',$payload['id']);
        }
        $query = $this->db->get($tableName);
        return $query;
    }
}

?>
