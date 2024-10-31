<?php
/*
Plugin Name: Redirect anonymous users
Plugin URI: 
Description: Users who are not logged-in are redirected to an URL.
Version: 0.1.0
Author: Manuel Razzari
Author URI: http://www.convistaalmar.com.ar/
License: License: GPL2+
*/

function redirect_anon_login_redirect() {
    global $pagenow;
    $url = get_option('redirect_anon_url');
    if($url && $url != "" && !is_user_logged_in() && $pagenow != 'wp-login.php'){
        wp_redirect( $url, 302 ); 
        exit;
	}
}
add_action( 'template_redirect', 'redirect_anon_login_redirect' );

/*
 * Options page
 */

add_action('admin_menu', 'redirect_anon_admin');
function redirect_anon_admin() {
	add_options_page('Redirect Anonymous Users', 'Redirect anonymous', 'manage_options', 'redirect_anon_settings', 'redirect_anon_options_page');
	add_action('admin_init', 'redirect_anon_init');
    $plugin = plugin_basename(__FILE__);
    add_filter( "plugin_action_links_$plugin", 'redirect_anon_settings_link', 4, 4 );	
}

function redirect_anon_init(){
	register_setting( 'redirect_anon_options', 'redirect_anon_url' );
}
function redirect_anon_options_page() {
?>
<div class="wrap">
	<h2>Redirect anonymous users</h2>

	<p>Users who are not logged-in will be <code>302</code> redirected to the absolute URL specified below.</p>
	<p>Any user who can <a href="<?php echo wp_login_url() ?>">log in</a>, from admins to subscribers, will be able to access the site.</p>
	<p>To turn off this redirection, clear the redirect URL field, or simply disable this plugin.</p>

	<form method="post" action="options.php">
		<?php settings_fields( 'redirect_anon_options' ); ?>
		<?php do_settings_sections( 'redirect_anon_options' ); ?>
		<p>
			<label for="redirect_anon_url">Redirect URL:</label>
			<input id="redirect_anon_url" name="redirect_anon_url" type="url" 
				style="width:400px;" placeholder="http://www.example.com"
				value="<?php echo esc_url( get_option('redirect_anon_url') ); ?>" />
		</p>

		<?php submit_button(); ?>

	</form>
</div>
<?php 
} 

function redirect_anon_settings_link($links, $plugin_file, $plugin_data, $context) {
	$settings_link = sprintf( '<a href="options-general.php?page=redirect_anon_settings">%s</a>', __('Settings'));
	array_unshift($links, $settings_link); 
	return $links; 
}