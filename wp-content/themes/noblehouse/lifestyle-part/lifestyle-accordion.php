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
                    <?= $row['content_accordion']; ?>
                    <button class="back-accordion">< ALL <?= $field['title'] ?></button>
                </div>
            <?php endforeach; endif; ?>
            <!-- <div class="wrapper-item-accordion">
                <h1 class="header-accordion"><?= $row['header_accordion']; ?></h1>
                <img src="<?= $row['background_accordion']; ?>" class="bg-accordion">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip. ullamco laboris nisi ut aliquip</p>
                <h5>Opening Hours: 10.00 - 22.00</h5>
                <h5>Address: MENARA PRIMA, 2ND FLOOR</h5>
                <h5>JL. DR IDE ANAK AGUNG GDE AGUNG BLOK 6.2</h5>
                <h5>KAWASAN MEGA KUNINGAN</h5>
                <h5>Telp    : 021-12345467</h5>
                <h5>Website: Tori-ya.com</h5>
                <button class="back-accordion">< ALL HOTELS</button>
            </div> -->
        </div>
    </div>
</div>