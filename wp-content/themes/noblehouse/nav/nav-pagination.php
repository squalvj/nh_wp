<?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) { ?>
<div class="pagination-archive flex flex-row">
	<div><?php previous_posts_link(sprintf( __( 'Previous', 'blankslate' ), '<span class="meta-nav">&rarr;</span>' ) ) ?></div>
	<div><?php next_posts_link(sprintf( __( 'Next', 'blankslate' ), '<span class="meta-nav">&larr;</span>' ) ) ?></div>
 	
</div>
<?php } ?>
<div class="sep"></div>