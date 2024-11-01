<?php
/**
 * @Author: joeta
 * @Date:   2018-03-11 13:55:26
 * @Last Modified by:   joeta
 * @Last Modified time: 2018-03-14 10:56:26
 */
function chromecolortheme_options_page(){
    $value = get_option('chromecolortheme_value', '#fff');?>
	<div class="wrap">
		<h1><?php _e('Status Bar Color Changer Settings','status-bar-color-changer-for-android'); ?></h1>
		<br>
		<form method="POST">
		    <label for="chromecolortheme_value"><?php _e('Enter Your Color', 'status-bar-color-changer-for-android'); ?></label>
		    <input  name="chromecolortheme_value" class="jscolor" value="<?php echo $value; ?>">
		    <br><br>
		    <?php wp_nonce_field( 'chromecolortheme_action', 'chromecolortheme_nonce' ); ?>
		    <br>
		    <input type="submit" value="<?php _e('Save','status-bar-color-changer-for-android'); ?>" name="chromecolorthemesubmit" class="button button-primary button-large">
		</form>
	</div><?php
	if (!current_user_can('manage_options')){
     	   wp_die('Unauthorized user');
    	}
	if (isset($_POST['chromecolorthemesubmit'])){
    	if(!check_admin_referer('chromecolortheme_action', 'chromecolortheme_nonce')){
    		_e('Sorry, your nonce did not verify.','status-bar-color-changer-for-android');
		    exit;
    	}

		if (!isset($_POST['chromecolortheme_nonce']) || ! wp_verify_nonce( $_POST['chromecolortheme_nonce'], 'chromecolortheme_action')){
		   _e('Sorry, your nonce did not verify.','status-bar-color-changer-for-android');
		   exit;
		}
		$value_for_san = sanitize_text_field($_POST['chromecolortheme_value']);
        update_option('chromecolortheme_value', $value_for_san);
        $value = $value_for_san;
        $status = true;
    }
    if (isset($status) && $status == true){
    	$chromecolortheme_truemessage = __('Changes has been saved. Please refresh.','status-bar-color-changer-for-android');
    	echo '<div class="notice notice-success is-dismissible"><p>'.$chromecolortheme_truemessage.'</p></div>';
    }
    else if (isset($status) && $status ==false) {
    	$chromecolortheme_falsemessage = __('Changes not saved. Please refresh.','status-bar-color-changer-for-android');
    	echo '<div class="notice notice-error is-dismissible"><p>'.$chromecolortheme_falsemessage.'</p></div>';
    }
    $value = get_option('chromecolortheme_value', '#fff');
}
?>