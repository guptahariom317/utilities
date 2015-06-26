

add_action('admin_init','my_meta_init');

function my_meta_init()
{
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

	// checks for post/page ID
	if ($post_id == '42')
	{
		add_meta_box( 'history-meta-box-detail', 'Product Images', 'history_box_funtion', 'page', 'normal', 'high' ); 
	}

}

  

function history_box_funtion( $post ) { 


	 $history_year = get_post_meta($post->ID, 'history_title'); 
	 $history_contant = get_post_meta($post->ID, 'history_contant'); 
	 
	echo '<div id="mh_vma_img">';
	if(!empty($history_year[0])) {
		foreach ($history_year[0] as $key => $spec) {
			echo '<div class="misc-pub-section"><label style="font-weight:bold;padding:0 18px 0 0;">History Year</label><input type="text" name="history_title[]"  value="'.$spec.'" size="60"/><br /><label style="font-weight:bold;">History Contant</label><textarea name="history_contant[]" cols="57" id="history_contant">'.$history_contant[0][$key].'</textarea><input type="button" class="mh_delete" value="Delete"/></div>';  
		}
	}
	echo '</div><input type="button" id="add_vma_img" value="App Image"/>';
 


    wp_nonce_field( 'history-meta-box-detail_nonce', 'history_box_nonce' );?>  
    
    
  <script type="text/javascript">
	var j = jQuery.noConflict();
 jQuery(document).ready(function() {

var formfield;
	jQuery('.mh_upload').live("click", function(){
		formfield = jQuery(this).prev();
		tb_show('','media-upload.php?type=image&TB_iframe=true');
		return false;
	});
	// send url back to editor
	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery(formfield).val(imgurl);
		tb_remove();
	}
	
	jQuery('.mh_delete').live('click', function(e) {
		parent = jQuery(this).parent().fadeOut("slow");
		parent = jQuery(this).parent().remove();
	});
	
	jQuery('.mh_copy_to').live('click', function(e) {
		copyfrom = jQuery(this).attr('copyfrom');
		copyto = jQuery(this).attr('copyto');
		jQuery('#' + copyto).append(jQuery('#' + copyfrom).html());
	});
	

jQuery('#add_vma_img').live('click', function(e) {
		jQuery('#mh_vma_img').append('<div class="misc-pub-section"><label style="font-weight:bold;padding:0 18px 0 0;"> Image Link: </label><input type="text" name="history_title[]"  value="" size="60"/><br /><label style="font-weight:bold;">History Contant</label><textarea name="history_contant[]" cols="57" ></textarea><input type="button" class="mh_delete" value="Delete"/></div>');
	});


}); 


</script>

<?php  
} 

add_action( 'save_post', 'history_meta_box_save' );  
function history_meta_box_save( $post_id )  
{  
    // Bail if we're doing an auto save  
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
    // if our nonce isn't there, or we can't verify it, bail 
    if( !isset( $_POST['history_box_nonce'] ) || !wp_verify_nonce( $_POST['history_box_nonce'], 'history-meta-box-detail_nonce' ) ) return; 
    // if our current user can't edit this post, bail  
    if( !current_user_can( 'edit_post' ) ) return;  
    // now we can actually save the data  
    $allowed = array(  
        'a' => array( // on allow a tags  
            'href' => array() // and those anchors can only have href attribute  
        )  
    );  
    
		
		if( isset( $_POST['history_title'] ) )  
        update_post_meta( $post_id, 'history_title', $_POST['history_title'] );
		
		if( isset( $_POST['history_contant'] ) )  
        update_post_meta( $post_id, 'history_contant', $_POST['history_contant'] );
		
		

}   




/*****************get value**************/

 <?php  
			
							$videourls1 = get_post_meta( get_the_ID(), 'history_title', true );
							
							$videourls2 = get_post_meta( get_the_ID(), 'history_contant', true );
							
							//$hist = array($videourls[0],$videourls[1]);
							
							//print_r($hist);
					

							foreach (array_combine($videourls1, $videourls2) as $code => $name) {
			?>
							<h3><?php echo $code; ?></h3>
                              <div>
                                <?php echo $name; ?>
                              </div>
							 
		<?php 	}  ?>