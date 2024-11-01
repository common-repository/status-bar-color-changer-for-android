<?php

/**
 * @Author: joeta
 * @Date:   2018-03-11 14:07:00
 * @Last Modified by:   joeta
 * @Last Modified time: 2018-04-29 19:21:40
 */
function chromecolortheme_inserthead(){
	$value = get_option('chromecolortheme_value', '#fff');
	$value = esc_html($value);
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
    		$meta_value = get_post_meta( get_the_ID(), 'meta-box-chromecolor', true );
    		$meta_value = esc_html( $meta_value );
    		if( !empty( $meta_value ) ) {
        		echo '<meta name="theme-color" content="#'.$meta_value.'">';
    		}
    		else{
    			echo '<meta name="theme-color" content="#'.$value.'">';
    		}
		}
	}
	else{
		echo '<meta name="theme-color" content="#'.$value.'">';
	}
}
?>