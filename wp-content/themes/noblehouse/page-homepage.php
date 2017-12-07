<?php get_header(); ?>
<?php
    $field = get_fields(4);
?>
  <div class="main">
    <?php get_template_part( 'nav/nav', 'side' ); ?>
    <div id="fullpage">
      <div class="section home" data-name="Home">
        <video id="myVideo" loop="loop" poster="<?= $field['poster']; ?>" data-autoplay=""?>">
          <source src="<?= $field['background_video']; ?>" type="video/mp4">
        </video>
        <div class="container">
          <div class="wrapper-content"><img class="logo-utama" src="<?= get_template_directory_uri(); ?>/assets/img/logo.svg"><a href="#"><img src="<?= get_template_directory_uri(); ?>/assets/img/play-ico.svg"></a></div>
        </div>
        <div class="mouse"><img class="m" src="<?= get_template_directory_uri(); ?>/assets/img/mouse.svg">
          <div class="wrapper-arrow"><img src="<?= get_template_directory_uri(); ?>/assets/img/arrow.svg"></div>
          <h5>scroll to skip video</h5>
        </div>
      </div>
      <div class="section menu rel" data-name="Office">
      <?= checkAnnouncment(); ?>
        <div class="bg">
          <img src="<?= $field['background_image'] ?>">
        </div>
        <div class="container">
          <div class="wrapper-content">
            <h1 class="header-text"><?= $field['heading_text'] ?></h1>
            <div class="items-left-right home-left-right">
              <div class="item-left">
                <h2><?= $field['sub_heading_left'] ?></h2>
                <p><?= $field['content_left'] ?></p><a href="<?= site_url() ?>/office">
                  <button class="btn-more btn">More</button></a>
              </div>
              <div class="item-right">
                <h2><?= $field['sub_heading_right'] ?></h2>
                <p><?= $field['content_right'] ?></p><a href="<?= site_url() ?>/lifestyle">
                  <button class="btn-more btn">More</button></a>
              </div>
            </div>
          </div>
        </div>
        <?= get_template_part('nav/nav', 'bottom'); ?>
      </div>
    </div>
  </div>
<?php get_footer(); ?>