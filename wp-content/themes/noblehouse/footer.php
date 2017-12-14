		<?php if( is_page()) {
			$field = get_fields(4);?>
			<div id="loading">
				<img src="<?= $field['loading_image']; ?>">
			</div>
		<?php } ?>

		<?php if (is_archive() || is_single()): ?>
			<?php
			    $field = get_fields(4);
			?>
			<div class="footer-archive">
				<div>
					<a target="_blank" href="<?= $field['enquiries_link']; ?>">enquiries</a>
			        <a target="_blank" href="<?= $field['facebook_link']; ?>">facebook</a>
			        <a target="_blank" href="<?= $field['twitter_link']; ?>">twitter</a>
			        <a target="_blank" href="<?= $field['instagram_link']; ?>">instagram</a>
			    </div>
			    <div>
			        <h5>©2015 Noble House. All Right Reserved.</h5>
			   	</div>	
			</div>
		<?php endif; ?>
		
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/bower_components/fullpage.js/vendors/scrolloverflow.min.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/bower_components/fullpage.js/dist/jquery.fullpage.min.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/bower_components/dragscroll/dragscroll.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/js/greensock-js/TweenMax.min.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/js/owl/dist/owl.carousel.min.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/js/jquery.scrollbar.min.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/js/main.js?version=1"></script>

		<?php wp_footer(); ?>
	</body>
</html>