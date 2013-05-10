<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * @Author:Ahmed Samy
 * @Porject: ATON
 * @Date: 10/05/2013
 */
class Gallery extends CI_Model{

    function get()
    {
        return $this->db->get('setttings')->result();
    }
    function update($key,$value)
    {
        $this->where('key',$key);
        $this->db->set('value',$value);
        $this->db->update('settings');
        if($this->db->affected_rows() > 0 )
            return true;
        else
            return false;
    }
}