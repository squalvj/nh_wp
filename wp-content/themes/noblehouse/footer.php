		<?php if( is_page()) {?>
			<div id="loading">
				<img src="<?= get_template_directory_uri(); ?>/assets/img/logo_hitam.svg">
			</div>
		<?php } ?>
		
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/bower_components/fullpage.js/vendors/scrolloverflow.min.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/bower_components/fullpage.js/dist/jquery.fullpage.min.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/js/greensock-js/TweenMax.min.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/js/owl/dist/owl.carousel.min.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/js/jquery.scrollbar.min.js"></script>
		<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/assets/js/main.js"></script>

		<?php wp_footer(); ?>
	</body>
</html>