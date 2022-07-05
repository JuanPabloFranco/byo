<div class="no-results">
    <h3><?php echo esc_html__('Nothing Found', 'mirya'); ?></h3>
    <p><?php echo esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mirya'); ?></p>
    <div class="search-widget">
        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' )) ?>" >
            <label for="s">
                <span class="screen-reader-text">Search for:</span>
            </label>
            <input type="search" id="s" class="search-field" value="<?php the_search_query() ?>" placeholder="Search..." name="s" required="required" />
	        <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>