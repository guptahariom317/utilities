<?php

// Define file directories
define('TRUETHEMES_FUNCTIONS', TEMPLATEPATH . '/truethemes_framework');
define('TRUETHEMES_GLOBAL', TEMPLATEPATH . '/truethemes_framework/global');
define('TRUETHEMES_ADMIN', TEMPLATEPATH . '/truethemes_framework/admin');
define('TRUETHEMES_EXTENDED', TEMPLATEPATH . '/truethemes_framework/extended');
define('TRUETHEMES_CONTENT', TEMPLATEPATH . '/truethemes_framework/content');
define('TRUETHEMES_JS', get_template_directory_uri() . '/truethemes_framework/js');
define('TRUETHEMES_FRAMEWORK', get_template_directory_uri() . '/truethemes_framework');
define('TRUETHEMES_CSS', get_template_directory_uri() . '/css/');
define('TRUETHEMES_HOME', get_template_directory_uri());
define('TRUETHEMES', TEMPLATEPATH . '/truethemes_framework/truethemes');
define('TIMTHUMB_SCRIPT',get_template_directory_uri()."/truethemes_framework/extended/timthumb/timthumb.php");
define('TIMTHUMB_SCRIPT_MULTISITE',get_template_directory_uri()."/truethemes_framework/extended/timthumb/timthumb.php");


// Load theme specific init file.
require_once(TEMPLATEPATH . '/truethemes_framework/theme_specific/_theme_specific_init.php');


// Load global elements
require_once(TRUETHEMES_GLOBAL . '/shortcodes.php');
require_once(TRUETHEMES_GLOBAL . '/shortcodes-old.php');
//require_once(TRUETHEMES_GLOBAL . '/widgets.php');
require_once(TRUETHEMES_GLOBAL . '/sidebars.php');
//require_once(TRUETHEMES_GLOBAL . '/theme_functions.php');
require_once(TRUETHEMES_GLOBAL . '/basic.php');
require_once(TRUETHEMES_GLOBAL . '/nav-output.php');
require_once(TRUETHEMES_GLOBAL . '/hooks.php');


// Load TrueThemes functions
//require_once(TRUETHEMES . '/upgrade/init.php');
//require_once(TRUETHEMES . '/wysiwyg/wysiwyg.php');
require_once(TRUETHEMES . '/image-thumbs.php');
$ka_formbuilder = get_option('ka_formbuilder');
if ($ka_formbuilder == "true"){require_once(TRUETHEMES . '/contact-form/truethemes-contact-form.php');}


// Load admin
require_once(TRUETHEMES_ADMIN . '/admin-functions.php');
require_once(TRUETHEMES_ADMIN . '/admin-interface.php');


// Load extended functionality


if(!function_exists('wp_pagenavi')){require_once(TRUETHEMES_EXTENDED . '/wp-pagenavi.php');}

