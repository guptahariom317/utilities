<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){

// VARIABLES
$themename = "Karma";
$shortname = "ka";

// Populate siteoptions option in array for use in theme
global $of_options;
$of_options = get_option('of_options');
$GLOBALS['template_path'] = TRUETHEMES_FRAMEWORK;


//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
$of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "Select a category:");    


//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
$of_pages[$of_page->ID] = $of_page->post_name; }
$of_pages_tmp = array_unshift($of_pages, "Select the Blog page:");       


// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 


// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 


//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");


//Footer Columns Array
$footer_columns = array("1","2","3","4","5","6");


//Paths for "type" => "images"
$url =  get_template_directory_uri() . '/truethemes_framework/admin/images/color-schemes/';
$footerurl =  get_template_directory_uri() . '/truethemes_framework/admin/images/footer-layouts/';
$fonturl =  get_template_directory_uri() . '/truethemes_framework/admin/images/fonts/';
$framesurl =  get_template_directory_uri() . '/truethemes_framework/admin/images/image-frames/';
$logourl =  get_template_directory_uri() . '/truethemes_framework/admin/images/logo-builder/';
$recaptcha_themes = get_template_directory_uri() . '/truethemes_framework/admin/images/recaptcha-themes/';//since version 2.6


//Access the WordPress Categories via an Array
$exclude_categories = array();  
$exclude_categories_obj = get_categories('hide_empty=0');
foreach ($exclude_categories_obj as $exclude_cat) {
$exclude_categories[$exclude_cat->cat_ID] = $exclude_cat->cat_name;}










/*-----------------------------------------------------------------------------------*/
/* Create Site Options Array */
/*-----------------------------------------------------------------------------------*/
$options = array();
			
			
			$options[] = array( "name" => __('Header','truethemes_localize'),
			"type" => "heading");
			

$options[] = array( "name" => __('Website Logo','truethemes_localize'),
			"desc" => __('Upload a custom logo for your Website.','truethemes_localize'),
			"id" => $shortname."_sitelogo",
			"std" => "",
			"type" => "upload");
			

			
$options[] = array( "name" => __('Favicon','truethemes_localize'),
			"desc" => __('Upload a 16px x 16px image that will represent your website\'s favicon.<br /><br /><em>To ensure cross-browser compatibility, we recommend converting the favicon into .ico format before uploading. (<a href="http://www.favicon.cc/">www.favicon.cc</a>)</em>','truethemes_localize'),
			"id" => $shortname."_favicon",
			"std" => "",
			"type" => "upload");

$options[] = array( "name" => __('Phone Number','navi_localize'),

			"id" => $shortname."_headerphonenumber",

			"desc" => __('This text gets displayed in the Phone Number.'),

			"std" => "",

			"type" => "text");	

			
						
			
//filter to allow developer to add new options to general settings.			
$options = apply_filters('theme_option_general_settings',$options);			
			
		$options[] = array( "name" => __('Home Page','truethemes_localize'),
			"type" => "heading");
			
		
		

		
		
		
			$options[] = array( "name" => __('Home Top Image','truethemes_localize'),
			"desc" => __('Upload a custom top Image for your Website.','truethemes_localize'),
			"id" => $shortname."_promos1image",
			"std" => "",
			"type" => "upload");
			
			$options[] = array( "name" => __('Home Page Embed Video Code','navi_localize'),

			"id" => $shortname."_homevideo",

			"desc" => __('Enter your Embed Code.'),

			"std" => "",

			"type" => "textarea");
			
			
			
			
			
//filter to allow developer to add new options to general settings.			
$options = apply_filters('theme_option_general_settings',$options);		

		
		$options[] = array( "name" => __('Contact Page','truethemes_localize'),
			"type" => "heading");
				
				
			$options[] = array( "name" => __('Email','navi_localize'),

			"id" => $shortname."_email",

			"desc" => __('Enter your Email.'),

			"std" => "",

			"type" => "text");
			
			$options[] = array( "name" => __('FAX','navi_localize'),

			"id" => $shortname."_fax",

			"desc" => __('Enter your Fax Number.'),

			"std" => "",

			"type" => "text");
			
			$options[] = array( "name" => __('Phone','navi_localize'),

			"id" => $shortname."_phoncontact",

			"desc" => __('Enter your phone Number.'),

			"std" => "",

			"type" => "text");
			
			
			$options[] = array( "name" => __('Address','navi_localize'),

			"id" => $shortname."_addressconatct",

			"desc" => __('Enter your Address.'),

			"std" => "",

			"type" => "textarea");



$options = apply_filters('theme_option_general_settings',$options);	
	
			
		$options[] = array( "name" => __('Footer','truethemes_localize'),
			"type" => "heading");
				
				
			$options[] = array( "name" => __('Footer Copyright Text','navi_localize'),

			"id" => $shortname."_copyright_text",

			"desc" => __('This text gets displayed in the footer.'),

			"std" => "",

			"type" => "text");



$options = apply_filters('theme_option_general_settings',$options);	
		

update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>