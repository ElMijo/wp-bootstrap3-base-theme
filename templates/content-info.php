<span class="entry-date">
	<a href="<?=esc_url( get_permalink() )?>" rel="bookmark">
		<time class="entry-date" datetime="<?=esc_attr( get_the_date( 'c' ) )?>"><?=esc_html( get_the_date() )?></time>
	</a>
</span>
<span class="byline">
	<span class="author vcard">
		<a class="url fn n" href=">?=esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )?>" rel="author"><?=get_the_author()?></a>
	</span>
</span>