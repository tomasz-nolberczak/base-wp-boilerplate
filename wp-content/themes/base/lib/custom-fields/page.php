<?php
use Carbon_Fields\Container\Container;
use Carbon_Fields\Field;

/*
 * Fields for all pages without frontpage
 *
 * Carbon Fields documentation can be found here:
 * https://carbonfields.net/docs/
 * */
Container::make('post_meta', __('Page settings', 'base'))
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_id', '!=', get_option('page_on_front') )
    ->add_fields([

    ]);