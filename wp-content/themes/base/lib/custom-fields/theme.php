<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field;

/*
 * Default theme options
 *
 * Carbon Fields documentation can be found here:
 * https://carbonfields.net/docs/
 * */
Container::make('theme_options', __('Theme', 'base'))
    ->add_tab('Address', [
        Field::make('text', 'contact_phone', 'Phone number'),
        Field::make('text', 'contact_email', 'E-mail'),
        Field::make('rich_text', 'contact_address', 'Address'),
        Field::make('map', 'contact_map', 'Localization on map'),
    ])
    ->add_tab('Social media', [
        Field::make('complex', 'social_media')
            ->set_layout('tabbed-horizontal')
            ->add_fields([
                Field::make('text', 'name', 'Name'),
                Field::make('text', 'icon', 'Icon'),
                Field::make('text', 'url', 'URL'),
            ])->set_header_template('
                <% if (name) { %>
                    <%- name %>
                <% } else { %>
                    -
                <% }  %>
            '),
    ]);