<?php
/**
 * Plugin Name: gallery slider 
 * Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
 * Description: A brief description of the Plugin.
 * Version: 1.0
 * Author:developer
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: A "Slug" license name e.g. GPL2
 */
 ob_start();
if (!function_exists('is_admin')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

define( 'Gallery_slider_VERSION', '1.0' );
define( 'Gallery_slider_RELEASE_DATE', date_i18n( 'F j, Y', '1397937230' ) );
define( 'Gallery_slider_DIR', plugin_dir_path( __FILE__ ) );
define( 'Gallery_slider_URL', plugin_dir_url( __FILE__ ) );

if (!class_exists("gallery_slider")) {

class gallery_slider {
	var $settings, $options_page;
	
	function __construct() {	

		if (is_admin()) {
			// Load slider settings page
			if (!class_exists("galleryslider"))
				require(Gallery_slider_DIR . 'gallery-admin.php');
			$this->settings = new gallery_slider_Settings();	
		}
		
		add_action('init', array($this,'init') );
		add_action('admin_init', array($this,'admin_init') );
		add_action('admin_menu', array($this,'admin_menu') );
		
		register_activation_hook( __FILE__, array($this,'activate') ); 
		register_deactivation_hook( __FILE__, array($this,'deactivate') );
	}

	/*
		Propagates pfunction to all blogs within our multisite setup.
		More details -
		http://customshake.com/wordpress-theme/write-a-plugin-for-wordpress-multi-site
		
		If not multisite, then we just run pfunction for our single blog.
	*/
	function network_propagate($pfunction, $networkwide) {
		global $wpdb;

		if (function_exists('is_multisite') && is_multisite()) {
			// check if it is a network activation - if so, run the activation function 
			// for each blog id
			if ($networkwide) {
				$old_blog = $wpdb->blogid;
				// Get all blog ids
				$blogids = $wpdb->get_col("SELECT blog_id FROM {$wpdb->blogs}");
				foreach ($blogids as $blog_id) {
					switch_to_blog($blog_id);
					call_user_func($pfunction, $networkwide);
				}
				switch_to_blog($old_blog);
				return;
			}	
		} 
		call_user_func($pfunction, $networkwide);
	}

	function activate($networkwide) {
		$this->network_propagate(array($this, '_activate'), $networkwide);
	}

	function deactivate($networkwide) {
		$this->network_propagate(array($this, '_deactivate'), $networkwide);
	}

	/*
		Enter our plugin activation code here.
	*/
	function _activate() {
		global $wpdb;
		$table_name = $wpdb->prefix . "gallery_settings";
      
   $sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  optionname VARCHAR(255) NOT NULL,
  optionvalue VARCHAR(255) NOT NULL,
  UNIQUE KEY id (id)
    );";

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );
 
   add_option( "jal_db_version", $jal_db_version );
    
   
   $table_name = $wpdb->prefix . "gallery_slider";
      
   $sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  imagename VARCHAR(255) NOT NULL,
  imageurl VARCHAR(255) NOT NULL,
  thumburl VARCHAR(255) NOT NULL,
  youtube VARCHAR(255) NOT NULL,
  typem VARCHAR(255) NOT NULL,
 slideorder INT(255) NOT NULL,
  UNIQUE KEY id (id)
    );";

   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );
 
   add_option( "jal_db_version", $jal_db_version );
		
		 $upload_dir = wp_upload_dir();
  $upload_loc=$upload_dir['basedir']."/slider";
  if (!is_dir($upload_loc)) {
    wp_mkdir_p($upload_loc);
  }
	/* For thumbnail width and height */
	
	$myarra=array("thumbnails"=>'1');
	$serialize=serialize($myarra);	
		}

	/*
		Enter our plugin deactivation code here.
	*/
	function _deactivate() {}
	/*
		Load language translation files (if any) for our plugin.
	*/
	function init() {
		load_plugin_textdomain( 'gallery_slider', Gallery_slider_DIR . 'lang', 
							   basename( dirname( __FILE__ ) ) . '/lang' );
							   wp_register_style( 'slider', plugins_url('/css/slider.css',__FILE__ ));
	}

	function admin_init() {
	}

	function admin_menu() {
	}

	/*
		slider print function for debugging. 
	*/	
	function print_slider($str, $print_info=TRUE) {
		if (!$print_info) return;
		__($str . "<br/><br/>\n", 'gallery_slider' );
	}

	/*
		Redirect to a different page using javascript. More details-
		http://customshake.com/wordpress-theme/wordpress-page-redirect
	*/	
	function javascript_redirect($location) {
		// redirect after header here can't use wp_redirect($location);
		?>

<script type="text/javascript">
		  <!--
		  window.location= <?php echo "'" . $location . "'"; ?>;
		  //-->
		  </script>
<?php
		exit;
	}

} // end class
}
add_action('admin_menu', 'gallery_create_menu');
function gallery_create_menu() {
	//create new top-level menu
	add_menu_page('Gallery Plugin Settings', 'Gallery Settings', 'administrator', __FILE__, 'gallery_settings_page',plugins_url('/images/qa_icon.png', __FILE__));
	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}
