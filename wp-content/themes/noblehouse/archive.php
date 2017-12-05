<?php get_header(); 
$content = array();
$the_query = new WP_Query( array(
  'posts_per_page' => 1,
  'post_type' => 'post',
  'status' => 'publish'
)); 
if ( have_posts() ) : 
    $y = get_the_date('Y');
    $m = get_the_date('m');
endif;
?>
<?php if ( $the_query->have_posts() ) : ?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<?php $content[] = array("content" => get_the_content(), "title" => get_the_title(), "gallery" => get_fields()); ?>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
	<?php else : ?>
<?php endif;?>
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/rail-custom.css">
<div class="background-b">
	<?php get_template_part( 'nav/nav', 'side' ); ?>
	<div class="container">
	    <div class="wrapper-header-accordion">
	        <h5>News & Promotion</h5>
	    </div>
	    <div class="wrapper-archive-row">
			<div class="wrapper-years dragscroll">
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
		            $title = cut($field['content'], 200);
		            ?>
		            <?php $ID = get_the_ID();?>
        			<div class="item-group">
						<?php if($field['gallery'][0]['image']): ?>
							<div class="wrapper-gambar">
								<img src="<?= $field['gallery'][0]['image'] ?>">
							</div>
						<?php endif; ?>
						<a href="<?= the_permalink(); ?>"><?= the_title(); ?></a>
						<p><?= $title; ?></p>
        			</div>
		        <?php endwhile; ?>
		    <?php endif; ?>
		</div>
		<?php get_template_part( 'nav/nav', 'pagination' ); ?>
	    <div class="wrapper-archive">
			<div class="wrapper-year scrollbar-rail">
				<div class="group">
					<?= getNavbarArchive(); ?>
				</div>
			</div>
			<div class="wrapper-article scrollbar-rail">
				<?php if ($content[0]['gallery']['gallery']): ?>
				<div class="wrapper-gallery-article">
					<div class="owl-carousel owl-theme">
						<?php foreach($content[0]['gallery']['gallery'] as $image): ?>
							<div class="item">
								<img src="<?= $image['image'] ?>">
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php endif; ?>
				<h2><?= $content[0]['title']; ?></h2>
				<p><?= $content[0]['gallery']['content'] ?></p>
				<!-- <div class="gradient-bottom"></div> -->
			</div>
			
	    </div>
	   </div>
    <?php get_template_part( 'nav/nav', 'bottom' ); ?>
</div>
<?php get_footer(); ?>