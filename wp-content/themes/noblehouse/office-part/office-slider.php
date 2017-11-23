<?php global $field; ?>
<div class="section" data-nama="Office">
    <div class="container">
        <div class="bg-gradient-left-right gallery-slider gallery-slider">
            <?php $rows = get_field('slider_gallery');?>
            <?php if($rows): foreach($rows as $row): ?>
                <img src="<?= $row['image_slider'] ?>">
            <?php endforeach; endif; ?>
        </div>
        <div class="wrapper-content">
            <div class="items-left-right office-left-right">
                <div class="item-left">
                    <h2><?= $field['slider_header']; ?></h2>
                    <p class="antialias"><?= $field['slider_content']; ?></p>
                </div>
                <div class="item-right"></div>
            </div>
        </div>
    </div>
    <div class="bullet-nav">
        
    </div>
</div>