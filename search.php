<?php get_header();?>
<h1 class="page-title"><?php printf( __( 'Search Results for: %s', DOMAIN ), get_search_query() ); ?></h1>
<?php if ( have_posts() ) :?>
	<?php while ( have_posts() ) : the_post();?>
		<?php get_template_part( 'templates/content-format', get_post_format() );?>
		<?php endwhile;?>
<?php else :?>
	<?php get_template_part( 'templates/content', 'none' );?>
<?php endif;?>
<?php get_sidebar(); ?>
<?php get_footer();?>