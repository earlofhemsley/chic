<?php 

class facebookPagePlugin extends WP_Widget{

    private $fields = array(
        'page-id' => array(
            'label' => 'Page Slug or Id',
            'description' => 'The unique facebook identifier of your page',
            'type' => 'text',
            'class' => 'widefat',
            'other_atts' => '',
            'default' => '',
        ),
        'width' => array(
            'label' => 'Width',
            'description' => 'The width of the page plugin',
            'type' => 'number',
            'class' => 'small-text',
            'other_atts' => 'step="100"',
            'default' => '500'
        ),        
        'height' => array(
            'label' => 'Height',
            'description' => 'The height of the page plugin',
            'type' => 'number',
            'class' => 'small-text',
            'other_atts' => 'step="100"',
            'default' => '1000',
        ),
        'small-header' => array(
            'label' => 'Small header',
            'description' => '',
            'type' => 'checkbox',
            'class' => 'checkbox',
            'other_atts' => '',
            'default' => 'false'
        ),
        'hide-cover' => array(
            'label' => 'Hide cover photo',
            'description' => '',
            'type' => 'checkbox',
            'class' => 'checkbox',
            'other_atts' => '',
            'default' => 'false'
        ),
        'show-facepile' => array(
            'label' => 'Show face pile',
            'description' => 'Show the profile photos of many who like your page',
            'type' => 'checkbox',
            'class' => 'checkbox',
            'other_atts' => '',
            'default' => 'true'
        ),
        'adapt-container-width' => array(
            'label' => 'Adapt to container width',
            'description' => 'The plugin will attempt to fill its container',
            'type' => 'checkbox',
            'class' => 'checkbox',
            'other_atts' => '',
            'default' => 'true'
        ),
    );

    public function __construct(){
        parent::__construct('facebook-page-plugin', 'Facebook Page Plugin', array(
            'description' => 'A simple integration of Facebook\'s Page Plugin in Wordpress Widget Form'
        ));
        add_action('wp_footer', array($this, 'facebook_plugin_scripts'));
        add_action('widgets_init', array($this, 'register'));
    }

    public function form($instance){
        echo '<div class="fb-plugin-form-container">';
        foreach($this->fields as $field => $args){
            if(!isset($instance[$field])) $instance[$field] = $args['default'];
         
            echo '<p>';
            switch($args['type']){
                case 'checkbox':
                    if($instance[$field] === 'true') $args['other_atts'] .= ' checked';
                    echo <<< EOT
                            <label for="{$this->get_field_id($field)}">
                            <input 
                                type="{$args['type']}"
                                id="{$this->get_field_id($field)}"
                                name="{$this->get_field_name($field)}"
                                type="{$args['type']}"
                                {$args['other_atts']}
                                value="true"
                            />
                            {$args['label']}
                            </label>
EOT;
                    break;
                default:
                    $labelStyles = strpos($args['class'], 'widefat') !== false ? 'display:block;margin-bottom:5px' : '';
                    echo <<< EOT
                            <label style="$labelStyles" for="{$this->get_field_id($field)}">{$args['label']}</label>
                            <input 
                                class="{$args['class']}"
                                id="{$this->get_field_id($field)}"
                                name="{$this->get_field_name($field)}"
                                type="{$args['type']}"
                                value="{$instance[$field]}"
                                {$args['other_atts']}
                            />
EOT;
                    break;
            }
            if(!empty($args['description'])){
                echo "<span style='display:block; font-style:italic; padding-left:10px'>{$args['description']}</span>";
            }    
            echo '</p>';
        }
        echo '</div>';
    }
    public function update($new, $old){
        $ret = array();
        foreach($this->fields as $field => $args){
            if($args['type'] == 'checkbox'){
                $ret[$field] = isset($new[$field]) ? $new[$field] : 'false'; 
            }
            else{
                $ret[$field] = strip_tags($new[$field]);
            }
        }
        return $ret;

    }
    public function widget($args, $instance){
        foreach($this->fields as $field => $defaults){
            if(!isset($instance[$field])) $instance[$field] = $defaults['default'];
        }
        if(empty($instance['page-id']))
            echo '<p>Cannot render plugin. No Page Id set</p>';
        else{
            echo '<div class="sewchic-facebook-page-plugin-widget">';
                echo $args['before_widget'];
                echo <<< EOT
                    <div 
                        class="fb-page" 
                        data-href="https://www.facebook.com/{$instance['page-id']}" 
                        data-tabs="timeline" 
                        data-width="{$instance['width']}" 
                        data-height="{$instance['height']}" 
                        data-small-header="{$instance['small-header']}" 
                        data-adapt-container-width="{$instance['adapt-container-width']}" 
                        data-hide-cover="{$instance['hide-cover']}" 
                        data-show-facepile="{$instance['show-facepile']}"
                    >
                        <blockquote 
                            cite="https://www.facebook.com/{$instance['page-id']}" 
                            class="fb-xfbml-parse-ignore"
                        >
                            <a href="https://www.facebook.com/{$instance['page-id']}">Facebook Page Plugin</a>
                        </blockquote>
                    </div>
EOT;
                echo $args['after_widget'];
            echo '</div>';
        } 
    }

    public function register(){
        register_widget('facebookPagePlugin');
    }
    
    public function facebook_plugin_scripts(){
        echo <<< EOT
            <script>
                (function(d, b, id){
                    if(d.getElementById(id)) return;
                    var body = d.getElementsByTagName(b)[0];
                    var fb = d.createElement('div');
                    fb.id = id;
                    body.insertBefore(fb, body.childNodes[0]);
                }(document, 'body', 'fb-root'));
                (function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10';
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
EOT;

    }
}

$fpp = new facebookPagePlugin();
