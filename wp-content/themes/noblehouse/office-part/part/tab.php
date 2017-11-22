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
        <!-- <div class="tab-pane fade active in" id="floor1">
            <p>A spacious floor plate totaling 50,000 sqm2 , with a choice of Low Zone and High Zone location each served by high speed lifts, gives ample selection for the location of your office.
            </p>
            <p class="footer-content">
                1,741 sqm semi gross floorplate<br>
                divided into 6 office areas <br>
                ranging from 225 to 360 sqm semi gross
            </p>
        </div>
        -->
    </div>
</div>
<div class="item-right img-right">
   <img src="<?= get_template_directory_uri() ?>/assets/img/floor1.svg">
</div>