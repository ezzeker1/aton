<?php

/*
 * @Author:Ahmed Samy , HypeLabs inc.
 * @Porject: Aton
 * @Date:27/05/2013
 * copy rights reserved for HypeLabs  http://www.hypelabs.net
 */

class Widgets {

    protected $names = array();
    
    protected $vars = array();

    public function load() {
        $ci = & get_instance();
        $return = '';
        if (!empty($this->names)) {
            foreach ($this->names as $name) {
                $ci->load->vars($this->vars[$name]);
                $return.=$ci->load->view('admin/widgets/' . $name);
            }
        }
        return $return;
    }

    public function set($name, $vars = array()) {
        $name = $name . '_widget';
        $this->names[] = $name;
        $this->vars[$name] = $vars;
    }

}