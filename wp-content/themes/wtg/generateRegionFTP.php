<?php
/*
* Template Name: Create FTP
*/


if (! wp_next_scheduled ( 'my_hourly_event' )) {
	wp_schedule_event(time(), 'hourly', 'my_hourly_event');
    }

    
add_action('my_hourly_event', 'create_region_FTP');

echo wp_get_schedule ('my_hourly_event');

?>
