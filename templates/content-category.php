<section>
	<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', DOMAIN ), single_cat_title( '', false ) ); ?></h1>
	<?php $term_description = term_description();?>
	<?php if ( ! empty( $term_description ) ) :?>
		<?php printf( '<div class="taxonomy-description">%s</div>', $term_description );?>
	<?php endif;?>
	<?php while ( have_posts() ) : the_post();?>
		<?php get_template_part( 'templates/content',get_post_format());?>
	<?php endwhile;?>
</section>