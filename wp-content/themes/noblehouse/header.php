<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Noble House</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/bower_components/fullpage.js/dist/jquery.fullpage.min.css">
    <?php if(is_page()) {?>
      <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/jquery.scrollbar.css">
    <?php } ?>
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/js/owl/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/js/owl/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/main.css">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>