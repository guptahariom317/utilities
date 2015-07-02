<?php class WP_Widget_Recent_Posts1 extends WP_Widget {

	function WP_Widget_Recent_Posts1 () {
		$widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "Coustom Widget for most recent posts") );
		//parent::__construct('recent-posts', __('Recent Posts-m'), $widget_ops);
		parent::WP_Widget(false,$name = __('Sidebar-Tabs', eedan),$widget_ops);
		$this->alt_option_name = 'widget_recent_entries';

		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('widget_recent_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
		if ( ! $number )
 			$number = 10;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => 2, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		
		
		
		if ($r->have_posts()) :
?>
<?php echo $before_widget; ?>
  <div class="blog-post-outer">
    <div class="blog-post-tab">
      <ul class="tabs">
        <li class="active"><a href="#recent">Latest Posts</a></li>
        <li><a href="#popular">Popular Posts</a></li>
       <?php /*?> <li data-tab="tags">Tags</li><?php */?>
      </ul>
    </div>
    <div class="blog-tab-content">
      <div id="recent" class="tab_content">
        <div class="sidebar-post-content">
		
	
		<ul>
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<li>
                <div class="sidebar-box-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog_small'); ?></a></div>
                
                 <div class="sidebar_blog_content">
                 <div class="sidebar-box-title"><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></div>
				<div class="sidebar-box-date"><?php echo get_the_date(); ?></div>
				</div>
			
			
          <?php /*?><?php echo substr(strip_tags(get_the_content()), 0 , 100); ?>...
      <a href="<?php the_permalink(); ?>">Read More[+]</a><?php */?>
      </li>
		<?php endwhile; 
		wp_reset_query();?>
	 </ul>
        </div>
      </div>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
		
		
		

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_recent_posts', $cache, 'widget');
			query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=2'); ?>
			   <div id="popular" class="tab_content">
        <div class="sidebar-post-content">
          <ul>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<li>
     <div class="sidebar-box-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog_small'); ?></a></div>
	
     <div class="sidebar_blog_content">      
         <div class="sidebar-box-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
         <div class="sidebar-box-date"><?php the_time('F j, Y'); ?></div>
	</div>	
               <?php /*?> <?php echo substr(strip_tags(get_the_content()), 0 , 100); ?>...
      <a href="<?php the_permalink(); ?>">Read More[+]</a><?php */?></li>
	<?php
	endwhile; endif;
	wp_reset_query();
	?>
          </ul>
        </div>
      </div>
      
      
      
      
           <?php /*?><div id="tags" class="tab_content">
        <div class="sidebar-post-content tags"><ul>
      <?php
      $tags = get_tags();
$html = '';
foreach ( $tags as $tag ) {
	$tag_link = get_tag_link( $tag->term_id );
			
	$html .= "<li><a href='{$tag_link}'>";
	$html .= "{$tag->name}</a></li>";
}
$html .= '';
echo $html;?>
     </ul></div>  </div><?php */?>
     
</div></div>

<?php
}
       
      
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_entries']) )
			delete_option('widget_recent_entries');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_recent_posts', 'widget');
	}

	function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
<?php
	}
}
register_widget('WP_Widget_Recent_Posts1');
?>
