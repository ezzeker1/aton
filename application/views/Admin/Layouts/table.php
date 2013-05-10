<?php
//Loading the header
$this->load->view('admin/common/header');
//Loading upper navigation
$this->load->view('admin/common/upperNav');  
//Loading the table
$this->load->view('admin/content/table');
//loading the footer
$this->load->view('admin/common/footer');
//Loading the final javascript and end of body,html tags
$this->load->view('admin/common/jsfiles')
?>
