<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php $main_block = get_field('main_block'); ?>
<?php if ($main_block): ?>
    <?php
    $style_basic = 'background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6))';
    $style_webkit = '-webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.6)), to(rgba(0, 0, 0, 0.6)))';
    if (!empty($main_block['background'])) {
        $style_basic .= ', url(' . $main_block['background'] . ')';
        $style_webkit .= ', url(' . $main_block['background'] . ')';
    }
    $style_basic .= '; ';
    $style_webkit .= ';';
    $style = $style_basic . $style_webkit . ';';
    ?>
    <header class="container-fluid" style="<?= $style ?>">
        <div class="row">
            <nav>
                <div class="container">
                    <div class="cover">
                        <figure class="logo">
                            <img src="<?= $main_block['logo'] ?>" alt="Logo <?= $main_block['title'] ?>">
                        </figure>
                        <figure class="logo-black">
                            <img src="<?= $main_block['logo_black'] ?>" alt="Logo <?= $main_block['title'] ?>">
                        </figure>
                        <?php
                        $translations = [
                            'hide_current' => 1,
                            'echo' => 0,
                        ];
                        $language = '<li class="lang-item lang-current">' . pll_current_language('name') . '</li>';
                        $language .= pll_the_languages($translations);

                        wp_nav_menu([
                            'theme_location' => 'headerMenuLocation',
                            'container' => false,
                            'items_wrap' => '<ul class="main-nav js--main-nav">%3$s<li><ul class="lang">' . $language . '</ul></li></ul>'
                        ]) ?>
                        <a class="mobile-nav-icon js--nav-icon"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    </div>
                </div>
            </nav>
            <div class="hero-text-box">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div>
                                <h1>
                                    <?= $main_block['title'] ?><br>
                                    <?php if (!empty($main_block['sub_title'])): ?>
                                        <span class="thesis"><?= $main_block['sub_title'] ?></span>
                                    <?php endif; ?>
                                </h1>
                            </div>
                            <div class="hero-link">
                                <?php if ($main_block['button_1']): ?>
                                    <span><a class="btn btn-full"
                                             href="<?= $main_block['button_1']['link_id'] ?>"><?= $main_block['button_1']['title'] ?></a></span>
                                <?php endif; ?>
                                <?php if ($main_block['button_2']): ?>
                                    <span><a class="btn btn-ghost"
                                             href="<?= $main_block['button_2']['link_id'] ?>"><?= $main_block['button_2']['title'] ?></a></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <?php if ($main_block['contact_list']): ?>
                                <div class="hero-contact">
                                    <ul>
                                        <?php foreach ($main_block['contact_list'] as $item): ?>
                                            <li><?= $item['icon'] . $item['contact'] ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>

<?php $features_block = get_field('features_block'); ?>
<?php if ($features_block): ?>
    <section class="container section-features js--section-features" id="features">
        <div class="row">
            <div class="col-md-12">
                <h2><?= $features_block['title'] ?></h2>
                <p class="long-copy">
                    <?= $features_block['description'] ?>
                </p>
            </div>
            <?php if ($features_block['features_list']): ?>
                <?php foreach ($features_block['features_list'] as $item): ?>
                    <div class="col-md-6 col-lg-3 box">
                        <?= $item['icon'] ?>
                        <h3><?= $item['title'] ?></h3>
                        <p>
                            <?= $item['description'] ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php $service_block = get_field('service_block'); ?>
<?php if ($service_block): ?>
    <section class="container-fluid section-service js--section-service" id="service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?= $service_block['title'] ?></h2>
                    <p class="long-copy">
                        <?= $service_block['description'] ?>
                    </p>
                </div>
                <?php if ($service_block['services']): ?>
                    <?php foreach ($service_block['services'] as $item): ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="cover">
                                <div>
                                    <figure>
                                        <img src="<?= $item['image'] ?>" alt="<?= $item['title'] ?>">
                                    </figure>
                                    <h3><?= $item['title'] ?></h3>
                                    <?php if ($item['list']): ?>
                                        <ul>
                                            <?php foreach ($item['list'] as $check): ?>
                                                <li>
                                                    <span><?= $check['check'] ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if ($service_block['price']): ?>
                    <div class="col-md-12">
                        <div class="price-link">
                            <a class="btn btn-full" href="<?= $service_block['price']['file'] ?>" target="_blank">
                                <i class="fas fa-download"></i>
                                <?= $service_block['price']['title'] ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php $about_block = get_field('about_block'); ?>
