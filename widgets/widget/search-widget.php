<?php
/**
 * Search widget class
 *
 * @since 2.8.0
 */
 class WP_Widget_Search1 extends WP_Widget {
//for call basic function
	function WP_Widget_Search1() {
		$widget_ops = array('classname' => 'widget_search', 'description' => __( "A Coustom search form for your site") );
		//parent::__construct('search', __('Search-m'), $widget_ops);
		parent::WP_Widget(false, $name = __('Search-m', eedan),$widget_ops);
	}
	
// frontend output
	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;

		// Use current theme search form if it exists
		get_search_form();

		echo $after_widget;
	}
//backend ouput
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = $instance['title'];
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
	}
//update widget
	function update( $new_instance, $old_instance ) {
	
		$instance = $old_instance;
		$new_instance = wp_parse_args((array) $new_instance, array( 'title' => ''));
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

}
register_widget('WP_Widget_Search1');
?>
