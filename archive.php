<?php get_header();?>
<?php if ( have_posts() ) : ?>
	<?php get_template_part( 'templates/content', 'archive' );?>
<?php else :?>
	<?php get_template_part( 'content', 'none' );?>
<?php endif;?>
<?php get_sidebar(); ?>
<?php get_footer();?>