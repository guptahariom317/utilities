<?php 
get_header();
global $query_string, $paged, $wp_query, $wp;
$template_include = "";
?>
<script>
jQuery(document).ready(function(){
var p = jQuery( "#tax_inn" );
var offset = p.offset();
jQuery("html,body").scrollTop(offset.top-40);
});
</script>
<link href="<?php echo plugins_url(); ?>/gallery/css/core-5.css" rel="stylesheet">
<link href="<?php echo plugins_url(); ?>/gallery/css/slider.css" rel="stylesheet">
<link href="<?php echo plugins_url(); ?>/gallery/js/share.js" rel="stylesheet">
<div id="tax_inn" class="slider_tax">
  <?php echo get_option('new_adds'); ?>
  <?php 
global $query_string, $paged, $wp_query, $wp; 
$current_page = (get_query_var('page')) ? get_query_var('page') : 1;  
$curr = $wp_query->max_num_pages;
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

?>
  
  <?php $catiddd_viewall = $_REQUEST['catid'];


 if($catiddd_viewall){
  $siteurll = get_site_url(); 



?>
 
   <div class="slide_inn">
   
   <div class="view_all_post">
   <div id="tax_inn" class="slider_tax_inn">
    <?php $queried_object = get_queried_object(); ?>
    <div class="topInfo clearfix">
      <h1><?php echo $term_name = $queried_object->name;?></h1>
      <div class="expander setTruncHeight ">
        <p><?php echo $term_name = $queried_object->description; ?></p>
      <?php $sulgg = $queried_object->slug; ?>
      </div>
    </div>
    
  </div>

   
   <ul>
  
    <?php
  $args = array(
 'post_type' => 'gallery',
 'posts_per_page' => '-1',
 
 'paged' => $paged,
 'tax_query' => array(
  array(
   'taxonomy' => 'taxonomy',
   'field' => 'id',
   'terms' => array($catiddd_viewall)
  )
 )
);
        $taxquery=new WP_Query($args);

  $curr = $taxquery->max_num_pages;
  
        while ( $taxquery->have_posts() ) : $taxquery->the_post(); ?>
        <li>   <?php 
       if ( has_post_thumbnail( $thumbnail->ID ) ) { 
	    global $post;
                              $custom = get_post_custom($post->ID);
							  $custom1 = isset($custom["custom1"]) ? $custom["custom1"][0] : "";
	   ?>
  <a href="<?php echo $custom1; ?>" target="_blank">  <?php echo get_the_post_thumbnail( $thumbnail->ID, 'large' );?> </a>
 <?php }
 ?>
    <h5><a href="<?php echo $custom1; ?>" target="_blank"><?php the_title(); ?></a></h5>
    </li>

    <?php endwhile; ?>
     </ul>
     <h1 class="catnamme"><a href="<?php echo $siteurll?>/taxonomy/<?php echo $sulgg?>">Back to Slide Show</a></h1>
     <div class="clear"></div></div><div class="right_sidebareee"><?php get_sidebar(); ?></div><div class="clere"></div></div>
  
  <?php } else { ?>

   <div class="slide_inn">
  
 <?php 
    $wp_query->in_the_loop = true; 
        $count = 0;
        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        //echo $paged;
  $current_page = (get_query_var('page')) ? get_query_var('page') : 1;
  
  $catslug = $_REQUEST['taxonomy'];
  
        ?>
  <?php $queried_object = get_queried_object(); ?>
        <?php $term = get_query_var('term'); ?>
        <?php $tax = get_query_var('taxonomy'); 
		$term_id = $queried_object->term_id;
		?>
        <?php
  $args = array(
 'post_type' => 'gallery',
 'posts_per_page' => '1',
 
 'paged' => $paged,
 'tax_query' => array(
  array(
   'taxonomy' => 'taxonomy',
   'field' => 'id',
   'terms' => array($term_id)
  )
 )
);
        $taxquery=new WP_Query($args);

  $curr = $taxquery->max_num_pages;
  
        while ( $taxquery->have_posts() ) : $taxquery->the_post(); ?>

       <?php $genre = wp_get_post_terms($post->ID, 'genre');?>
       
       <div class="slider_left">
       <div id="tax_inn" class="slider_tax_inn">
    <?php $queried_object = get_queried_object(); ?>
    <div class="topInfo clearfix">
      <h1><?php echo $term_name = $queried_object->name;?></h1>
      <div class="expander setTruncHeight ">
        <p><?php echo $term_name = $queried_object->description; ?></p>
      <?php $sulgg = $queried_object->slug; ?>
      </div>
    </div>
    
  </div>
       <div class="addinto_sharebox1"> 
   <?php $Shareaholic = get_option('Shareaholic'); 
     $Shareaholic1 =(int)$Shareaholic;
   ?>
<?php echo do_shortcode ('[shareaholic app="share_buttons" id="'.$Shareaholic1.'"]'); ?>
     
    </div>
              <?php 
       if ( has_post_thumbnail( $thumbnail->ID ) ) {
  echo get_the_post_thumbnail( $thumbnail->ID, 'large' );
 }
 ?>
      <div class="navigation clearfix">
        <div class="alignright">
          <?php if($current_page == 1) { 
    ?>
          <a href=""><img src="<?php  echo plugins_url(); ?>/gallery/images/ero2.png" /></a>
          <?php 
   }
    else { $pcurrent = $current_page - 1;
      if($catslug!="") { 
    ?>
    <a href="<?php bloginfo('url');?>/?taxonomy=<?php echo $catslug;?>&<?php echo 'page=' . $pcurrent; ?>"><img src="<?php  echo plugins_url(); ?>/gallery/images/ero2.png" /></a>
    <?php } else { ?><a href="<?php bloginfo('url');?>/taxonomy/<?php echo $term_name = $queried_object->slug;?>/?<?php echo 'page=' . $pcurrent; //next link ?>"><img src="<?php  echo plugins_url(); ?>/gallery/images/ero2.png" /></a><?php } 
    } ?>
        </div>
        <div class="alignleft">
          <?php if($current_page==$curr){
     ?>
         <a href="<?php $pageid= get_option('page_id'); echo get_the_permalink($pageid); ?>"><img src="<?php  echo plugins_url(); ?>/gallery/images/ero.png" /></a>
          <?php   }
    else 
    {
    $ncurrent = $current_page + 1;
    if($catslug!="") { 
    ?>
    
    <a href="<?php bloginfo('url');?>/?taxonomy=<?php echo $catslug;?>&<?php echo 'page=' . $ncurrent; //next link ?>"><img src="<?php  echo plugins_url(); ?>/gallery/images/ero.png" /></a>
    <?php 
    } else {?>
 <a href="<?php bloginfo('url');?>/taxonomy/<?php echo $term_name = $queried_object->slug;?>/?<?php echo 'page=' . $ncurrent; //next link ?>"><img src="<?php  echo plugins_url(); ?>/gallery/images/ero.png" /></a>
<?php    }
    
    }
    ?>
        </div>
      </div>
    </div>
    <div class="slider_right">
    <div class="slider_right_inn">
    <div class="slider_right_inner">
      <div class="navigation clearfix">
        <div class="alignleft">
          <?php if($current_page == 1) {
   echo "prev";
    ?>
          <?php } else{ $pcurrent = $current_page - 1;
     if($catslug!="") { 
    ?>
    <a href="<?php bloginfo('url');?>/?taxonomy=<?php echo $catslug;?>&<?php echo 'page=' . $pcurrent; //next link ?>">Prev</a>
    
    <?php } else { ?>
        <a href="<?php bloginfo('url');?>/taxonomy/<?php echo $term_name = $queried_object->slug;?>/?<?php echo 'page=' . $pcurrent; //next link ?>">Prev</a>
  <?php }  } ?>
        </div>
        <div class="aliginmid">
          <p>
    
    <?php if ($current_page==1){ echo '1'; } else{ echo $current_page; }?> / <?php echo $curr; ?><a href="<?php bloginfo('url');?>/taxonomy/<?php echo $term_name = $queried_object->slug;?>?catid=<?php echo $term_id; ?>">View All</a></p>
   
    
        </div>
        <div class="alignright">
          <?php if($current_page==$curr){
  ?>
          
          <?php 
      }
    else  
    {
    $ncurrent = $current_page + 1;
	 if($catslug!="") {
    ?>
    <a href="<?php bloginfo('url');?>/?taxonomy=<?php echo $catslug; ?>&<?php echo 'page=' . $ncurrent; //next link ?>">Next</a>
    <?php } else { ?>
    <a href="<?php bloginfo('url');?>/taxonomy/<?php echo $term_name = $queried_object->slug;?>/?<?php echo 'page=' . $ncurrent; //next link ?>">Next</a>
    <?php 
    }
	}
    ?>

        </div>
      </div>

      <h2>
        <?php the_title(); ?>
      </h2>
      <?php the_content(); ?>
     <h2 class="back_div"><a href="<?php $pageid= get_option('page_id'); echo get_the_permalink($pageid); ?>">Back to Slide Show Gallery</a></h2>
     </div>
     </div>
     <?php echo get_option('new_option_name'); ?>
      <div class="clear"></div>
    </div>
    
        <?php $count++; ?>
        
        <?php endwhile; ?>
        
                      
            <?php // Reset Post Data
            wp_reset_postdata();?>
  </div>
  
  <?php } ?>
  <div class="clear"></div>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>