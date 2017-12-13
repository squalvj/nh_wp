<?php global $field; ?>
<div class="item-left">
    <h2><?= $field['header']; ?></h2>
    <div class="wrapper-accordion">
        <?php $rows = get_field('accordion_type');?>
        <?php if($rows): foreach($rows as $c => $row): if($c > 2)continue;?>
        <div class="item-accordion">
            <div class="item-left-accordion">
                <img src="<?= $row['icon_content']; ?>">
                <h5><?= $row['title_content']; ?></h5>
            </div>
            <div class="item-right-accordion">
                <button type="button" class="btn-accor" data-target="#feature-1" data-toggle="collapse""><img src="<?= get_template_directory_uri() ?>/assets/img/ico/plus.svg"><img src="<?= get_template_directory_uri() ?>/assets/img/ico/minus.svg" class="min"></button>
            </div>
            <div class="item-accordion-c collapse <? echo '', ($i == 0 ? 'in': '');?>">
                <?php $contents = $row['row_content'];?>
                <?php if($contents): foreach($contents as $content): ?>
                    <div class="inside-accordion-c">
                        <div class="left">
                            <h5><?= $content['row_left'] ?></h5>
                        </div>
                        <div class="right">
                            <h5><?= $content['row_right'] ?></h5>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
        <?php $i++; endforeach; endif; ?>
    </div>

    <div class="wrapper-accordion">
        <?php if($rows): $i = 0; foreach($rows as $c => $row): if($c < 3)continue;?>
        <div class="item-accordion">
            <div class="item-left-accordion">
                <img src="<?= $row['icon_content']; ?>">
                <h5><?= $row['title_content']; ?></h5>
            </div>
            <div class="item-right-accordion">
                <button type="button" class="btn-accor" data-target="#feature-1" data-toggle="collapse""><img src="<?= get_template_directory_uri() ?>/assets/img/ico/plus.svg"><img src="<?= get_template_directory_uri() ?>/assets/img/ico/minus.svg" class="min"></button>
            </div>
            <div class="item-accordion-c collapse">
                <?php $contents = $row['row_content'];?>
                <?php if($contents): foreach($contents as $content): ?>
                    <div class="inside-accordion-c">
                        <div class="left">
                            <h5><?= $content['row_left'] ?></h5>
                        </div>
                        <div class="right">
                            <h5><?= $content['row_right'] ?></h5>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
        <?php $i++; endforeach; endif; ?>
    </div>
    
</div>
            
<!-- 

<?php global $field; ?>
<div class="item-left">
    <h2><?= $field['header']; ?></h2>
    <div class="wrapper-accordion">
        <?php $rows = get_field('accordion_type'); ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php if( have_rows('accordion_type') ):  while( have_rows('to-accordion_type') ): the_row();?>
        <div class="item-accordion">
            <div class="item-left-accordion">
                <img src="<?php the_sub_field('icon_content'); ?>">
                <h5><?php the_sub_field('title_content'); ?></h5>
            </div>
            <div class="item-right-accordion">
                <button type="button" class="btn-accor" data-target="#feature-1" data-toggle="collapse""><img src="<?= get_template_directory_uri() ?>/assets/img/ico/plus.svg"><img src="<?= get_template_directory_uri() ?>/assets/img/ico/minus.svg" class="min"></button>
            </div>
            <div class="item-accordion-c collapse in">
                <?php if( have_rows('row_content') ): while( have_rows('row_content') ): the_row();?>
                    <div class="inside-accordion-c">
                        <div class="left">
                            <h5><?= get_sub_field('row_left') ?></h5>
                        </div>
                        <div class="right">
                            <h5><?= get_sub_field('row_right') ?></h5>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
        <?php endwhile; endif; endwhile;?>
    </div>
    
</div> -->
            