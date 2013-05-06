<?php
//Loading the header
$this->load->view('Admin/template/common/header');
//Loading the contents
$this->load->view($main_content);
//Loading the final javascript and end of body,html tags
$this->load->view('Admin/template/common/jsfiles')

?>
