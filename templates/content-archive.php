<section>
	<h1>
		<?php if ( is_day() ) :?>
			<?php printf( __( 'Daily Archives: %s', DOMAIN ), get_the_date() );?>
		<?php elseif ( is_month() ) :?>
			<?php printf( __( 'Monthly Archives: %s', DOMAIN ), get_the_date( _x( 'F Y', 'monthly archives date format', DOMAIN ) ) );?>
		<?php elseif ( is_year() ) :?>
			<?php printf( __( 'Yearly Archives: %s', DOMAIN ), get_the_date( _x( 'Y', 'yearly archives date format', DOMAIN ) ) );?>
		<?php else :?>
			<?php _e( 'Archives', DOMAIN );?>
		<?php endif;?>
	</h1>
	<?php while ( have_posts() ) : the_post();?>
		<?php get_template_part( 'templates/content',get_post_format());?>
	<?php endwhile;?>
</section>