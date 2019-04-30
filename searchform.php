<?php if(!is_search()): ?>
<div class="sewchic-header-widget-element sewchic-form-inline sewchic-form" id="sewchic_search_form">
    <form action="<?php echo get_home_url(); ?>" method="get" role="search">
        <div class="sewchic-input-group">
            <label for="sewchic-search-input" class="big-text-sm"><?php _e('Search', 'sewchic'); ?>:</label>
            <input type="text" id="sewchic-search-input" class="input-text" name="s" />
            <button class="button" type="submit"><?php _e('Submit', 'sewchic'); ?></button>
        </div>
    </form>
</div>
<?php endif; ?>
