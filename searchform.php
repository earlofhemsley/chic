<?php if(!is_search()): ?>
<form action="<?php echo get_home_url(); ?>" method="get" role="search">
    <div>
        <label for="sewchic-search-input" class="big-text-sm"><?php _e('Explore', 'sewchic'); ?>:</label>
        <input type="text" id="sewchic-search-input" class="input-text" name="s" />
        <button class="button" type="submit"><?php _e('Submit', 'sewchic'); ?></button>
    </div>
</form>
<?php endif; ?>
