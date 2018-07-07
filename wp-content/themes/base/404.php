<?php get_header(); ?>
<section id="page-404">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?= _e('404', 'base'); ?></h1>
                <p><?= _e('Page not found', 'base'); ?></p>
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <a href="<?= get_home_url() ?>" class="button"><?= _e('Go back to home', 'base'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>