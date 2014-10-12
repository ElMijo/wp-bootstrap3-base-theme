<?php get_header();?>
<?php if ( have_posts() ) :?>
	<h1 class="page-title"><?php printf( __( 'Tag Archives: %s', DOMAIN ), single_tag_title( '', false ) ); ?></h1>
	<?php $term_description = term_description();?>
	<?php if ( ! empty( $term_description ) ) :?>
		<?php printf( '<div class="taxonomy-description">%s</div>', $term_description );?>
	<?php endif;?>
	<?php while ( have_posts() ) : the_post();?>
		<?php get_template_part( 'templates/content-format', get_post_format() );?>
		<?php endwhile;?>
<?php else :?>
	<?php get_template_part( 'templates/content', 'none' );?>
<?php endif;?>
<?php get_sidebar(); ?>
<?php get_footer();?>