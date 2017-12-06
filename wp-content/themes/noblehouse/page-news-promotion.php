<?php get_header(); ?>
<?php $field = get_fields(91); ?>
    <?php get_template_part( 'nav/nav', 'side' ); ?>
    <div id="fullpage-news" class="fullpg">
        <div class="section acc" data-nama="<?= trimSpace($field['title']); ?>">    
            <div class="container-accordion">
                <div class="wrapper-header-accordion">
                    <h5>News & Promotion</h5>
                    <span><a class="archive" href="<?php echo get_year_link( last_post_year()); ?>">ARCHIVE</a></span>
                </div>
                <div class="wrapper-group-accordion">
                    <?php $rows = $field['news_content'];?>
                    <?php if($rows): foreach($rows as $row):?>
                        <div class="wrapper-item-accordion">
                            <div class="wrapper-inside-item-accordion scrollbar-rail">
                                <h1 class="header-accordion"><?= $row['header']; ?></h1>
                                <p><?= $row['content']; ?></p>
                            </div>
                            <button class="back-accordion">< PREVIOUS PAGE</button>
                            <img src="<?= $row['image']; ?>" class="bg-accordion">
                        </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
        <?php get_template_part( 'nav/nav', 'bottom' ); ?>
    </div>
<?php get_footer(); ?>