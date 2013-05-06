<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * @Author:Ahmed Samy
 * @Porject: ATON
 * @Date: 06/05/2013
 */
class GalleryModel extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->gallery_path = realpath(APPPATH . '../uploads/gallery');
        $this->gallery_path_url = base_url().'uploads/gallery/';
    }
    function get_images($limit=false) 
    {
        //scan the files in the folder
        $files = $this->scan_dir($this->gallery_path);
        if($limit)
            $files=  array_slice($files, 0, $limit);

        $images = array();
        if(empty($files))
            return $images;
        foreach ($files as $file) {
                $images []= array (
                        'url' => $this->gallery_path_url . $file,
                        'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file
                );
        }
        return $images;
    }
    function delete($images=array())
    {
        $return=0;
        if(is_array($images))
        {
            foreach($images as $image)
            {
                
                $orginal=$this->gallery_path . '/'.$image;
                $thumb=$this->gallery_path . '/thumbs/' . $image;
                if(is_file($orginal))
                {
                    unlink ($orginal);
                    $return++;;
                }
                if(is_file($thumb))
                    unlink ($thumb);
            }
        }
        return $return;
    }
    /*
     * @dir: scanned folder
     * @order : order by date modified 
     */
    function scan_dir($dir,$order='desc') 
    {
        $ignored = array('.', '..', 'thumbs','models');

        //if no dir found create one 
        if(!is_dir($dir))
            mkdir($dir.'/thumbs',0777,TRUE);
        $files = array();    
        foreach (scandir($dir) as $file) {
            if (in_array($file, $ignored)) 
                    continue;
            $files[$file] = filemtime($dir . '/' . $file);
        }

        arsort($files);
        $files = array_keys($files);
        if($order='desc')
            $files=array_reverse($files);

        return ($files) ? $files : false;
    }
}