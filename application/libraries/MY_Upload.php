<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/*
 * @author: Ahmed Samy
 * @project: ATON
 * @info:
 * Custom extension for file upload 
 */
class MY_Upload extends CI_Upload {
    
    /*config
    * @input_name                 --->file upload input name
    * @file_name                  --->desired file name
    * @sizes =array()             --->sizes desired format i.e. 100x100
    * @path                       --->where to store it
    */
    function custom_upload($param = array())
    {

            // var_dump($param);
            $CI =& get_instance();
            $config = array(
                    'allowed_types' => 'jpg|jpeg|gif|png|bmp',
                    'overwrite' => 'TRUE',
                    'upload_path' => realpath(APPPATH . '../uploads/' . $param['path']) ,
                    'file_name' => strtolower($param['file_name']) ,
            );
            $CI->load->library('upload', $config);

            // Check if file is uploaded

            if ($CI->upload->do_upload($param['input_name']))
            {
                    $upload_data = $CI->upload->data();

                    // start making thumbnails
                    //            print_r($param);

                    $CI->load->library('image_lib');
                    foreach($param['sizes'] as $size)
                    {
                            $CI->make_thumb($upload_data, $size, FALSE,$config['crop']);
                    }

                    return true;
            }
            else return $CI->upload->display_errors();
    }
    function make_thumb($data, $size, $wallpaper = false)
    {

            // get width and height
            $sizes = explode('x', $size);
            $config['source_image'] = $data['full_path'];
            if (!$wallpaper) 
                $config['new_image'] = $data['file_path'] . $data['raw_name'] . '_' . $size . $data['file_ext'];
            $config['maintain_ratio'] = TRUE;
            $config['width'] = $sizes[0];
            $config['height'] = $sizes[1];
            $config['master_dim'] = $sizes[0] > $sizes[1] ? 'width' : 'height';
            $CI->image_lib->initialize($config);
            
            if (!$CI->image_lib->resize())
                    log_message(3, $CI->image_lib->display_errors());
            
            $CI->image_lib->clear();
    }
}