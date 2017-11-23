<?php global $field; ?>
<div class="section" data-nama="Office">
    <div class="container">
        <?php if ($field['background_page']): ?>
            <div class="bg-gradient-left-right gallery-slider">
                <img src="<?= $field['background_page'] ?>">
            </div>
        <?php endif; ?>
        <?php $rows = get_field('slider_content');?>
        <?php if($rows): foreach($rows as $row): ?>
            <div class="wrapper-content">
                <div class="items-left-right office-left-right">
                    <div class="item-left">
                        <h2><?= $row['header_slider']; ?></h2>
                        <p class="antialias"><?= $row['content_slider']; ?></p>
                    </div>
                    <div class="item-right"></div>
                </div>
            </div>
        <?php endforeach; endif; ?>
    </div>
    <div class="bullet-nav">
        
    </div>
</div>