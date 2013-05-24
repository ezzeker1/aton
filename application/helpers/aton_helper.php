<?php

function get_product_info($product_info, $field_name) {

    if (isset($product_info)) {
        return $product_info->$field_name;
    }
    $ci = &get_instance();
    return $ci->input->post($field_name);
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