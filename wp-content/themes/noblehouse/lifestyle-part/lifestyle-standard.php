<?php global $field;?>
<div class="section" data-nama="<?= trimSpace($field['header_standard']); ?>">	
    <div class="container">
        <div class="bg-gradient-left-right gallery-slider gallery-slider">
            <?php $rows = get_field('gallery_standard');?>
            <?php if($rows): foreach($rows as $row): ?>
                <img src="<?= $row['image'] ?>">
            <?php endforeach; endif; ?>
        </div>
        <div class="wrapper-konten">
            <div class="items-left-right <?php echo ($field['gallery_standard'] ? 'putih' : 'invert'); ?>">
				<div class="item-left">
                    <h2 class="standard-header"><?= $field['header_standard'] ?></h2>
                    <p class="p-standard antialias"><?= $field['content_standard'] ?></p>
                </div>
                <div class="item-right"></div>
        	</div>
    	</div>
	</div>
    <div class="bullet-nav">
        
    </div>
</div>