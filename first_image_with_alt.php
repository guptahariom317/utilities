<?php

//Use in function.php
//---------------------------

function catch_that_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	/*$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches[1][0];
	return $first_img;*/
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].+alt=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

	return $matches;
}

//------------------------------------------------
//Get content in template:
//------------------------------------------------

$imgscp = catch_that_image();
echo $imgscp[1][0];

?>