<?php
//Loading the header
$this->load->view('template/common/header.html');

//Loading the contents
$this->load->view($main_content);

//loading the footer
//since footer part doesn't exist in all pages so we will load it only when it is required
if(isset($load_footer) && $load_footer){
    $this->load->view('template/common/footer.html');
}
//Loading the final javascript and end of body,html tags
$this->load->view('template/common/jsfiles.html')

?>
