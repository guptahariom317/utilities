                                                 Mostly used by wordpress developer
                                                 
                                                 
##For give a theme url :- 
                        <?php echo get_template_directory_uri(); ?> 
                        
                          
                                                                     
##For display post and page title with link.
                     <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                     
                     
                     
##For display wordpress date month and year.
                     <?php echo get_the_date('d'); ?>    <?php echo get_the_date('M , Y'); ?>
                     
                     
                     
##For display post author name and link.
                     <?php the_author_posts_link(); ?>
                     
                     
                     
##For display post categories with links.
                     <?php echo get_the_category_list( __( ', ', 'twentyeleven' ) ); ?>
                     
                     
                     
##For display comment number.
                    <?php comments_number( '0', '1', '%' ); ?>
                    
                    
                    
##For display post content.
                    <?php the_content( __( '....', 'twentyeleven' ) ); ?>
                    
                    

##For display post thumbnail:-
                      <?php the_post_thumbnail('thumbnail'); ?>   
                      
                                        
                    
                    
##For display read more only for post listing page.
                   <?php if(!is_single()) { ?>  <?php } ?>  
                   
                                    
                   
##For display any sidebar widgets:- 
                   <?php dynamic_sidebar( 'sidebar-4' ); ?>
                   
                   
                   
##For display any shortcode :-
                   <?php echo do_shortcode('------------'); ?>    
                   
                   
       
##For give a page url:-
                   <?php echo get_permalink( 10 ); ?>
                   
                   


##For display wordpress menus:- 
<?php wp_nav_menu( array( 'menu' => 'menus','menu_class'=> '','menu_id' => '','container' =>'none') ); ?>



       
##For give selected class on home page:- 
                   <?php if(is_front_page()){echo 'class="select"';}?>
                   
                   
                   
##For check page id :- 
                  <?php if(is_page(12)){echo 'class="select"';}?> 
                  
                                    
                          
##For give home page url:-
                   <?php bloginfo( 'url' ); ?>    
                   
                              
                                 
                   
##For display post time ago
                   <?php
                         function time_ago( $type = 'post' )
						  {
	                     $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
	                    return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
                           }          
                     ?>  
                     
                     
                     
                    
##For remove warnings form webpage:-
                         <?php 
                              error_reporting(0);
                              @ini_set('display_errors', 0);
                         ?>   
                         
                                                    
                   
##For display Search form : -
                  <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                   <input type="text" class="search_tx" name="s" id="s" value="Search"   onclick="this.value=''" onblur="if(this.value=='')this.value='Search'" >
                   <input type="submit" class="search_go" name=" " value=" ">
                   </form> 
                
                
                
##For display any custom post type:-
                          <?php  query_posts( array( 'post_type' => 'testimony-video', 'posts_per_page' => 10000, 'caller_get_posts' => 1, 'paged' => $paged , 'order' => asc ) ); ?>  
                       <?php while ( have_posts() ) : the_post();  ?>
                                 <?php echo get_the_content(); ?>              
                       <?php endwhile; ?>                   



##For display wordpress pagination on custom post:-
			<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                              query_posts( array( 'post_type' => 'temoignages', 'posts_per_page' => 8, 'caller_get_posts' => 1, 'paged' => $paged , 'order' => DESC ) );  ?>
         
         
                  
                  
##For check url :-
			<?php  
               $path = $_SERVER['REQUEST_URI'] ; 
                 $test = explode('/',$path);
                   if (in_array("fr", $test)) { 
                }
              ?>




##For display post time ago
			<?php
            function time_ago( $type = 'post' ) {
                $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
            
                return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
            
            }                                                      
             ?>
             
             
             
             
                               
##For display any post and page content.
                      <?php    $my_id = 148;
                       $post_id_5369 = get_post($my_id);
                      //print_r($post_id_5369);
                      $content = $post_id_5369->post_content;
                      $title = $post_id_5369->post_title;
                      $content = apply_filters('the_content', $content);
                     $content = str_replace(']]>', ']]>', $content);
                     echo $content;     ?>




##For make reset any query:-
                         <?php wp_reset_query(); ?>
               
               
               
                         
                         
##For get total number of post:- 
                        <?php  sizeof($posts) ?>




