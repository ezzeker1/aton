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
           tinymce.init({
                selector: "textarea",
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

            });';
            $tinymce.="function elFinderBrowser (field_name, url, type, win) {
                    var elfinder_url = '".base_url() ."resources/admin/js/tinymce/plugins/elfinder/elfinder.html';    // use an absolute path!
                    tinyMCE.activeEditor.windowManager.open({
                        file: elfinder_url,
                        title: 'elFinder 2.0',
                        width: 900,  
                        height: 450,
                        resizable: 'yes',
                        inline: 'yes',    // This parameter only has an effect if you use the inlinepopups plugin!
                        popup_css: false, // Disable TinyMCE's default popup CSS
                        close_previous: 'no'
                    }, {
                        window: win,
                        input: field_name
                    });
                    return false;
                    }";
           $tinymce.='</script>';

        return $tinymce;
    }
}