<?php

/**
 * @Author: joeta
 * @Date:   2018-03-11 12:29:46
 * @Last Modified by:   joeta
 * @Last Modified time: 2018-03-13 00:36:42
 */
function chromecolortheme_register_navigtation(){
	$chromecolortheme_pagename = __('Status Bar Color Settings','status-bar-color-changer-for-android');
	$chromecolortheme_navname = __('Status Bar Color', 'status-bar-color-changer-for-android');
	add_options_page( $chromecolortheme_pagename, $chromecolortheme_navname, 'manage_options', 'chrome-color-themes', 'chromecolortheme_options_page');
}
?>