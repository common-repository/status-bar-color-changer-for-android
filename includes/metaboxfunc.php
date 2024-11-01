<?php
/**
 * @Author: joeta
 * @Date:   2018-04-25 22:44:17
 * @Last Modified by:   joeta
 * @Last Modified time: 2018-04-25 23:35:33
 */

function chromecolortheme_metabox_func($object)
{
	wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    $chromecolorvalue = get_post_meta( $object->ID, "meta-box-chromecolor", true );
    if(empty($chromecolorvalue)){
        $chromecolorvalue = get_option('chromecolortheme_value', '#fff');
        $chromecolorvalue = esc_html($chromecolorvalue);
    }
?>
    <div>
    	<label for="meta-box-chromecolor"><?php _e('Android Status Bar Color','status-bar-color-changer-for-android');?></label>
    	<input name="meta-box-chromecolor" class="jscolor" value="<?php echo $chromecolorvalue ?>">
    	<br>
    </div>
<?php
}

function chromecolortheme_custom_meta_box()
{
    $screens = array('post', 'page');
    foreach ($screens as $screen) {
        add_meta_box("chromecolorthemetaboxid", "Chrome Color Theme", "chromecolortheme_metabox_func", $screen, "side", "high", null);
    }
}

function save_chromecolor_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $meta_box_color_value = "";
    if(isset($_POST["meta-box-chromecolor"]))
    {
        $meta_box_color_value = $_POST["meta-box-chromecolor"];
    }
    update_post_meta($post_id, "meta-box-chromecolor", $meta_box_color_value);
}
?>