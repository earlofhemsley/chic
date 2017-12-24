<?php get_header(); ?>
<div class="wrap standard-wrap container-fluid">
    <h1>Search Results</h1>
    <div class="sewchic-search-table">
        <div class="sewchic-search-row">
            <div class="sewchic-search-cell sewchic-search-options">
                <button type="button" class="wcsc-toggle button" data-toggle="collapse" data-target="#sewchic_search_form_wrapper"  aria-expanded="false">Toggle filters</button>
                <div id="sewchic_search_form_wrapper" class="collapse wcsc-collapse">
                    <?php sewchic_search_again_form(); ?>
                </div>
            </div>
            <div class="sewchic-search-cell">
                <ul class="sewchic-loop-posts">
                <?php
                    while(have_posts()){
                        the_post();
                        get_template_part('template-parts/site/archivefeed');
                    }
                ?>
                </ul>
                <?php echo get_archive_pagination_links();?>
            </div>
        </div>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