<?php if ($about_block): ?>
    <section class="container-fluid section-about js--section-about" id="about">
        <div class="container">
            <h2><?= $about_block['title'] ?></h2>
            <p class="long-copy">
                <?= $about_block['description'] ?>
            </p>
        </div>
    </section>
<?php endif; ?>

<?php $testimonials_block = get_field('testimonials_block'); ?>
<?php if ($testimonials_block): ?>
    <?php
    $style_basic = 'background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6))';
    $style_webkit = '-webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.6)), to(rgba(0, 0, 0, 0.6)))';
    if (!empty($main_block['background'])) {
        $style_basic .= ', url(' . $testimonials_block['background'] . ')';
        $style_webkit .= ', url(' . $testimonials_block['background'] . ')';
    }
    $style_basic .= '; ';
    $style_webkit .= ';';
    $style = $style_basic . $style_webkit . ';';
    ?>
    <section class="container-fluid section-testimonials" id="testimonials" style="<?= $style ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?= $testimonials_block['title'] ?></h2>
                </div>
                <div class="col-md-12">
                    <div class="carousel">
                        <?php if ($testimonials_block['testimonials_list']): ?>
                            <?php foreach ($testimonials_block['testimonials_list'] as $item): ?>
                                <div class="slider-item">
                                    <blockquote>
                                        <?= $item['text'] ?>
                                    </blockquote>
                                    <cite>
                                        <?php if (!empty($item['photo'])): ?>
                                            <img src="<?= $item['photo'] ?>" alt="<?= $item['name'] ?>">
                                        <?php else: ?>
                                            <img src="<?php echo get_theme_file_uri('/resources/css/img/author.png') ?>"
                                                 alt="<?= $item['name'] ?>">
                                        <?php endif; ?>
                                        <span class="name"><?= $item['name'] ?></span>
                                        <span class="position"><?= $item['position'] ?></span>
                                    </cite>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
    </section>
<?php endif; ?>

<?php $partners_block = get_field('partners_block'); ?>
<?php if ($partners_block): ?>
    <section class="container section-partners" id="partners">
        <div class="row">
            <div class="col-md-12">
                <h2><?= $partners_block['title'] ?></h2>
            </div>
            <?php if ($partners_block['partner_list']): ?>
                <?php foreach ($partners_block['partner_list'] as $item): ?>
                    <div class="col-sm-6 col-md-3">
                        <figure>
                            <img src="<?= $item['logo'] ?>" alt="<?= $item['name'] ?>">
                        </figure>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php $form_block = get_field('form_block'); ?>
<?php if ($form_block): ?>
    <section class="container-fluid section-contact js--section-contact" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?= $form_block['title'] ?></h2>
                </div>
                <div class="col-md-12">
                    <?php echo do_shortcode($form_block['short_code']); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php $footer_block = get_field('footer_block'); ?>
<?php if ($footer_block): ?>
    <footer id="colophon" class="site-footer container-fluid">
        <div class="container">
            <div class="site-info">
                <?php if ($footer_block['contact_list']): ?>
                    <ul class="footer-contact">
                        <?php foreach ($footer_block['contact_list'] as $item): ?>
                            <li><?= $item['icon'] . $item['contact'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if ($footer_block['copyright']): ?>
                    <p><?= $footer_block['copyright'] ?></p>
                <?php endif; ?>
                <?php if ($footer_block['social_links']): ?>
                    <ul class="social-links">
                        <?php foreach ($footer_block['social_links'] as $item): ?>
                            <li>
                                <a href="<?= $item['link'] ?>" target="_blank">
                                    <?= $item['icon'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div><!-- .site-info -->
        </div>
    </footer><!-- #colophon -->
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>