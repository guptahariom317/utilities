<?php

class socialgoogle_widget extends WP_Widget 
{

 function socialgoogle_widget() 
 {

  $widget_ops = array('description' => 'Coustom Google plus widget' );
  $control_ops = array('width' => 400, 'height' => 350);
       parent::WP_Widget(false, $name = __('Google plus', eedan),$widget_ops, $control_ops);   

 }

 function form($instance) 
 {

  // outputs the options form on admin
?>
 <?php /*?>   <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
   </p><?php */?>
  
 
 <?php /*?><p>
      <label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $instance['height']; ?>" style="width: 40px;"  />
   &nbsp;&nbsp;&nbsp;&nbsp;
      <label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('Width'); ?>" name="<?php echo $this->get_field_name('Width'); ?>" type="text" value="<?php echo $instance['Width']; ?>" style="width: 40px;" />
   </p>
<?php */?>


<?php 

 }

 function widget($args, $instance) 
 //frontend output
 {

?>
     <div class="google-plus-feeds social-feeds">
        <div class="social-media-title"><img src="<?php echo get_template_directory_uri(); ?>/images/google-plus-logo.gif" alt="google-plus" /></div>
		

   <iframe src="http://widgetsplus.com:8080/33547.htm" width="<?php echo $instance['Width']; ?>" height="<?php echo $instance['height']; ?>" style="padding:0; margin:0; overflow:hidden;" frameborder="0"></iframe>
    </div>
  <?php //echo do_shortcode('[WPCR_INSERT]'); ?>
<?php 

 }

}

register_widget('socialgoogle_widget');
?>
