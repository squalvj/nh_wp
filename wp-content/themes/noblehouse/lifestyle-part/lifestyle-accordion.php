<?php global $field;?>
<div class="section acc" data-nama="<?= trimSpace($field['title']); ?>">	
    <div class="container-accordion">
        <div class="wrapper-header-accordion">
            <h5><?= $field['title']; ?></h5>
            <span><?= $field['description']; ?></span>
        </div>
        <div class="wrapper-group-accordion">
            <?php $rows = get_field('accordion_layout'); ?>
            <?php if($rows): foreach($rows as $row):?>
                <div class="wrapper-item-accordion">
                    <h1 class="header-accordion"><?= $row['header_accordion']; ?></h1>
                    <img src="<?= $row['background_accordion']; ?>" class="bg-accordion">
                    <p><?= $row['content_accordion']; ?></p>
                    <button class="back-accordion">< ALL <?= $field['title'] ?></button>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</div>