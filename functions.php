<?php

/*---------------Constantes----------------------*/
define("DOMAIN", "theme");
define("THEMEDIR", get_template_directory());
define("TEMPLATEDIR", THEMEDIR."/templates");
define("INCDIR", THEMEDIR."/inc");
define("LENGUAGESDIR", THEMEDIR."/lenguages");

define("THEMEURI", get_template_directory_uri());
define("CSSURI", THEMEURI."/css");
define("JSURI", THEMEURI."/js");
define("IMGURI", THEMEURI."/images");

define("URLREFERER", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
define("SITENAME", get_bloginfo('name'));
define("SITEDESC", get_bloginfo('description'));
define("SITEURL" , get_bloginfo('url'));
define("SITELANG", get_bloginfo('language'));
define("CHARSET", get_bloginfo('charset'));
define("HTMLTYPE", get_bloginfo('html_type'));
define("SITECPRG", esc_attr(get_option('copyright_site')));
define("SITEKEYW", esc_attr(get_option('keywords_site')));

/*---------------Fin Constantes-----------------*/


/*---------------Funciones base-----------------*/

function bug($run){echo "<pre>";var_dump($run);exit;}
function import_inc($name){include INCDIR."/$name.php";}
function post_classnames($post_id){return implode(' ',get_post_class('',$post_id));}
function get_primary_menu()
{
	import_inc('wp_bootstrap_navwalker');
	wp_nav_menu( 
		array(
            'menu'              => 'primary',
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => '',
            'container_class'   => '',
        	'container_id'      => 'menu-principal',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker()
        )
    );
}
function get_current_page()
{
	if(!!is_404()){return '404';}
	if(!!is_admin()){return 'admin';}
	if(!!is_home()){return 'home';}
	if(!!is_front_page()){return 'front_page';}
	if(!!is_archive()){return 'archive';}
	if(!!is_attachment()){return 'attachment';}
	if(!!is_author()){return 'author';}
	if(!!is_category()){return 'category';}
	if(!!is_page()){return 'page';}
	if(!!is_paged()){return 'paged';}
	if(!!is_post_type_archive()){return 'post_type_archive';}
	if(!!is_search()){return 'search';}
	if(!!is_single()){return 'single';}
	if(!!is_tag()){return 'tag';}
	if(!!is_tax()){return 'tax';}
	return 'index';
}
function the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( DOMAIN.'_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
function get_open_graph_image()
{
	if (is_single())
	{
		global $post;
		if(get_the_post_thumbnail($post->ID, 'thumbnail'))
		{
			$thumbnail_id     = get_post_thumbnail_id($post->ID);
			$thumbnail_object = get_post($thumbnail_id);
			return $thumbnail_object->guid;
		} 
		return '';
	}
}
function get_open_graph_url()
{
	return !!get_the_permalink()?get_the_permalink():SITEURL;
}
function get_open_graph_title()
{
	return !!get_the_title()?get_the_title():SITENAME;
}
function get_open_graph_description()
{
	global $post; setup_postdata($post); 
	return !!get_excerpt('short','',FALSE)?get_excerpt('short','',FALSE):SITEDESC;
}
function excerpt($len=NULL,$more=NULL,$moreLink=TRUE)
{
	echo get_excerpt($len,$more,$moreLink);
}
function get_excerpt($len=NULL,$more=NULL,$moreLink=TRUE)
{
	if(!!in_array($len,array('short','regular','long')))
	{
		$len = esc_attr(get_option("excerpt_".$len."_site"));
	}
	else
	{
		$len = !is_numeric($len)?esc_attr(get_option("excerpt_regular_site")):intval($len);	
	}
	
	$more = is_null($more)?__('Read More',DOMAIN):strval($more);

	$more = !!$moreLink?' <a href="'.get_permalink().'" class="read-more" >'.$more.'</a>':' '.$more;

	return wp_trim_words(get_the_content(), $len, $more );
}
function default_setting($options=array())
{
	foreach ($options as $key => $value) {
		if(esc_attr(get_option($key))=='')
		{
			update_option($key,$value);
		}
	}
}
/*---------------Fin Funciones base-------------*/

/*---------------wordpress config---------------*/
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
show_admin_bar( false );

add_action( 'after_setup_theme', 'setup_theme' );
function setup_theme()
{
	load_theme_textdomain( DOMAIN, THEMEDIR. '/languages' );
    
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', DOMAIN ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', DOMAIN ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_nav_menus( array(
    	'primary' => __( 'Primary Menu', DOMAIN ),
	));
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );
}


add_action( 'wp_enqueue_scripts', 'include_stylesheet' );
function include_stylesheet()
{
	//wp_enqueue_style('open-sans_google','http://fonts.googleapis.com/css?family=Open Sans:300italic,400italic,600italic,300,400,600&subset=latin,latin-ext&ver=4.0');
	wp_enqueue_style('normalize_css', '//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css');
	wp_enqueue_style('bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');
	wp_enqueue_style('font_awesome_css', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
	wp_enqueue_style('estilo', THEMEURI.'/style.css');

	if(is_home() || is_front_page())
	{
		wp_enqueue_style('lbh_index', CSSURI.'/index.css');
	}
}
add_action( 'wp_enqueue_scripts', 'incluirJavascript' ); 
function incluirJavascript() {
	wp_deregister_script( 'jquery' );
	if(is_home() || is_front_page()){
		//wp_enqueue_script('lbh_index', JSURI.'/index.js',null,null, true);
	}

}

add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', THEMEURI.'/login.css' );
    wp_enqueue_script( 'custom-login', THEMEURI.'/login.js' );
}

add_filter( 'login_headerurl', 'login_logo_url' );
function login_logo_url()
{
    return esc_url(home_url('/'));
}

add_filter( 'login_headertitle', 'login_logo_url_title' );
function login_logo_url_title()
{
    return SITENAME;
}

add_filter( 'comment_form_field_comment', 'comment_editor' );
function comment_editor() {
	global $post;
	ob_start();
 
	wp_editor( '', 'comment', array(
    	'textarea_rows' => 15,
    	'teeny' => true,
    	'quicktags' => false,
    	'media_buttons' => false
  	) );
 
  	$editor = ob_get_contents();
 
  	ob_end_clean();
	return str_replace( 'post_id=0', 'post_id='.get_the_ID(), $editor );
}
 
add_filter( 'comment_reply_link', 'change_comment_reply_link' );
function change_comment_reply_link($link) {
    return str_replace( 'onclick=', 'data-onclick=', $link );
}

add_action( 'admin_init', function(){
	register_setting( 'seo-options', 'copyright_site' );
	register_setting( 'seo-options', 'keywords_site' );
	register_setting( 'theme-options', 'excerpt_short_site' );
	register_setting( 'theme-options', 'excerpt_regular_site' );
	register_setting( 'theme-options', 'excerpt_long_site' );
});

add_action('admin_menu', function(){
	add_options_page('SEO', 'SEO', 'manage_options', 'seo-options', function(){
		get_template_part( 'templates/seo-admin', 'options' );
	});
});
add_action('admin_menu', function(){
	add_options_page('Theme', 'Theme', 'manage_options', 'theme-options', function(){
		default_setting(array(
			"excerpt_short_site"   => 25,
			"excerpt_regular_site" => 55,
			"excerpt_long_site"    => 100
		));
		get_template_part( 'templates/theme-admin', 'options' );
	});
});


add_filter( 'wp_title', function($title, $sep){
	global $paged, $page;

	if (is_feed()){return $title;}

	$title .= get_bloginfo( 'name', 'display' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {$title = "$title $sep $site_description";}

	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {$title = "$title $sep " . sprintf( __( 'Page %s', DOMAIN ), max( $paged, $page ) );}

	return $title;
}, 10, 2 );

/*-------------Fin wordpress config-------------*/