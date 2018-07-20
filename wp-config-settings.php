<?php

define('WP_DEBUG', false);

if ( ! WP_DEBUG ) {
    ini_set('display_errors', 0);
}

/*
 * Disable file edit
 * */
define( 'DISALLOW_FILE_EDIT', true );
