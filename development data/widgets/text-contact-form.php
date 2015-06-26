<?php

class text_contact_form extends WP_Widget 
{

 function text_contact_form() 
 {

  $widget_ops = array('description' => 'Text Contact form' );
  $control_ops = array('width' => 400, 'height' => 350);
       parent::WP_Widget(false, $name = __('Text Widget-mm', eedan),$widget_ops, $control_ops);   

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
      <label for="<?php echo $this->get_field_id('Content'); ?>"><?php _e('Content:'); ?></label>
      <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('Content'); ?>" name="<?php echo $this->get_field_name('Content'); ?>"><?php echo $text; ?></textarea>
  </p>
  
  <?php do_action('icl_language_selector'); ?>










<?php 

 }

 function widget($args, $instance) 
 //frontend output
 {

?>
      <h2><?php echo $instance['title']; ?></h2>  
      <h2><?php echo $instance['Content']; ?></h2>  


      <div class="clear"></div>
     </div>
<?php 

 }

}

register_widget('text_contact_form');
?>
