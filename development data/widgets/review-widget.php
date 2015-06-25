<?php

class client_widget extends WP_Widget 
{

 function client_widget() 
 {

  $widget_ops = array('description' => 'Coustom Text box widget' );
  $control_ops = array('width' => 400, 'height' => 350);
       parent::WP_Widget(false, $name = __('WRM Clients Review', eedan),$widget_ops, $control_ops);   

 }

 function form($instance) 
 {

  // outputs the options form on admin
?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
   </p>
<p>
      <label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Title Url:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $instance['url']; ?>" />
   </p>
  
 










<?php 

 }

 function widget($args, $instance) 
 //frontend output
 {
    

?>
       <div class="sidebar-testimonial">
       <div class="sidebar-testimonial-inner">
    	<div class="sidebar-testimonial-title"><a href="<?php echo $instance['url']; ?>"><?php echo $instance['title']; ?></a></div>
    
       		<ul>
			<?php show_wpcr_custom(); ?>
			</ul>

    	</div>
  	</div>
  <?php //echo do_shortcode('[WPCR_INSERT]'); ?>
<?php 

 }

}

register_widget('client_widget');
?>
