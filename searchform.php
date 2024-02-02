<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <input type="search" class="search-field" placeholder="Buscar" value="<?php echo get_search_query() ?>" name="s" />
    <button type="submit" class="search-submit">
        <img src="<?php echo IMG; ?>/glass.webp" alt="Buscar" title="Buscar">
    </button>
</form>