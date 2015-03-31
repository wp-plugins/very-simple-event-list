<?php

// The shortcode
function vsel_shortcode() {

	$vsel_query_args = array( 
		'post_type' => 'event', 
		'post_status' => 'publish', 
		'ignore_sticky_posts' => true, 
		'meta_key' => 'event-date', 
		'orderby' => 'meta_value_num', 
		'order' => 'decs', 
	); 
	$vsel_events = new WP_Query( $vsel_query_args );

	if ( $vsel_events->have_posts() ) : 
		while( $vsel_events->have_posts() ): $vsel_events->the_post(); 
	
		$event_date = get_post_meta( get_the_ID(), 'event-date', true ); 
		$event_time = get_post_meta( get_the_ID(), 'event-time', true ); 
		$event_location = get_post_meta( get_the_ID(), 'event-location', true ); 

		// display the event list
		echo '<div id="vsel">';
			echo '<div class="vsel-meta">';
				echo '<h4>';
				echo the_title();  
				echo '</h4>';
				echo '<p>';
				_e( 'Date: ', 'eventlist' ); 
				echo date_i18n( 'j F Y', $event_date ); 
				echo '</p>';
				echo '<p>';
				_e( 'Time: ', 'eventlist' ); 
				echo $event_time; 
				echo '</p>';
				echo '<p>';
				_e( 'Location: ', 'eventlist' ); 
				echo $event_location; 
				echo '</p>';
			echo '</div>';
			echo '<div class="vsel-content">';
				the_content();
			echo '</div>';
		echo '</div>';
	
		endwhile; else: 

		echo '<p>';
		_e('There are no upcoming events.', 'eventlist');
		echo '</p>';
	endif; 
} 

add_shortcode('vsel', 'vsel_shortcode');

?>