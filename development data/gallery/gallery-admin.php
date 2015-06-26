<?php
ob_start();
if (!function_exists('is_admin')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
	
}

if (!class_exists("gallery_slider_Settings")) :
?>



<?php
/*  
	Create slider settings page for our plugin.
	
	- We show how to render our own controls using HTML.
	- We show how to get WordPress to render controls for us using do_settings_sections'
	
	WordPress Settings API tutorials
	http://codex.wordpress.org/Settings_API
	http://ottopress.com/2009/wordpress-settings-api-tutorial/
*/
class gallery_slider_Settings {
	}
endif;