function register_mysettings() {
	//register our settings
	register_setting( 'gallery-settings-group', 'page_id' );
	register_setting( 'gallery-settings-group', 'Shareaholic' );
	register_setting( 'gallery-settings-group', 'new_option_name' );
	register_setting( 'gallery-settings-group', 'new_adds' );
	$myTextArea = $_POST['adsens'];
    update_option('adsens', $myTextArea);
	
}
function gallery_settings_page() {
 include('option.php');
} ?>
<?php 
// Initialize our plugin object.
global $gallery_slider;
	
	function wptuts_styles_with_the_lot()
{
    // Register the style like this for a plugin:
    wp_register_style( 'custom-style', plugins_url( '/css/slider.css', __FILE__ ), array(), '20120208', 'all' );
    // or
    // Register the style like this for a theme:
    wp_register_style( 'custom-style', get_template_directory_uri() . '/css/slider.css', array(), '20120208', 'all' );
 
    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style( 'custom-style' );
}
add_action( 'wp_enqueue_scripts', 'wptuts_styles_with_the_lot' );

function galleryslider( $atts ){
	global $wpdb;
	 wp_enqueue_style('slider');
	 
	$output =   '<div class="slider"><ul>';
	
$argu=array(

 'type'                     => 'gallery',

 'taxonomy'                 => 'taxonomy',

 'pad_counts'               => false ); 
 $categories1=get_categories($argu);

 
 foreach($categories1 as $category1) {
	 $cat = $category1->term_id;
	$catname = $category1->name;
    $catdes = $category1->description;?>  
  <?php
  $args = array(
 'post_type' => 'gallery',
 'posts_per_page' => '1',
'order'=> 'DESC',
 'tax_query' => array(
  array(
   'taxonomy' => 'taxonomy',
   'field' => 'id',
   'terms' => array($cat)
  )
 )
);?> <?php
$temp = $wp_query0121;
   $wp_query0121 = null;
   
     $wp_query0121 = new WP_Query($args); 
$siteurll=get_site_url(); 
   if($wp_query0121->have_posts() ) :

  while ($wp_query0121->have_posts()) : $wp_query0121->the_post();
  
$output .= '<li><a class="red" href="'.$siteurll.'/?taxonomy='.$category1->slug.'">';
  
if ( has_post_thumbnail( $thumbnail->ID ) ) {
		
		 $output .=  get_the_post_thumbnail( $thumbnail->ID );
		
	}
	
 $output .= '</a><h5><a href="'.$siteurll.'/?taxonomy='.$category1->slug.'">'.$catname.'</a></h5></li>';
 
 endwhile; endif; wp_reset_postdata();?>
<?php } 

$output .= '</ul></div><div class="clear"></div>';

extract(shortcode_atts(array(), $argu));
return $output;

}  
	add_shortcode( 'galleryimg', 'galleryslider' );
 add_filter('template_include', 'yourprefix_add_to_content1');  
  function yourprefix_add_to_content1( $template_include ) {
    if( is_tax('taxonomy') ) {
		require(Gallery_slider_DIR . 'taxonomy-taxonomy.php');
    }
   return $template_include;
}
function taxonomy_filters() {
	global $typenow;
 
	// an array of all the taxonomyies you want to display. Use the taxonomy name or slug
	$taxonomies = array('taxonomy');
 
	// must set this to the post type you want the filter(s) displayed on
	if( $typenow == 'gallery' ){
 
		foreach ($taxonomies as $tax_slug) {
			$tax_obj = get_taxonomy($tax_slug);
			$tax_name = $tax_obj->labels->name;
			$terms = get_terms($tax_slug);
			if(count($terms) > 0) {
				echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
				echo "<option value=''>Show All $tax_name</option>";
				foreach ($terms as $term) { 
					echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
				}
				echo "</select>";
			}
		}
	}
}
add_action('init', 'create_gallery');
add_action('init', 'custom_taxonomy');

add_action('admin_init', 'customlink_admin_init');
add_action('save_post', 'customlink_save_details');
function customlink_admin_init()
{ 
  //add_meta_box("model-fees-meta", "Model Fees", "model_fees_html", "model", "side", "high");
  add_meta_box("customlink-info-meta", "custom Link", "customlink_info_html", "gallery", "side", "high");
}
function customlink_save_details()
{
  global $post;
  
  //check_admin_referer('model_form_save', 'model_nonce_field');
  
  update_post_meta($post->ID, "custom1", $_POST["custom1"]);
}
function customlink_info_html()
{
  global $post;
  $custom = get_post_custom($post->ID);
  $custom1  = isset($custom["custom1"]) ? $custom["custom1"][0] : "";
  ?>
  <table>
      <tr><td>Custom Link</td><td><input type="text" name="custom1" value="<?php echo $custom1; ?>"></td></tr></table>
  <?php } 
add_action( 'restrict_manage_posts', 'taxonomy_filters' );
add_action( 'init', 'create_gallery' );
function create_gallery() {
  $labels = array(
    'name' => _x('Gallery slider', 'post type general name'),
    'singular_name' => _x('Gallery slider', 'post type singular name'),
    'add_new' => _x('Add New', 'Gallery slider'),
    'add_new_item' => __('Add New Gallery slider'),
    'edit_item' => __('Edit Gallery slider'),
    'new_item' => __('New Gallery slider'),
    'view_item' => __('View Gallery slider'),
    'search_items' => __('Search Gallery slider'),
    'not_found' =>  __('No Gallery slider found'),
    'not_found_in_trash' => __('No Gallery slider found in Trash'),
    'parent_item_colon' => ''
  );
  $supports = array('title','editor','excerpt', 'trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes');
  register_post_type( 'gallery', 
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports,
   'hierarchical' => true,
   'rewrite' => array('slug' => 'gallery', 'with_front' => false),
    )
  );
}
function custom_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Taxonomies', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Taxonomy', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Taxonomies', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'taxonomy', array( 'gallery' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'custom_taxonomy', 0 );

?>