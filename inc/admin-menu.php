<?php

add_action('admin_menu', 'contact_us');

function contact_us() {

add_theme_page('bigstore Settings', 'bigstore Settings', 'administrator', 
'bigstore-options', 'bigstore_settings_page');

add_action( 'admin_init', 'register_bigstoresettings' );
}


function register_bigstoresettings() {
register_setting( 'bigstore-settings-group', 'bigstore_phone' );
register_setting( 'bigstore-settings-group', 'bigstore_address' );
register_setting( 'bigstore-settings-group', 'bigstore_email' );
register_setting( 'bigstore-settings-group', 'bigstore_copyright' );
register_setting( 'bigstore-settings-group', 'bigstore_facebook' );
register_setting( 'bigstore-settings-group', 'bigstore_twitter' );
register_setting( 'bigstore-settings-group', 'bigstore_google' );
}

function bigstore_settings_page() {
?>
<div class="wrap">
<h2>bigstore Options</h2>

<form method="post" action="options.php">

<?php settings_fields('bigstore-settings-group'); ?>
    
<h3>General settings</h3>
<table class="form-table">
<tr valign="top">
    <th scope="row">Phone</th>
    <td><textarea name="bigstore_phone"><?php echo get_option('bigstore_phone'); ?></textarea></td>
</tr>

<tr valign="top">
    <th scope="row">Address</th>
    <td><textarea name="bigstore_address"><?php echo get_option('bigstore_address'); ?></textarea></td>
</tr>

<tr valign="top">
    <th scope="row">Email</th>
    <td><textarea name="bigstore_email"><?php echo get_option('bigstore_email'); ?></textarea></td>
</tr>

<tr valign="top">
    <th scope="row">Copyright</th>
    <td><textarea name="bigstore_copyright"><?php echo get_option('bigstore_copyright'); ?></textarea></td>
</tr>
</table>
    
<h3>Social Links</h3>
<table class="form-table">
<tr valign="top">
    <th scope="row">Link Facebook</th>
    <td><textarea name="bigstore_facebook"><?php echo get_option('bigstore_facebook'); ?></textarea></td>
</tr>

<tr valign="top">
    <th scope="row">Link Twitter</th>
    <td><textarea name="bigstore_twitter"><?php echo get_option('bigstore_twitter'); ?></textarea></td>
</tr>

<tr valign="top">
    <th scope="row">Link Google</th>
    <td><textarea name="bigstore_google"><?php echo get_option('bigstore_google'); ?></textarea></td>
</tr>

</table>


<p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes', 'bigstore') ?>" />
</p>

</form>
</div>

<?php } ?>