##For give login and logout url:- 
                    <?php     if ( is_user_logged_in() ) {
	                echo '<a href="'.wp_logout_url().'" title="Logout" class="hunderline"><img src="'. get_template_directory_uri() .'/images/logout.png" alt="in" /></a>';
					} else {
					    echo '<a href="'.wp_login_url().'" title="Login" class="hunderline"><img src="'. get_template_directory_uri() .'/images/login.png" alt="in" /></a>';
					}
                   	?> 
                    
                    
                    
                    
##For display all post categories :-
			<?php $args = array(
                'type'                     => 'post',
                'child_of'                 => 0,
                'parent'                   => '',	
                 'depth'                    => 1,
                'hierarchical'             => 2,
                'exclude'                  => '',
                'include'                  => '',
                'number'                   => '',
                'taxonomy'                 => 'category',
                'pad_counts'               => false );?>
            <?php $categories = get_categories($args); ?>
            <?php $loop=1; ?> <?php
            foreach ($categories as $cat) {
                        if($cat->parent == 0 ){ 
                         $catid = $cat->term_id;
                         $cur_cat_id = get_cat_id( single_cat_title("",false) );
                         $temp = $cur_cat_id;
                            //echo $temp = $_REQUEST['cid']; ?>
                        <li> <a href="<?php echo  get_category_link( $cat->term_id ) ?>" <?php if ($temp == $catid ) { ?> class = "current"<?php }?>  > <?php echo $cat->cat_name ;  ?></a></li>
            
                       <?php }
             } ?>    
    
    
    
    
    

##For disable admin bar for another users :- 
             <?php
                if( !current_user_can( 'manage_options' ) ) {
                add_action('admin_menu', 'remove_menus');
                }
                ?>
            
            
            
                
                
##Remove admin menu for another users:- 
				<?php
                function remove_menus () {
                    global $menu;
                    
                    $restricted = array(__('Contact'), __('Comments'), __('Media'), __('Comments'), __('Tools'), __('Slides'));
                    end ($menu);
                    while (prev($menu)){
                        $value = explode(' ',$menu[key($menu)][0]);
                        if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
                    }
                   }
                   
                if( !current_user_can( 'manage_options' ) ) {
                add_action('admin_menu', 'remove_menus');
                }                
                   ?> 
                   
                    
                    
                      
##For add a custom texonomies in post:-
			<?php
            function add_custom_taxonomies() {
                // Add new "Locations" taxonomy to Posts
                register_taxonomy('Shaikh', 'post', array(
                    // Hierarchical taxonomy (like categories)
                    'hierarchical' => true,
                    // This array of options controls the labels displayed in the WordPress Admin UI
                    'labels' => array(
                        'name' => _x( 'Shaikh', 'taxonomy general name' ),
                        'singular_name' => _x( 'Shaikh', 'taxonomy singular name' ),
                        'search_items' =>  __( 'Search Locations' ),
                        'all_items' => __( 'All Locations' ),
                        'parent_item' => __( 'Parent Location' ),
                        'parent_item_colon' => __( 'Parent Location:' ),
                        'edit_item' => __( 'Edit Shaikh' ),
                        'update_item' => __( 'Update Shaikh' ),
                        'add_new_item' => __( 'Add New Shaikh' ),
                        'new_item_name' => __( 'New Shaikh Name' ),
                        'menu_name' => __( 'Shaikh' ),
                    ),
                    // Control the slugs used for this taxonomy
                    'rewrite' => array(
                        'slug' => 'Shaikh', // This controls the base slug that will display before each term
                        'with_front' => false, // Don't display the category base before "/locations/"
                        'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
                    ),
                ));
            }
            add_action( 'init', 'add_custom_taxonomies', 0 );
          
		        ?> 
                
                
                
                
                
                              
##How display woocommerce product categories:- 
				<?php
                $args = array(
                    'number'     => $number,
                    'orderby'    => $orderby,
                    'order'      => $order,
                    'hide_empty' => $hide_empty,
                    'include'    => $ids,
                     'parent'    => 0
                );
                
                $product_categories = get_terms( 'product_cat', $args );
                 foreach( $product_categories as $cat ) {
                 echo '<li><a href="'. get_site_url().'/product-category/'. $cat->slug .'">'. $cat->name . '</a></li>';
                 }
                ?>




##Woocommerce check is category page or not :- 
              <?php if(is_product_category()) { echo 'class="select"'; } ?>








