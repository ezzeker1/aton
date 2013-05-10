<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * @Author:Ahmed Samy
 * @Porject: ATON
 * @Date: 10/05/2013
 */
class SettingsModel extends CI_Model{

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
    function getSetting($key)
    {
        $this->db->where('key',$key);
        return $this->db->get('settings')->row()->value;

    }
}