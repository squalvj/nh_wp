<?php
    $field = get_fields(4);
?>
<a href="<?= site_url() ?>" class="top-left change">
    <img class="logo_putih" src="<?= get_template_directory_uri(); ?>/assets/img/logo_putih.svg">
</a>
<a href="<?= site_url() ?>" class="top-left change">
    <img src="<?= get_template_directory_uri(); ?>/assets/img/logo_hitam.svg">
</a>
<div class="wrapper-kotak top-right change">
    <button class="open-nav">
        <img src="<?= get_template_directory_uri(); ?>/assets/img/kotak4.svg">
        <img src="<?= get_template_directory_uri(); ?>/assets/img/logo_putih.svg">
    </button>
</div>
<div class="wrapper-kotak top-right change">
    <button class="open-nav">
        <img src="<?= get_template_directory_uri(); ?>/assets/img/kotak4black.svg">
        <img src="<?= get_template_directory_uri(); ?>/assets/img/logo_hitam.svg">
    </button>
</div>
<div class="bottom-left change">
    <a target="_blank" href="<?= $field['enquiries_link']; ?>">enquiries</a>
    <a target="_blank" href="<?= $field['facebook_link']; ?>">facebook</a>
    <a target="_blank" href="<?= $field['twitter_link']; ?>">twitter</a>
    <a target="_blank" href="<?= $field['instagram_link']; ?>">instagram</a>
</div>
<div class="bottom-left change">
    <a target="_blank" class="black-t" href="<?= $field['enquiries_link']; ?>">enquiries</a>
    <a target="_blank" class="black-t" href="<?= $field['facebook_link']; ?>">facebook</a>
    <a target="_blank" class="black-t" href="<?= $field['twitter_link']; ?>">twitter</a>
    <a target="_blank" class="black-t" href="<?= $field['instagram_link']; ?>">instagram</a>
</div>
<div class="bottom-right change">
    <h5>©2015 Noble House. All Right Reserved.</h5>
</div>
<div class="bottom-right change">
    <h5 class="black-t">©2015 Noble House. All Right Reserved.</h5>
</div>
