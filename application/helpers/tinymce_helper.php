<?php

/*
 * Author:Ahmed Samy
 * Porject: TinyMCE Helper 
 * Date:11/11/2012 
 */
if (!function_exists('initialize_tinymce')) {

    function initialize_tinymce() {
        $ci = & get_instance();
        $ci->load->helper('url_helper');

        /*
         * change src to the location of the tiny_mce.js
         */
        $tinymce = '<script type="text/javascript" src="' . base_url() . 'resources/admin/js/tinymce/tiny_mce.js"></script>
                <script type="text/javascript">
//                /init_tinymce();
                function init_tinymce()
                {
                tinyMCE.init({
                    // General options
                    mode : "textareas",
                    theme : "advanced",
                    height: "300",
                    weight:"800",
                    relative_urls : false,
                    remove_script_host : false,
                    forced_root_block : false,
                    force_br_newlines : true,
                    force_p_newlines : false,
                    file_browser_callback : "elFinderBrowser",
                    plugins:  "youtube,autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
                    document_base_url : "base_url() ",
                    theme_advanced_toolbar_location : "top",
                    theme_advanced_toolbar_align : "left",
                    theme_advanced_resize_horizontal : true,
                    theme_advanced_buttons1 : "bold, italic, underline, strikethrough, |, justifyleft, justifycenter, justifyright, justifyfull, |, formatselect, fontselect, fontsizeselect",
                    theme_advanced_buttons2: "bullist, numlist, outdent, indent, blockquote, |, link, unlink, image, media, emotions, cleanup, code, |, insertdate, inserttime, |, undo, redo, removeformat",
                    theme_advanced_buttons3 : ""

                });} ';
        $tinymce.="function elFinderBrowser (field_name, url, type, win) {
                    var elfinder_url = '" . base_url() . "resources/admin/js/tinymce/plugins/elfinder/elfinder.html';    // use an absolute path!
                    tinyMCE.activeEditor.windowManager.open({
                        file: elfinder_url,
                        title: 'elFinder 2.0',
                        width: 500,  
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

    /* This function enables you to set the configuration script on the poroject for MCImageManager standalone usage 
     *  remove_script_host              :           If this option is enabled the protocol and host part of the URLs returned from the MCImageManager 
     *                                              will be removed. This option is set to false by default.
     * document_base_url                :           This option enables you to specify the URL from where all URLs will be relative to this option is only used 
     * relative_urls                    :           If this option is set to true, all URLs returned from the MCImageManager will be relative from the specified document_base_url
     * document_base_url                :           Default URL will be loaded
     * for more information about TinyMce MCImageManager visit http://www.tinymce.com/wiki.php/MCImageManager
     * 
     * in controller load tinymce helper and you will be able to intialize and access the below function 
     */
    if (!function_exists('initialize_image_manager')) {

        function initialize_image_manager($path = '') {
            $ci = & get_instance();
            $ci->load->helper('url_helper');

            $tinymce = '<script type="text/javascript">
                        mcImageManager.init({
                            document_base_url : "' . base_url() . '",
                            relative_urls : true,
                            remove_script_host : true,
                            remember_last_path : false
                    });';
            $tinymce.='</script>';

            return $tinymce;
        }

    }
}