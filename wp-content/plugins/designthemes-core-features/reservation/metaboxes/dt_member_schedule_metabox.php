<?php global $post;
$timer = get_post_meta( $post->ID, "_timer",true);
$timer = is_array($timer) ? $timer : array();
	echo '<table>';
			foreach ( array('monday','tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday') as $day ):
				echo '<tr>';
				echo '<td>'.ucfirst( $day ).'</td>';
				echo '<td>';
				
				if(  array_key_exists("{$day}_start",$timer)  )
					$start =  $timer["{$day}_start"];
				else
					$start = dttheme_option("company","dt_company_{$day}_start");
					
				echo  dt_member_timer( "_timer[{$day}_start]", $start );
				
				echo '<span> - '.__( 'To', 'text_domain' ).' - </span>';

				if(  array_key_exists("{$day}_end",$timer)  )
					$end =  $timer["{$day}_end"];
				else
					$end = dttheme_option("company","dt_company_{$day}_end");
					
				echo  dt_member_timer( "_timer[{$day}_end]", $end, false );
				
				echo '</td>';
				echo '</tr>';
			endforeach;
	echo '</table>';?>