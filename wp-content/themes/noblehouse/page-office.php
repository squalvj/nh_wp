<?php get_header(); ?>
<?php
    $args = array(
        'post_type' => 'office_section',
        'posts_per_page' => 20,
        'orderby'=> 'title',
        'order' => 'ASC',
        'status' => 'publish'
    );
    $query = new WP_Query( $args );
?>
    <?php get_template_part( 'nav/nav', 'side' ); ?>
    <div id="fullpage-office" class="fullpg">
        <?php if ( $query->have_posts() ) : ?>
            <?php while( $query->have_posts() ) : $query->the_post();?>
                <?php $layout = get_field("layout",get_the_ID()); $field = get_fields(get_the_ID())?>
                <?php if ($layout != "Slider"): ?>
                     <?= get_template_part('office-part/office', 'standard'); ?>
                <?php else: ?>
                    <?= get_template_part('office-part/office', 'slider'); ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php get_template_part( 'nav/nav', 'bottom' ); ?>
        <div class="bullet-right"></div>
    </div>
<?php get_footer(); ?>