<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h1><?php the_title()?></h1>
		<span class="entry-date">
			<time class="entry-date" datetime="<?=esc_attr( get_the_date( 'c' ) ); ?>"><?=esc_html( get_the_date() ); ?></time>
		</span>
		<span class="full-size-link">
			<a href="<?=esc_url( wp_get_attachment_url() ); ?>"><?=$metadata['width']; ?> &times; <?php echo $metadata['height']; ?></a>
		</span>
		<span class="parent-post-link">
			<a href="<?=esc_url( get_permalink( $post->post_parent ) ); ?>" rel="gallery"><?=get_the_title( $post->post_parent ); ?></a>
		</span>
		<?php edit_post_link( __( 'Edit', DOMAIN ), '<span class="edit-link">', '</span>' ); ?>
	</header>
	<div>
		<div class="entry-attachment">
			<div class="attachment">
				<?php the_attached_image(); ?>
			</div>
			<?php if ( has_excerpt() ) : ?>
			<div class="entry-caption">
				<?php the_excerpt(); ?>
			</div>
			<?php endif; ?>
		</div>
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