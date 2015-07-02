<?php

class socialtwitter_widget extends WP_Widget 
{

 function socialtwitter_widget() 
 {

  $widget_ops = array('description' => 'Coustom Google plus widget' );
  $control_ops = array('width' => 400, 'height' => 350);
       parent::WP_Widget(false, $name = __('Twitter box', eedan),$widget_ops, $control_ops);   

 }

 function form($instance) 
 {

  // outputs the options form on admin
?>
    <p>
      <label for="<?php echo $this->get_field_id('user'); ?>"><?php _e('Username:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="user" value="<?php echo $instance['user']; ?>" />
   </p>
    <p>
      <label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Widget Id:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo $instance['id']; ?>" />
   </p>
  
<?php /*?> 
 <p>
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


<div class="twitter-feeds social-feeds">  
        <div class="social-media-title"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-logo.gif" alt="twitter" /></div>
        <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/<?php echo $instance['user']; ?>" data-widget-id="<?php echo $instance['id']; ?>" height="<?php echo $instance['height']; ?>" width="<?php echo $instance['width']; ?>">Tweets by @<?php echo $instance['user']; ?></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
  <style>
div.timeline .stream {
  height:100px !important;
}

</style>
  
  
  
  <?php //echo do_shortcode('[WPCR_INSERT]'); ?>
<?php 

 }

}

register_widget('socialtwitter_widget');
?>
