<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' )) ?>" >
    <label for="s">
        <span class="screen-reader-text">Search for:</span>
    </label>
    <input type="search" id="s" class="search-field" value="<?php the_search_query() ?>" placeholder="Search..." name="s" required="required" />
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
</form>