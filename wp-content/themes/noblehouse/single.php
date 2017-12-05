<?php get_header(); ?>
<?php get_header(); 
if ( have_posts() ) : 
    $y = get_the_date('Y');
    $m = get_the_date('m');
endif;
?>
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/rail-custom.css">
<div class="background-b">
	<?php get_template_part( 'nav/nav', 'side' ); ?>
	<div class="container">
	    <div class="wrapper-header-accordion">
	        <h5>News & Promotion</h5>
	    </div>
	    <div class="wrapper-archive-row">
			<div class="wrapper-years">
				<?php for ($i = last_post_year(); $i >= first_post_year(); $i--): ?>
                	<a <?php if ($i == $y): ?> class="active" <?php endif; ?> href="<?= get_year_link($i) ?>"><?= $i ?></a>
                <?php endfor; ?>
			</div>
			<div class="wrapper-months dragscroll">
				<?= getMonthByYear($y); ?>
			</div>
			<div class="leftg gradient"></div>
			<div class="rightg gradient"></div>
	    </div>
	
		<div class="wrapper-archive-tablet">
			<?php  if ( have_posts() ) : ?>
        		<?php while( have_posts() ): the_post(); $field = get_fields(); ?>
		            <?php $y = get_the_date('Y'); ?>
		            <?php $m = get_the_date('m'); 
		            $title = $field['content'];
		            ?>
		            <?php $ID = get_the_ID();?>
        			<div class="item-group">
						<div class="wrapper-article scrollbar-rail">
							<?php if ($field['gallery']): ?>
								<div class="wrapper-gallery-article">
									<div class="owl-carousel owl-theme">
										<?php foreach($field['gallery'] as $image): ?>
											<div class="item">
												<img src="<?= $image['image'] ?>">
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							<?php endif; ?>
							<h2><?= the_title(); ?></h2>
							<p><?= $field['content'] ?></p>
						</div>
        			</div>
		        <?php endwhile; ?>
		    <?php endif; ?>
		</div>

	    <div class="wrapper-archive">
			<div class="wrapper-year scrollbar-rail">
				<div class="group">
					<?= getNavbarSingle(); ?>
				</div>
			</div>
			
            
        	<?php if ( have_posts() ) : ?>
        	<?php while( have_posts() ) : the_post(); $field = get_fields();?>
			<div class="wrapper-article scrollbar-rail">
				<?php if ($field['gallery']): ?>
					<div class="wrapper-gallery-article">
						<div class="owl-carousel owl-theme">
							<?php foreach($field['gallery'] as $image): ?>
								<div class="item">
									<img src="<?= $image['image'] ?>">
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
				<h2><?= the_title(); ?></h2>
				<p><?= $field['content'] ?></p>
			</div>
        	<?php endwhile; endif; ?>
	    </div>
	   </div>
    <?php get_template_part( 'nav/nav', 'bottom' ); ?>
</div>
<?php get_footer(); ?>
<?php get_footer(); ?>