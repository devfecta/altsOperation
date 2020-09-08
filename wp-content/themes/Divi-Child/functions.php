<?php
// Sets a Default Profile Photo
add_filter( 'avatar_defaults', 'default_gravatar' );
function default_gravatar ($avatar_defaults) {
	$myavatar = home_url() .'/wp-content/uploads/AltsOperation-Favicon.png';
	$avatar_defaults[$myavatar] = "Default Gravatar";
	return $avatar_defaults;
}
// Sets Custom Footer on Admin Side
add_filter('admin_footer_text', 'change_admin_footer');
function change_admin_footer() {
	echo '<span id="footer-note">Copyright ' . date('Y') . ' <a href="'. home_url() .'" target="_blank">Alt\'s Operation, LLC</a>.</span>';
}


add_action( 'wp_enqueue_scripts', 'load_stylesheets', PHP_INT_MAX);
function load_stylesheets() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );
}

//// WordPress Login, Registration, and Forgot Password Screen Style Sheet START
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url() {
    return home_url();
}

add_filter( 'login_headertitle', 'my_login_logo_url_title' );
function my_login_logo_url_title() {
    return 'Alt\'s Operation, LLC';
}

add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
    wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
//// WordPress Login, Registration, and Forgot Password Screen Style Sheet END

add_action('wp_head', 'add_googleanalytics');
function add_googleanalytics() { ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-65006009-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-65006009-1');
</script>
<?php } ?>
<?php

?>