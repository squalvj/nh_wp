<?php global $field; ?>
<div class="item-left">
    <h2><?= $field['header'] ?></h2>
    <ul class="tab-container nav nav-pills">
        <?php $rows = get_field('tab_type'); ?>
        <?php if($rows): $i2 = 1; foreach($rows as $row): ?>
            <li class="<?php echo '', ($i2 == 1 ? 'active' : ''); ?>"><a data-toggle="pill"  data-target="#<?= trimSpace($row['header_tab']); ?>"><?= $row['header_tab']; ?></a></li>
        <?php $i2++; endforeach; endif;?>
    </ul>
    <div class="tab-content">
        <?php $rows2 = get_field('tab_type'); ?>
        <?php if($rows2): $i = 1; foreach($rows2 as $row):?>
             <div class="tab-pane fade <?php echo '', ($i == 1 ? 'active in' : ''); ?>" id="<?= trimSpace($row['header_tab']); ?>">
                <p><?= $row['content_tab']; ?></p>
            </div>
        <?php $i++; endforeach; endif;?>
    </div>
</div>
<div class="item-right img-right">
   <img src="<?= $field['image_right']; ?>">
</div>