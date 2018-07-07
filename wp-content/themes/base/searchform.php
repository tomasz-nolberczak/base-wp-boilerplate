<form method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="text-container">
        <input type="text"name="s" id="s" placeholder="<?php esc_attr_e( 'Szukaj...', 'base' ); ?>" />
    </div>
    <div class="submit-container">
        <button type="submit">
            <i class="icon-search"></i>
        </button>
    </div>
</form>