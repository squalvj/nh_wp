<div class="side-nav">
  <div class="bg-black"></div>
    <div class="content-nav">
        <a href="<?= site_url() ?>" class="logo-inside">
            <img class="logo_putih" src="<?= get_template_directory_uri(); ?>/assets/img/logo_putih.svg">
        </a>
        <div class="nav-atas">
            <button id="close-nav"><img src="<?= get_template_directory_uri(); ?>/assets/img/close.svg"></button><a class="logo-text" href="#"><img src="<?= get_template_directory_uri(); ?>/assets/img/logo_text.svg"></a>
            <p>Jl. Dr. Ide Anak Agung Gede Agung Kav. E 4.2 No. 2, Jakarta 12950 Tel. +62 21 2978 3000 Fax. +62 21 2978 3001 marketing@noblehouse.co.id <br><br>PT Graha Lestari Internusa</p>
        </div>
        <div class="contact-nav">
            <h2>Contact Us</h2>
            <button id="back-contact"><img src="<?= get_template_directory_uri(); ?>/assets/img/arrow.svg"></button>
            <form method="post" action="<?= get_page_link(134); ?>">
                <?= do_shortcode('[contact-form-7 id="140" title="Contact form 1"]') ?>
            </form>
        </div>
        <ul class="menu-ul">
            <li><span>01</span><a href="<?= site_url(); ?>">Welcome</a></li>
            <li> <span>02</span><a href="<?= site_url(); ?>/office">Office</a></li>
            <li> <span>03</span><a href="<?= site_url(); ?>/lifestyle">Lifestyle</a></li>
            <li> <span>04</span><a href="<?= site_url(); ?>/news-promotion">News & Promotion</a></li>
            <li> <span>05</span><a href="#" type="button" id="contact-btn">Contact Us</a></li>
        </ul>
        <div class="link-inside">
            <a target="_blank" href="<?= $field['enquiries_link']; ?>">enquiries</a>
            <a target="_blank" href="<?= $field['facebook_link']; ?>">facebook</a>
            <a target="_blank" href="<?= $field['twitter_link']; ?>">twitter</a>
            <a target="_blank" href="<?= $field['instagram_link']; ?>">instagram</a>
        </div>
        <p class="copyright">©2015 Noble House. All Right Reserved.</p>
    </div>
</div>