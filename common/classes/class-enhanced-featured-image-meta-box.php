<?php

abstract class Enhanced_Featured_Image_Meta_Box{

    private static $keys = array(
        '_thumbnail_id' => null,
        '_thumbnail_size' => ['Half','Full'],
        '_thumbnail_position' => ['Center','Left','Right']
    );

    public static function add(){
        $screens = ['page', 'post'];
        foreach($screens as $screen){
            remove_meta_box('postimagediv', $screen, 'side');
        }
        add_meta_box(
            'enhanced_postimagediv',
            __('Set Featured Image'),
            [self::class, 'html'],
            $screens,
            'side',
            'low',
            null
        );

    }

    public static function enqueue(){
        global $post;
        $screen = get_current_screen();
        if(is_object($screen)){
            if($post != null && in_array($screen->post_type, ['page','post'])){
                wp_enqueue_script('enhanced_featured_image_box_js', get_template_directory_uri().'/common/js/enhanced-featured-image.js', ['jquery'], false, true);
                wp_localize_script('enhanced_featured_image_box_js', 'efi', 
                    [
                        'url' => admin_url('admin-ajax.php'),
                        'action' => 'enhanced_set_featured_image',
                        'post_id' => $post->ID
                    ]
                );
            }
        }
    }

    public static function ajax(){
        if(array_key_exists('_post_id', $_POST)){
            $post = get_post($_POST['_post_id']);
            self::save($post->ID);
            self::html($post);
        } else {
            throw new Exception("POST ID NOT FOUND IN POST ARRAY, SO CANNOT UPDATE");
        }
        die;
    }

    public static function save($post_id){
        if(array_key_exists('_thumbnail_id', $_POST) && $_POST['_thumbnail_id'] == -1){
            foreach(self::$keys as $key => $data){
                delete_post_meta($post_id, $key);
            }
        } else {
            foreach(self::$keys as $key => $data){
                if(array_key_exists($key, $_POST)){
                    update_post_meta(
                        $post_id,
                        $key,
                        $_POST[$key]
                    );
                } else {
                    if(is_array($data)){
                        update_post_meta(
                            $post_id, 
                            $key,
                            0
                        );
                    }
                }

            }
        }
    }


    public static function html($post){
        $other_image_sizes = wp_get_additional_image_sizes();
        $thumbnail_id = get_post_meta($post->ID, '_thumbnail_id', true);
        $thumbnail_size = get_post_meta($post->ID, '_thumbnail_size', true);
        $thumbnail_position = get_post_meta($post->ID, '_thumbnail_position', true);

        $post_type_obj = get_post_type_object($post->post_type);

        $set_thumbnail_format_string = '<p class="hide-if-no-js"><a href="#" id="enhanced_set_featured_image" %s >%s</a></p>';

        //assume there is no featured image set by default
        $content = sprintf($set_thumbnail_format_string, 
            '',
            esc_html($post_type_obj->labels->set_featured_image)
        );

        if($thumbnail_id && get_post($thumbnail_id)){
            $size = isset($other_image_sizes['post-thumbnail']) ? 'post-thumbnail' : array(250,250);
            $size = apply_filters('admin_post_thumbnail_size', $size, $thumbnail_id, $post);
            $thumbnail_html = wp_get_attachment_image($thumbnail_id, $size);

            if(!empty($thumbnail_html)){
                $content = sprintf($set_thumbnail_format_string, 
                    'aria-describedby="set-post-thumbnail-desc"',
                    $thumbnail_html
                );

                $content .= '<p class="hide-if-no-js howto" id="set-post-thumbnail-desc">' . __( 'Click the image to edit or update' ) . '</p>';
                $content .= '<p class="hide-if-no-js"><a href="#" id="remove_enhanced_featured_image">' . esc_html( $post_type_obj->labels->remove_featured_image ) . '</a></p>';
            }
            $content .= '<hr />';

            //the secret sauce of this extension
            
            $content .= '<p>Featured image size:';
            foreach(self::$keys['_thumbnail_size'] as $index => $val ){
                $checked = ($index == $thumbnail_size) ? 'checked' : '';
                $content .= "<p style='margin-left: 15px;'><label><input type='radio' name='_thumbnail_size' value='$index' $checked />$val</label></p>";
            }
            $content .= "</p>";

            $content .= '<p>Featured image position:';
            foreach(self::$keys['_thumbnail_position'] as $index => $val){
                $checked = ($index == $thumbnail_position) ? 'checked' : '';
                $content .= "<p style='margin-left: 15px;'><label><input type='radio' name='_thumbnail_position' value='$index' $checked />$val</label></p>";
            }
            $content .= '</p>';
        }
        $content .= '<input type="hidden" id="_thumbnail_id" name="_thumbnail_id" value="'. esc_attr($thumbnail_id ? $thumbnail_id : -1) .'" />';

        echo $content;
    }

    public static function display($image_size, $figure_class = ''){
        if(is_singular(['page','post']) && in_the_loop()){
        $figure_class .= (get_post_meta(get_the_ID(), '_thumbnail_size', true)) ? ' common-full-width' : ' common-half-width';
        $thumbnail_position = get_post_meta(get_the_ID(), '_thumbnail_position', true);

        switch($thumbnail_position){
            case 0:
                $figure_class .= ' common-centered';
                break;
            case 1:
                $figure_class .= ' common-left-float';
                break;
            case 2: 
                $figure_class .= ' common-right-float';
                break;
            default:
                break;        
        }

        ?>
            <figure class="<?php echo $figure_class; ?>">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), $image_size); ?>" />
        <?php
                $caption = get_post(get_post_thumbnail_id())->post_excerpt;
                if($caption) echo sprintf('<figcaption>%s</figcaption>', $caption);
        ?>
            </figure>

        <?php
        }
    }
}

add_action('do_meta_boxes', ['Enhanced_Featured_Image_Meta_Box', 'add']);
add_action('save_post', ['Enhanced_Featured_Image_Meta_Box', 'save']);
add_action('wp_ajax_enhanced_set_featured_image', ['Enhanced_Featured_Image_Meta_Box', 'ajax']);
add_action('admin_enqueue_scripts', ['Enhanced_Featured_Image_Meta_Box', 'enqueue']);


?>
