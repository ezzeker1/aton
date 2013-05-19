<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * @author: Ahmed Samy
 * @project: ATON
 * @info:
 * Custom extension for file upload 
 */

class MY_Upload extends CI_Upload {
    /* config
     * @input_name                 --->file upload input name
     * @file_name                  --->desired file name
     * @sizes =array()             --->sizes desired format i.e. 100x100
     * @path                       --->where to store it
     */

    function custom_upload($param = array()) {

        $CI = & get_instance();
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp',
            'overwrite' => 'TRUE',
            'upload_path' => realpath(APPPATH . '../uploads/' . $param['path']),
            'file_name' => strtolower($param['file_name']),
        );

        $this->initialize($config);
        // Check if file is uploaded
        if ($this->do_upload($param['input_name'])) {
            $upload_data = $this->data();

            // start making thumbnails
            $CI->load->library('image_lib');
            foreach ($param['sizes'] as $size) {
                $CI->make_thumb($upload_data, $size, FALSE);
            }

            return true;
        }
        else
            return $this->display_errors();
    }

    function custom_upload_multi($params = array(), $wallpaper = false) {
        $CI = & get_instance();
        $return = false;
        foreach ($params as $param) {

            $config = array(
                'allowed_types' => 'jpg|jpeg|gif|png|bmp',
                'overwrite' => 'TRUE',
                'upload_path' => realpath(APPPATH . '../uploads/' . $param['path']),
                'file_name' => strtolower($param['file_name']),
            );
            $this->initialize($config);

            // Check if file is uploaded
            if ($this->do_upload($param['input_name'])) {
                $upload_data = $this->data();
                // start making thumbnails
                $CI->load->library('image_lib');
                foreach ($param['sizes'] as $size) {
                    $this->make_thumb($upload_data, $size, $wallpaper);
                }
                if (!$wallpaper && is_file($config['upload_path'] . '\\' . $_FILES[$param['input_name']]['name']))
                    unlink($config['upload_path'] . '\\' . $_FILES[$param['input_name']]['name']);

                $return = true;
            }
            else
                $return = $this->display_errors();
        }
        return $return;
    }

    function make_thumb($data, $size, $wallpaper = FALSE) {

        $CI = & get_instance();
        // get width and height
        $sizes = explode('x', $size);
        $config['source_image'] = $data['full_path'];
        if (!$wallpaper)
            $config['new_image'] = $data['file_path'] . $data['raw_name'] . '_' . $size . $data['file_ext'];
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $sizes[0];
        $config['height'] = $sizes[1];
//      /  $config['master_dim'] = $sizes[0] > $sizes[1] ? 'width' : 'height';
        $CI->image_lib->initialize($config);

        if (!$CI->image_lib->resize())
            log_message(3, $CI->image_lib->display_errors());

        $CI->image_lib->clear();
    }

}