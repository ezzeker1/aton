<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * @Author:Ahmed Samy
 * @Porject: ATON
 * @Date: 06/05/2013
 */
class Gallery extends Logged_controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('GalleryModel');
        $this->data=array(
            'title'=>'ATON | Admin panel | Gallery',
            'assets_js'=>  array_merge($this->assets_js, array(
                'plugins/hoverIntent/jquery.hoverIntent.minified.js',
                'plugins/lightbox/jquery.lightbox.min.js',
                'demo/gallery.js',
                'plugins/validate/jquery.validate.js',
                'demo/validation.js'
            ))
        );
    }
    function index()
    {
        $this->data['main_content']='gallery';
        $this->load->view('admin/Layouts/template',$this->data);
    }
}