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

function get_locale($short = false) {
    $ci = &get_instance();
    $locale = $ci->session->userdata('language');
    if ($short) {
        if ($locale == 'english')
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

function localize($object, $property) {
    $locale = get_locale(true);
    $property = $property . '_' . $locale;
    return $object->$property;
}

/*
 * Strip file extension
 */
if (!function_exists('strip_ext')) {

    function strip_ext($file) {
        $info = pathinfo($file);
        $file_name = basename($file, '.' . $info['extension']);
        return $file_name;
    }

}
/*
 * localize css
 */

function localize_css($css) {
    $locale = get_locale(true);
    return strip_ext($css) . '_' . $locale . '.css';
}

/*
 * transpose array
 */

function transpose_array($arr) {
    $out = array();
    foreach ($arr as $key => $subarr) {
        foreach ($subarr as $subkey => $subvalue) {
            $out[$subkey][$key] = $subvalue;
        }
    }
    return $out;
}

/**
 * function to get file extension
 */
function get_image_ext($filename) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    return $filename . $ext;
}

/**
 * get_product_picture  is for getting img file of the specified product
 * function search for three extensions [gif - jpg - png] so any img file with extension other than 
 * these three will be ignored.
 * @param array $directory_files array of files names in the upload folder that corresponds to that product.
 * @return object string representing filename or false incase of file not found.
 */
function get_picture($directory, $filename) {
    $directory = realpath(APPPATH . '../' . $directory);
    $files = scan_dir($directory);
    foreach ($files as $file) {
        if (end_with($file, 'gif') || end_with($file, 'jpg') || end_with($file, 'png')) {
            return $file;
        }
    }
    return FALSE;
}

/**
 * end_with function is for checking the file extension wither the file ends with the desired pattern or not
 * @param String $str string representing filename.ext 
 * @param String $pattern string representing file extension we want to check for.
 */
function end_with($str, $pattern) {
    if (strlen($str) > strlen($pattern)) {
        $file_ext = substr($str, (strlen($pattern) * -1));
        if ($file_ext == $pattern) {
            return $str;
        }
    }
    return FALSE;
}

/**
 * get_product_pdf is for getting pdf file of the specified product
 * @param array $directory_files array of files names in the upload folder that corresponds to that product.
 * @return object string representing filename or false incase of file not found.
 */
function get_pdf($directory_files) {
    foreach ($directory_files as $file) {
        if (end_with($file, 'pdf')) {
            return $file;
        }
    }
    return FALSE;
}

/*
 * @dir: scanned folder
 * @order : order by date modified 
 */

function scan_dir($dir, $order = 'desc') {
    $ignored = array('.', '..');

 
    $files = array();
    foreach (scandir($dir) as $file) {
        if (in_array($file, $ignored))
            continue;
        $files[$file] = filemtime($dir . '/' . $file);
    }

    arsort($files);
    $files = array_keys($files);
    if ($order == 'desc')
        $files = array_reverse($files);

    return ($files) ? $files : false;
}

function deleteDirectory($dir) {
    if (!file_exists($dir)) return true;
    if (!is_dir($dir)) return unlink($dir);
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        if (!deleteDirectory($dir.DIRECTORY_SEPARATOR.$item)) return false;
    }
    return rmdir($dir);
}