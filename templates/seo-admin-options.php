<div class="wrap">
	<h2>SEO</h2>
	<form novalidate="novalidate" action="options.php" method="post">
		<?php settings_fields( 'seo-options' );?>
		<?php do_settings_sections( 'seo-options' ); ?>
		<table class="form-table">
		<tbody>
			<tr>
				<th scope="row"><label for="copyright_site"><?php _e('Copyright',DOMAIN);?></label></th>
				<td>
					<input type="text" class="regular-text" value="<?=esc_attr(get_option('copyright_site'));?>" id="copyright_site" name="copyright_site">
					<p class="description"><?php _e('Exclusive right of an author',DOMAIN);?></p>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="keywords_site"><?php _e('Keywords',DOMAIN);?></label></th>
				<td>
					<textarea rows="3" class="large-text code" id="keywords_site" name="keywords_site"><?=esc_attr(get_option('keywords_site'));?></textarea>
					<p class="description"><?php _e('Add keywords to your website',DOMAIN);?></p></td>
				</td>
			</tr>
		</tbody>
	</table>
		<?php submit_button(); ?>
	</form>
</div>
<div class="clear"></div>