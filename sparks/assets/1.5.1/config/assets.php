<?php

/*
|--------------------------------------------------------------------------
| Processing assets
|--------------------------------------------------------------------------
|
| Flags for processing actions
|
*/

$config['assets']['minify_css']           = false;
$config['assets']['minify_js']            = false;
$config['assets']['pack_js']              = false;
$config['assets']['enable_less']          = false;
$config['assets']['enable_sass']          = false;
$config['assets']['enable_coffeescript']  = false;
$config['assets']['freeze']               = false;

/*
|--------------------------------------------------------------------------
| Cache
|--------------------------------------------------------------------------
|
| Define if the cache folder should be cleared when generating new cache files
| 
*/

$config['assets']['auto_clear_cache']     = true;
$config['assets']['auto_clear_css_cache'] = true;
$config['assets']['auto_clear_js_cache']  = true;

/*
|--------------------------------------------------------------------------
| Default paths and directories, tags
|--------------------------------------------------------------------------
|
| Leave the base_url at null on default
| Default directories containing the assets
| Option to use HTML5 tags
|
*/

$config['assets']['base_url']   = null;
$config['assets']['assets_dir'] = 'resources/admin';
$config['assets']['js_dir']     = 'js';
$config['assets']['css_dir']    = 'css';
$config['assets']['cache_dir']  = 'cache';
$config['assets']['img_dir']    = 'img';
$config['assets']['html5']      = true;
