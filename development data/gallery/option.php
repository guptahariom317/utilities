<?php ob_start(); 
if (!function_exists('is_admin')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
	
}
?>
<div class="wrap">
<h2>Gallery slider option</h2>
<P>Add this shortcode when you used pages [galleryimg] .</P>
<form method="post" action="options.php">
    <?php settings_fields( 'gallery-settings-group' ); ?>
    <?php do_settings_sections( 'gallery-settings-group' ); ?>  
    <table class="form-table">
     <tr valign="top">
        <th scope="row">page id</th>
        <td><input type="text" name="page_id" value="<?php echo esc_attr( get_option('page_id') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Shareaholic id</th>
        <td><input type="text" name="Shareaholic" value="<?php echo esc_attr( get_option('Shareaholic') ); ?>" /></td>
        </tr> 
        
        <tr valign="top">
        <th scope="row">Pass adsense here(300*250)</th>
        <td><?php /*?><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /><?php */?>
        <textarea class="widefat" rows="10" cols="6" id="adsens" name="new_option_name"><?php echo esc_attr(get_option('new_option_name') ); ?></textarea>
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Pass adsense here(720*90)</th>
        <td><?php /*?><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /><?php */?>
        <textarea class="widefat" rows="10" cols="6" id="adsens1" name="new_adds"><?php echo esc_attr(get_option('new_adds') ); ?></textarea>
        </td>
        </tr>
        </table>
    <?php submit_button(); ?>
</form>
</div>