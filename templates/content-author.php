<section>
	 <?php the_post(); ?> 
	<h1><?php printf( __( 'All posts by %s', DOMAIN ), get_the_author() );?></h1>
	<?php if ( get_the_author_meta( 'description' ) ) : ?>
		<div class="author-description"><?php the_author_meta( 'description' ); ?></div>
	<?php endif; ?>
	<?php rewind_posts();?>
	<?php while ( have_posts() ) : the_post();?>
		<?php get_template_part( 'templates/content',get_post_format());?>
	<?php endwhile;?>
</section>