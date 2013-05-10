<?php
//Loading the header
$this->load->view('admin/common/header');
//Loading the contents
$this->load->view('admin/content/'.$main_content);
//Loading the final javascript and end of body,html tags
$this->load->view('admin/common/jsfiles')
?>
