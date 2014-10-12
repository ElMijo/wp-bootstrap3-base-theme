<div class="wrap">
	<h2><?php _e('Theme Options',DOMAIN);?></h2>
	<form novalidate="novalidate" action="options.php" method="post">
		<?php settings_fields( 'theme-options' );?>
		<?php do_settings_sections( 'theme-options' ); ?>
		<h3 class="title"><?php _e('excerpt',DOMAIN);?></h3>
		<p><?php _e('Set the number of words you want for different sizes of extracts',DOMAIN);?></p>
		<!-- Defina el número de palabras que desea para los diferentes tamaños de extractos -->
		<table class="form-table">
		<tbody>
			<tr>
				<th scope="row"><label for="excerpt_short_site"><?php _e('Short',DOMAIN);?></label></th>
				<td>
					<input type="text" class="regular-text" value="<?=esc_attr(get_option('excerpt_short_site'));?>" id="excerpt_short_site" name="excerpt_short_site">
					<p class="description"><?php _e('Short excerpt size',DOMAIN);?></p>
					<!-- Tamaño extracto corto -->
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="excerpt_regular_site"><?php _e('Regular',DOMAIN);?></label></th>
				<td>
					<input type="text" class="regular-text" value="<?=esc_attr(get_option('excerpt_regular_site'));?>" id="excerpt_regular_site" name="excerpt_regular_site">
					<p class="description"><?php _e('Regular excerpt size',DOMAIN);?></p>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="excerpt_long_site"><?php _e('Long',DOMAIN);?></label></th>
				<td>
					<input type="text" class="regular-text" value="<?=esc_attr(get_option('excerpt_long_site'));?>" id="excerpt_long_site" name="excerpt_long_site">
					<p class="description"><?php _e('Long excerpt size',DOMAIN);?></p>
				</td>
			</tr>			
		</tbody>
	</table>
		<?php submit_button(); ?>
	</form>
</div>
<div class="clear"></div>