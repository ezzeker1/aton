<?php
//Loading the header
$this->load->view('Admin/common/header');
//Loading upper navigation
$this->load->view('Admin/common/upperNav');  
//Loading the table
$this->load->view('Admin/content/table');
//loading the footer
$this->load->view('Admin/common/footer');
//Loading the final javascript and end of body,html tags
$this->load->view('Admin/common/jsfiles')
?>
