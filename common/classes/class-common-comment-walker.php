<?php
class Common_Comment_Walker extends Walker_Comment{

    private $textdomain;

    public function __construct($textdomain = 'common'){
        $this->textdomain = $textdomain;
        add_filter('comment_reply_link', array($this, 'add_to_comment_reply_link_class'), 10, 4);
    }

    public function paged_walk($elements, $max_depth, $page_num, $per_page){
        $args = array_slice(func_get_args(), 4);
        $args = $args[0];

        $output = parent::paged_walk($elements, $max_depth, $page_num, $per_page, $args);

        if($args['style'] != 'div') return "<{$args['style']} class='{$this->textdomain}-comment-top-level'>".$output."</{$args['style']}>";
        else return $output;
    }

    protected function comment($comment, $depth, $args){
        $props = $this->prepare_values($comment, $depth, $args);

        echo <<< EOT

        <{$props['tag']} class="{$props['wrapper_class']}" id="{$props['comment_id']}">
            {$props['subtag_open']}
                <div class="{$this->textdomain}-comment-author-avatar">{$props['avatar']}</div>
                <p class="{$this->textdomain}-comment-author-meta">{$props['author_meta']}</p>
                <p class="{$this->textdomain}-comment-content">{$props['comment_text']}</p>
                <div class="{$this->textdomain}-comment-actions">
                    {$props['edit_link']}
                    {$props['reply_link']}
                </div>
            {$props['subtag_close']}
EOT;

    }

    protected function html5_comment($comment, $depth, $args){
        $props = $this->prepare_values($comment, $depth, $args);

        echo <<< EOT
        <{$props['tag']} class="{$props['wrapper_class']}" id="{$props['comment_id']}">
            {$props['subtag_open']}
                <div class="{$this->textdomain}-comment-author-avatar">{$props['avatar']}</div>
                <footer class="{$this->textdomain}-comment-author-meta">
                    {$props['author_meta']}
                </footer>
                <p class="{$this->textdomain}-comment-content">{$props['comment_text']}</p>
                <div class="{$this->textdomain}-comment-actions">
                    {$props['edit_link']}
                    {$props['reply_link']}
                </div>
            {$props['subtag_close']}    

EOT;
    }
    
    protected function ping( $comment, $depth, $args ) {
        $tag = ( 'div' == $args['style'] ) ? 'div' : 'li';
?>
        <<?php echo $tag; ?> id="<?php echo $this->textdomain; ?>-comment-<?php comment_ID(); ?>" <?php comment_class( "{$this->textdomain}-comment", $comment ); ?>>
            <div class="<?php echo $this->textdomain ?>-comment-content">
                <?php _e( 'Pingback:', $this->textdomain ); ?> <?php comment_author_link( $comment ); ?> <?php edit_comment_link( __( 'Edit', $this->textdomain ), '<span class="edit-link">', '</span>' ); ?>
            </div>
<?php
        }
    
    private function prepare_values($comment, $depth, $args){
        $props = array();
        $props['subtag_open'] = '';
        $props['subtag_close'] = '';
        $props['tag'] = 'div';
        $add_below = "{$this->textdomain}-comment";

        if('div' != $args['style'] || 'html5' == $args['format']){
            $add_below = $this->textdomain.'-comment-subdiv'; 

            if('div' != $args['style']) $props['tag'] = 'li';
            $subtag = ('html5' == $args['format']) ? 'article' : 'div';
            $props['subtag_open'] = '<'.$subtag.' id="'.$this->textdomain.'-comment-subdiv-'.$comment->comment_ID.'">';
            $props['subtag_close'] = '</'.$subtag.'>';
        }

        $tmpClass = $this->textdomain.'-comment';
        if($this->has_children) $tmpClass .= ' '.$this->textdomain.'-comment-parent';
        if(intval($comment->comment_parent) != '0') $tmpClass .= ' '.$this->textdomain.'-comment-child';

        $props['wrapper_class'] = implode(' ', get_comment_class( $tmpClass, $comment ));

        $props['comment_id'] = $this->textdomain . '-comment-' . $comment->comment_ID;
        $props['avatar'] = get_avatar($comment, $args['avatar_size']);
        $props['author_meta'] = sprintf('<strong>%s</strong> <span class="'.$this->textdomain.'-comment-time-posted">%s</span>',
            get_comment_author_link($comment->comment_ID),
            sprintf('%1$s %2$s', get_comment_date('', $comment->comment_ID), get_comment_time())
        );
        $props['comment_text'] = ('0' == $comment->comment_approved) ? 'This comment is awaiting moderation' : get_comment_text($comment, array_merge($args, array('add_below' => $add_below, 'depth' => $depth)));

        $props['reply_link'] = get_comment_reply_link(array(
            'add_below' => $add_below,
            'login_text' => 'Log in',
            'max_depth' => $args['max_depth'],
            'depth' => $depth,
            //'before' => '<span class="'.$this->textdomain.'-comment-action">',
            //'after' => '</span><!-- '.$this->textdomain.'-comment-action -->'
        ));

        $temp_edit_link =  get_edit_comment_link($comment);
        $props['edit_link'] = ($temp_edit_link) ? 
                '<span class="'.$this->textdomain.'-comment-action"><a class="comment-link button" href="'.$temp_edit_link.'" target="_blank">Edit</a></span>' : '';

        return $props;
    }

    public function add_to_comment_reply_link_class($html, $args, $comment, $post){
        $pattern = '/class=[\"\']([^\"\']*)[\"\']/i';
        $result = preg_match($pattern, $html);
        if(preg_match($pattern, $html)){
            $html = preg_replace_callback($pattern, function($matches){
                return "class=\"$matches[1] comment-link button\"";
            }, $html);
        }
        return $html;
    }

}
