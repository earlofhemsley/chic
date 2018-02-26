<?php if(!is_search()): ?>
<form action="<?php echo get_home_url(); ?>" method="get" role="search">
    <div class="form-inline">
        <div class="form-group">
            <label for="sewchic-search-input" class="big-text-sm"><?php _e('Explore', 'sewchic'); ?>:</label>
            <input type="text" id="sewchic-search-input" class="input-text" name="s" style="width:30px;" />
            <button class="button" type="submit"><?php _e('Submit', 'sewchic'); ?></button>
        </div>
    </div>
</form>
<?php endif; ?>
