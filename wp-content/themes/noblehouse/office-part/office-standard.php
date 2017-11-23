<?php global $field; ?>
<div class="section" data-nama="<?= trimSpace($field['header']); ?>">	
 	<?php if ($field['background_page']): ?>
        <div class="bg-gradient-left-right">
            <img src="<?= $field['background_page'] ?>">
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="wrapper-konten">
            <div class="items-left-right <?php echo ($field['background_page'] ? 'putih' : 'invert'); ?>">
				<?php if ($field['standard_type'] == "Tab"): ?>
					<?= get_template_part('office-part/part/tab'); ?>
				<?php elseif ($field['standard_type'] == "Accordion"): ?>
					<?= get_template_part('office-part/part/accordion'); ?>
				<?php else: ?>
					<?= get_template_part('office-part/part/standard'); ?>
				<?php endif; ?>
        	</div>
    	</div>
	</div>
</div>