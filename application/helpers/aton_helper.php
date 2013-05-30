<?php

function set_input($object, $property) {

    if (isset($object)) {
        return $object->$property;
    }
    $ci = &get_instance();
    return $ci->input->post($property);
}

/*
 * @return current local
 */

function get_locale($short=false) {
    $ci = &get_instance();
    $locale = $ci->session->userdata('language');
    if($short)
    {
        if($locale=='english')
            return 'en';
        else
            return 'ar';
    }
    if (isset($locale))
        return $locale;
    return $ci->config->item('language');
}

/*
 * @params locale 
 * set the current local
 */

function set_locale($locale) {
    $ci = &get_instance();
    $locale = $ci->session->set_userdata('language', $locale);
}
/*
 * localize
 */
function localize($object,$property)
{
    $locale=  get_locale(true);
    $property=$property.'_'.$locale;
    return $object->$property;
}
/*
 * Strip file extension
 */
if(!function_exists('strip_ext')){
    function strip_ext($file){
        $info = pathinfo($file);
        $file_name =  basename($file,'.'.$info['extension']);
        return $file_name; 
    }
}