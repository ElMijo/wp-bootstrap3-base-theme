<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail(); ?>
	<?php endif;?>
	<header>
		<?php the_title('<h1 class="entry-title">', '</h1>')?>
		<?php edit_post_link( __( 'Edit', DOMAIN ), '<span class="edit-link">', '</span>' ); ?>
	</header>
	<div>
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', DOMAIN ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			edit_post_link( __( 'Edit', DOMAIN ), '<span class="edit-link">', '</span>' );
		?>
	</div>
</article>
