<?php
//Loading the header
$this->load->view('Admin/common/header');
//Loading the contents
$this->load->view('Admin/content/'.$main_content);
//Loading the final javascript and end of body,html tags
$this->load->view('Admin/common/jsfiles')
?>
