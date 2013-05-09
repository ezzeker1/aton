<?php 
/*
 * Author:Ahmed Samy
 * Porject: TinyMCE Helper 
 * Date:11/11/2012 
 */
if(!function_exists('initialize_tinymce')){
    function initialize_tinymce()
    {
    $ci=& get_instance();
    $ci->load->helper('url_helper');

    /*
     * change src to the location of the tiny_mce.js
     */
    $script_url=base_url().'resources/js/tinymce/jquery.tinymce.js';
    $tinymce = '<script type="text/javascript" src="'. $script_url.'"></script>
                <script type="text/javascript">
                    tinyMCE.init({
                    // General options
                    mode : "textareas",
                    theme : "advanced",
                    height: "300",
                    relative_urls : false,
                    remove_script_host : false,
                    forced_root_block : false,
                    force_br_newlines : true,
                    force_p_newlines : false,
                    
                    plugins:  "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template"
                    theme_advanced_toolbar_location : "top",
                    theme_advanced_toolbar_align : "left",
                    theme_advanced_resize_horizontal : true,
                    theme_advanced_buttons1 : "bold, italic, underline, strikethrough, |, justifyleft, justifycenter, justifyright, justifyfull, |, formatselect, fontselect, fontsizeselect",
                    theme_advanced_buttons2: "bullist, numlist, outdent, indent, blockquote, |, link, unlink, image, media, emotions, cleanup, code, |, insertdate, inserttime, |, undo, redo, removeformat",
                    theme_advanced_buttons3 : ""

                });';
    $tinymce.="function elFinderBrowser (field_name, url, type, win) {
                    var elfinder_url = '".base_url() ."resources/js/tinymce/plugins/elfinder/elfinder.html';    // use an absolute path!
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