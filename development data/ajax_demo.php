
<?php 

add_action( 'wp_ajax_load_recepies_of_plans', 'load_recepies_of_plans' );
add_action( 'wp_ajax_nopriv_load_recepies_of_plans', 'load_recepies_of_plans' );


function load_recepies_of_plans(){
	
	global $post;
	global $wpdb;
	$response=array();
	
	$show_reecpies="";
	
	$plan_id=$_REQUEST['plan_id'];
	
	
	
	$table=$wpdb->prefix."plans";
		
	$sql="SELECT plans.*,dd.date,df.recepie_id,df.food_time_id,ft.food_time FROM $table as plans ";
	$sql.=" LEFT JOIN wp_days_details as dd";
	$sql.=" ON dd.plan_id=plans.id";
	$sql.=" LEFT JOIN wp_days_foods as df ON dd.id=df.day_detail_id";
	$sql.=" LEFT JOIN wp_food_time as ft ON df.food_time_id=ft.id";
	$sql.=" where plans.id='$plan_id'";
	$rows=$wpdb->get_results($sql);
	$i=1;
	
	//$show_reecpies .="<select id='Plan_Recp".$plan_id."'>";
	$show_reecpies .="<option value=''>Choose a Recipes</option>";
	foreach($rows as $row)
	{
		$recepie_id=$row->recepie_id;
		//$recepie_name = get_the_title( $recepie_id );
		$show_reecpies .="<option value='".$recepie_id."'>";
		$show_reecpies .=get_the_title( $recepie_id );
		$show_reecpies .="</option>";
	}
//	$show_reecpies .="</select>";
	
	echo $show_reecpies;
	exit();
	
}

?>

<script type="text/javascript">

	jQuery.ajax({
		url : ajaxurl,
		beforeSend : function(){jQuery('#ajax_process').css("display","block");},
		 type: "POST",
		data: {
			plan_id: plan_id,
			action: 'load_recepies_of_plans'
		},
		
		success: function( data ) {
		// alert(data.html);
			jQuery("#recepie_list_add option:eq(0)").prop("selected", true);
			 
			jQuery('#ajax_process').css("display","none");
		 	var result=data;
			
			//alert(result);
		
			jQuery("#recep_dropdown").empty();
			jQuery("#recep_dropdown").append(result);
			jQuery("#front_searchrecepie_list").trigger("chosen:updated");
		}
	});

</script>