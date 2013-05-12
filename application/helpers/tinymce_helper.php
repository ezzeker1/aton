<?php 
/*
 * Author:Ahmed Samy
 * Porject: TinyMCE Helper 
 * Date:11/11/2012 
 */
if(!function_exists('initialize_tinymce')){
    function initialize_tinymce($height=450,$width=900)
    {
    $ci=& get_instance();
    $ci->load->helper('url_helper');

    /*
     * change src to the location of the tiny_mce.js
     */
        $tinymce = '<script type="text/javascript" src="'. base_url().'resources/admin/js/tinymce/tinymce.min.js"></script>
                     <script type="text/javascript">
                    init_tinymce();
                     function init_tinymce()
                     {
                        tinymce.init({
                                selector: "textarea.rich",
                                height:"'.$height.'",
                                width:"'.$width.'",
                                plugins: [
                                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                                    "insertdatetime media nonbreaking save table contextmenu directionality",
                                    "emoticons template paste "
                                ],
                                toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                                toolbar2: "print preview media | forecolor backcolor emoticons",

                            });
                     }';
           $tinymce.='</script>';

        return $tinymce;
    }
}