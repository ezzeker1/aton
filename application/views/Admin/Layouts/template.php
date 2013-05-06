<?php
//Loading the header
$this->load->view('Admin/template/common/header');
//Loading upper navigation
$this->load->view('Admin/template/common/upperNav');  
//Loading the contents
$this->load->view($main_content);

//loading the footer
$this->load->view('Admin/template/common/footer');
//Loading the final javascript and end of body,html tags
$this->load->view('Admin/template/common/jsfiles')
?>
