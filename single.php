<?php get_header();?>
<?php while ( have_posts() ) : the_post();?>
	<?php get_template_part( 'templates/content-format', get_post_format() );?>
	<?php  if ( comments_open() || get_comments_number() ){comments_template();}?>
<?php endwhile;?>
<?php get_sidebar(); ?>
<?php get_footer();?>