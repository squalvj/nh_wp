<?php get_header(); ?>
<?php get_template_part( 'nav/nav', 'side' ); ?>
<div id="fullpage-lifestyle" class="fullpg">
    <div class="section" data-nama="Restaurant">   
        <div class="bg-gradient-left-right gallery-tab-slider">
            <?php $rows = get_field('tab'); ?>
            <?php if($rows): $i = 1; foreach($rows as $row):?>
                <div class="gallery-group <?php echo '', ($i == 1 ? 'active' : ''); ?>" data-gallery="<?= trimSpecial($row['tab']); ?>">
                    <?php if($row['gallery']): $z = 0; foreach($row['gallery'] as $photo):?>
                        <img data-index="<?= $z; ?>" data-gallery="<?= trimSpecial($row['tab']); ?>" src="<?= $photo['image']; ?>">
                    <?php $z++; endforeach; endif; ?>
                </div>
            <?php $i++; endforeach; endif; ?>
        </div>
        <div class="container">
            <div class="wrapper-konten">
                <div class="items-left-right putih">
                    <div class="item-left">
                        <div class="tab-content header-tab-content">
                            <?php $rows = get_field('tab'); ?>
                            <?php if($rows): $i = 1; foreach($rows as $row): ?>
                                <h2 class="tab-pane fade <?php echo '', ($i == 1 ? 'active in' : ''); ?> restaurant<?= trimSpecial($row['tab']) ?>"> <?= $row['header'] ?></h2>
                            <?php $i++; endforeach; endif; ?>
                        </div>
                        <ul class="tab-container nav nav-pills tab-lifestyle">
                            <?php $rows = get_field('tab'); ?>
                            <?php if($rows): $i = 1; foreach($rows as $row): ?>
                                <li class="<?php echo '', ($i == 1 ? 'active' : ''); ?>"><a class=" tab-type-pill" data-toggle="pill" data-gallery="<?= trimSpecial($row['tab']); ?>" data-target=".restaurant<?= trimSpecial($row['tab']) ?>"><?= $row['tab']; ?></a></li>
                            <?php $i++; endforeach; endif;?>
                        </ul>
                        <div class="tab-content tab-type-content">
                            <?php $rows2 = get_field('tab'); ?>
                            <?php if($rows2): $i = 1; foreach($rows2 as $row):?>
                                <div class="tab-pane fade <?php echo '', ($i == 1 ? 'active in' : ''); ?> restaurant<?= trimSpecial($row['tab']) ?>" >
                                <?= $row['content']; ?>
                                </div>
                            <?php $i++; endforeach; endif;?>
                            <a href="<?= site_url(); ?>/lifestyle/#Gourmet">< NOBLE HOUSE RESTAURANT</a>
                        </div>
                    </div>
                    <div class="item-right img-right">
                    </div>
                </div>
            </div>
        </div>
        <div class="bullet-nav-tab">
        </div>
    </div>
    <?php get_template_part( 'nav/nav', 'bottom' ); ?>
</div>
<?php get_footer(); ?>