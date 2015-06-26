<?php 

//1. How disable admin bar from function.php

if (!current_user_can('administrator')):
	  show_admin_bar(false);
endif;




// 2. how add a custom-post-type 

add_action('init', 'portfolio');
function portfolio()
{
  $labels = array(
    'name' => _x('Portfolio', 'post type general name'),
    'singular_name' => _x('Portfolio', 'post type singular name'),
    'add_new' => _x('Add New', 'project'),
    'add_new_item' => __('Add New Project'),
    'edit_item' => __('Edit Project'),
    'new_item' => __('New Project'),
    'view_item' => __('View Project'),
    'search_items' => __('Search Projects'),
    'not_found' =>  __('No projects found'),
    'not_found_in_trash' => __('No projects found in Trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 4,
	'_builtin' => false,
    'supports' => array('title','editor','thumbnail','custom-fields','cats')
  );

  register_post_type('portfolio',$args);
}

register_taxonomy( 'media', 'portfolio', array( 'hierarchical' => false, 'label' => __('tages'), 'query_var' => 'media' ) );





//3.  how add faceook and twitter button with post
function post_like() {
	
$like = '<iframe src="http://www.facebook.com/plugins/like.php?href=' . get_permalink() .'&amp;layout=button_count&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:60px;"></iframe>';
echo $like;
 $twwite='<a href="http://twitter.com/share" class="twitter-share-button" data-text="<?php the_title(); ?>" data-url="' . get_permalink() .'" data-via="diythemes">Tweet</a>
      <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
echo  $twwite;
		
}
           // for display call this function 
          post_like(); 




//4.	remove wordpress from mail


add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');

function new_mail_from($old) {
	return 'test@gmail.com';
}
function new_mail_from_name($old) {
	return 'www.photocontest.com';
}


//5.	Change WordPress “from” email header
function res_fromemail($email) {
    $wpfrom = get_option('admin_email');
    return $wpfrom;
}
 
function res_fromname($email){
    $wpfrom = get_option('blogname');
    return $wpfrom;
}

add_filter('wp_mail_from', 'res_fromemail');
add_filter('wp_mail_from_name', 'res_fromname');



//6. EXclude the page from search Result

function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');


//7. Add TinyMCE editor in themeoption
//Refrece Link: http://onetarek.com/wordpress/tutorial-how-to-use-tinymce-wyswig-editor-in-wordpress-plugin-theme-admin-page/
<?php
	$mytext_var= $observation; // this var may contain previous data that was stored in mysql.
	wp_editor($mytext_var,"mytext", array('textarea_rows'=>12, 'editor_class'=>'mytext_class'));
?> 

?>
