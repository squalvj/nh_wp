<?php get_header(); ?>
<?php
    $args = array(
        'post_type' => 'lifestyle_section',
        'posts_per_page' => 100,
        'orderby'=> 'title',
        'order' => 'ASC',
        'status' => 'publish'
    );
    $query = new WP_Query( $args );
?>
    <?php get_template_part( 'nav/nav', 'side' ); ?>
    <!-- session gourmet cuma bisa 1 -->
    <div id="fullpage-lifestyle" class="fullpg">
        <?php if ( $query->have_posts() ) : ?>
            <?php while( $query->have_posts() ) : $query->the_post();?>
                <?php $layout = get_field("layout",get_the_ID()); $i; $field = get_fields(get_the_ID()); ?>
                <?php if ($layout == "Standard"): ?>
                    <?= get_template_part('lifestyle-part/lifestyle', 'standard'); ?>
                <?php elseif ($layout == "Tab"): ?>
                    <?= get_template_part('lifestyle-part/lifestyle', 'tab'); ?>
                <?php else: ?>
                    <?= get_template_part('lifestyle-part/lifestyle', 'accordion'); ?>
                <?php endif; ?>
            <?php $i++; endwhile; ?>
        <?php endif; ?>
        <?php get_template_part( 'nav/nav', 'bottom' ); ?>
        <div class="bullet-right"></div>
    </div>
<?php get_footer(); ?>