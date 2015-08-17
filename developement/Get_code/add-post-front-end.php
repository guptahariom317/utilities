<?php $postTitle = $_POST['post_title'];
$post = $_POST['post'];
$submit = $_POST['submit'];

if(isset($submit)){

    global $user_ID;
/***************title-contant************/
    $new_post = array(
        'post_title' => $postTitle,
        'post_content' => $post,
        'post_status' => 'draft',
        'post_date' => date('Y-m-d H:i:s'),
        'post_author' => $user_ID,
        'post_type' => 'upload',
        'post_category' => array(0)
    );

  $newpost_id =  wp_insert_post($new_post);
/***************meta-box************/	
	if($newpost_id!=0)
	{
		add_post_meta($newpost_id, 'email', $_POST['email']);
	}
}
/***************fetured-attchment************/
function insert_attachment($file_handler,$post_id,$setthumb='false') {
	// check to make sure its a successful upload
	if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

	require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');

	$attach_id = media_handle_upload( $file_handler, $post_id );


	if ($setthumb=="false") 
	 	update_post_meta($post_id,'_thumbnail_id',$attach_id);
	return $attach_id;
}
if ($_FILES) {
	foreach ($_FILES as $file => $array) {
	$newupload = insert_attachment($file,$newpost_id);
	// $newupload returns the attachment id of the file that
	// was just uploaded. Do whatever you want with that now.
	}
}
?>




        <form id="new_post" name="new_post" method="post" action="" class="wpcf7-form" enctype="multipart/form-data">
        <div class="popupup_left">
        	<span>Name</span><input type="text" name="post_title" class="popint" />
            <span>Email Address</span><input type="email" name="email" class="popint" />
            <span>Caption</span><textarea name="post" ></textarea>
        </div>
        <div class="popup_right">
        	<span>Max Image Size: 1MB</span><br /><br />
  <input type="text" id="fileName1" value="Choose file" readonly="readonly" >
 <div class="file_input_div" style="display: inline;">
 <input type="button" id="upload_bt" value=" "/>
 <input type="file" name="bottle_front1"  style="opacity:0; position:relative; left:-80px;width:31px;"  onchange="javascript: document.getElementById ('fileName1').value = this.value"/>
 </div>
 
 <input type="text" value="Choose file" id="fileName2" readonly="readonly" >
 <div class="file_input_div" style="display: inline;">
 <input type="button" id="upload_bt" value=" "/>
 <input type="file" name="bottle_front2" style="opacity:0; position:relative; left:-80px;width:31px;"  onchange="javascript: document.getElementById ('fileName2').value = this.value"/>
 </div>
 
            <input type="text" value="Choose file" id="fileName3" readonly="readonly" >
 <div class="file_input_div" style="display: inline;">
 <input type="button" id="upload_bt" value=" "/>
 <input type="file" name="bottle_front3"  style="opacity:0; position:relative; left:-80px;width:31px;"  onchange="javascript: document.getElementById ('fileName3').value = this.value"/>
 </div>
        </div>
        <div class="clear"></div>
        <div class="popup_mid">
        	<input type="submit" name="submit" class="popsub" value=" " />
        </div>
        </form>