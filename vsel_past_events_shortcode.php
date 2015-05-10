<?php

// The shortcode
function vsel_past_events_shortcode() {

echo '<div id="vsel">';

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
	$today = strtotime('today'); 

	$vsel_meta_query = array( 
		'relation' => 'AND',
		array( 
			'key' => 'event-date', 
			'value' => $today, 
			'compare' => '<' 
		) 
	); 

	$vsel_query_args = array( 
		'post_type' => 'event', 
		'post_status' => 'publish', 
		'ignore_sticky_posts' => true, 
		'meta_key' => 'event-date', 
		'orderby' => 'meta_value_num', 
		'order' => 'desc',
 		'paged' => $paged, 
		'meta_query' => $vsel_meta_query,
	); 

	$vsel_events = new WP_Query( $vsel_query_args );

	if ( $vsel_events->have_posts() ) : 
		while( $vsel_events->have_posts() ): $vsel_events->the_post(); 
	
		$event_date = get_post_meta( get_the_ID(), 'event-date', true ); 
		$event_time = get_post_meta( get_the_ID(), 'event-time', true ); 
		$event_location = get_post_meta( get_the_ID(), 'event-location', true ); 
		$event_link = get_post_meta( get_the_ID(), 'event-link', true ); 

		// display the event list
		echo '<div class="vsel-content">';
			echo '<div class="vsel-meta">';
				echo '<h4>';
				echo the_title();  
				echo '</h4>';
				echo '<p>';
				_e( 'Date: ', 'eventlist' ); 
				echo date_i18n( 'j F Y', $event_date ); 
				echo '</p>';
				if(!empty($event_time)){
					echo '<p>';
					_e( 'Time: ', 'eventlist' ); 
					echo $event_time; 
					echo '</p>';
				}
				if(!empty($event_location)){
					echo '<p>';
					_e( 'Location: ', 'eventlist' ); 
					echo $event_location; 
					echo '</p>';
				}
				if(!empty($event_link)){
					echo '<p>';
					_e( 'More info: ', 'eventlist' ); 
					echo '<a href="';
					echo $event_link;
					echo '" target="_blank">'; 
					_e( 'click here', 'eventlist' ); 
					echo '</a>';
					echo '</p>';
				}
			echo '</div>';
			echo '<div class="vsel-info">';
				if ( has_post_thumbnail() ) { 
					the_post_thumbnail(); 
				} 
				the_content();
			echo '</div>';
		echo '</div>';
	
		endwhile; 
	
		// pagination
		next_posts_link(  __( '&laquo; Next Events', 'eventlist' ), $vsel_events->max_num_pages ); 
		previous_posts_link( __( 'Previous Events &raquo;', 'eventlist' ) ); 

		wp_reset_postdata(); 

		else:
 
		echo '<p>';
		_e('There are no upcoming events.', 'eventlist');
		echo '</p>';
	endif; 

echo '</div>';

} 

add_shortcode('vsel_past_events', 'vsel_past_events_shortcode');

?>