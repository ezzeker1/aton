<?php
function get_product_info($product_info,$field_name){
    
    if (isset($product_info)){
        return $product_info->$field_name;
    }
    $ci=&get_instance();
    return $ci->input->post($field_name);
    
}