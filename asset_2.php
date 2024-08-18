<?php
/**
 * Plugin Name: asset management_2
 * Plugin URI:  Plugin URL Link
 * Author:      Plugin Author Name
 * Author URI:  Plugin Author Link
 * Description: This plugin make for pratice wich is "Asset Management_2".
 * Version:     0.1.0
 * License:     GPL-2.0+
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: am2
*/
//study
//==> <pre></pre>
//==> die();
//================Text domin loaded
function plugin_languages(){
    load_plugin_textdomain('plugins_languages',false,dirname(__FILE__)."/languages");
}
add_action("plugins_loaded","plugin_languages");

//================public file loaded
function enqueue_js_function(){
    wp_enqueue_script("public_js_file",plugin_dir_url(__FILE__)."asset/public/js/public_main.js",array(),'1.0.0',true);
    wp_enqueue_style("public_css_file",plugin_dir_url(__FILE__)."asset/public/css/public_style.css");
}
add_action("wp_enqueue_scripts","enqueue_js_function");

//================admin file loaded
function enqueue_admin_function($screen){
    $_scren= get_current_screen();
    if('edit.php' == $screen && 'post'== $_scren->post_type){
        wp_enqueue_script("admin_js_file",plugin_dir_url(__FILE__)."asset/admin/js/admin_main.js",array(),'1.0.0',true);
    }
    wp_enqueue_script("admin_css_file",plugin_dir_url(__FILE__)."asset/admin/css/admin_style.css");
}
add_action("admin_enqueue_scripts","enqueue_admin_function");


function btn_function($att,$content=""){
$default = array(
    "url"=>"www.facebook.com",
    $content
);
$def_val = shortcode_atts($default,$att);
$val = <<<DOE
    <button class="btn_design">
        <a href="{$def_val['url']}">{$content}</a>
    </button>
DOE;
return $val;
}
add_shortcode('btn','btn_function');









?>