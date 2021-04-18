<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <span class="search-addon search-icon"></span>
    <div class="search-input">
        <input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'wpbstarter' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php esc_attr_x( 'Search for:', 'label', 'wpbstarter' ); ?>">
    </div>
    <button type="button" class="search-addon close-search"><i class="fa fa-times"></i></button>
</form>