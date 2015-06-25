<?php class WP_Widget_Calendar1 extends WP_Widget {

	function WP_Widget_Calendar1() {
		$widget_ops = array('classname' => 'widget_calendar', 'description' => __( 'Caustom Widget calendar of your site&#8217;s posts') );
		parent::WP_Widget(false,$name = __('calendar-m', eedan),$widget_ops);
		//parent::WP_Widget(false, $name = __('Text Widget-m', eedan),$widget_ops, $control_ops);  
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
		echo '<div id="calendar_wrap">';
		get_calendar();
		echo '</div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
<?php
	}
}
register_widget('WP_Widget_Calendar1');
?>
