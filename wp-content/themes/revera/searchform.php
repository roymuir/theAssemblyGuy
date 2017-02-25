<form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>">
    <input type="text" class="search" value="<?php get_search_query(); ?>" name="s" id="s" placeholder="<?php _e( 'Search...', 'revera' ); ?>" />
    <input type="submit" value="Go" />
</form>