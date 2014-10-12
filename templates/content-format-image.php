<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail(); ?>
	<?php endif;?>
	<header>
		<h1><?php the_title()?></h1>
		<?php $taxonomies = get_object_taxonomies( get_post_type() );?>
		<?php $categories = get_the_category_list()?>
		<a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'image' ) ); ?>"><?php echo get_post_format_string( 'image' ); ?></a>
		<?php get_template_part( 'templates/content', 'info' );?>
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<span>
				<?php comments_popup_link( __( 'Leave a comment', DOMAIN ), __( '1 Comment', DOMAIN ), __( '% Comments', DOMAIN ) ); ?>
			</span>
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', DOMAIN ), '<span class="edit-link">', '</span>' ); ?>
	</header>
	<div>
		<?php the_content();?>
		<?php 
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', DOMAIN ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div>
	<footer>
		<?php the_tags( '<span class="tag-links">', '', '</span>' ); ?>
	</footer>
</article>