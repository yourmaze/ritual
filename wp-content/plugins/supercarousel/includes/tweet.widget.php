<?php
if (!class_exists('TwitterOAuth')) {
    require_once(dirname(plugin_dir_path(__FILE__)) . "/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
}

/**
 * Adds Supertweet_Widget widget.
 */
class Supertweet_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    //, 'Access Token' => 'access_token', 'Access Token Secret' => 'access_token_secret'
    private $widgetFields = array('Title' => 'title', 'Number of Tweets' => 'total_tweets', 'Pause Time (In Milliseconds)' => 'pause_time', 'Twitter Screen Name' => 'screen_name', 'Consumer Key' => 'consumer_key', 'Secret Key' => 'secret_key');

    function __construct() {
        parent::__construct('supertweet_widget', // Base ID
                'Super Twitter Widget', // Name
                array('description' => 'A Supercarousel Widget',) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);

        foreach ($this->widgetFields as $lab => $v) {
            if (isset($instance[$v])) {
                $$v = $instance[$v];
            } else {
                $$v = '';
            }
        }

        if ($pause_time == '') {
            $pause_time = '2000';
        }

        $tweets = $this->getTweets($instance);
        if (isset($tweets->errors)) {
            echo $args['before_widget'];
            if (!empty($title)) {
                echo $args['before_title'] . $title . $args['after_title'];
            }
            echo isset($tweets->errors[0]->message) ? $tweets->errors[0]->message : '';
            echo $args['after_widget'];
            return;
        }
        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        $rand = rand(111111, 999999);
        ?>
        <script type="text/javascript" language="javascript">
            jQuery(document).ready(function () {
                var opt = {};
                opt['visible'] = '1';
                opt.mobileVisible = '0';
                opt.tabletVisible = '0';
                opt.auto = true;
                opt.circular = true;
                opt.pauseTime = '<?php echo $pause_time; ?>';
                opt.autoHeight = true;
                opt.swipe = true;
                opt.onload = function ($$) {
                    $$.find('>div').each(function () {
                        jQuery(this).find('span:first').html(jQuery.feedify(jQuery(this).find('span:first').html()));
                    });
                }
                if (jQuery("#supercarousel<?php echo $rand; ?>").find(">div").length == 0) {
                    jQuery("#supercrsl<?php echo $rand; ?>").hide();
                    return;
                }
                var scarousel = jQuery("#supercarousel<?php echo $rand; ?>").supercarousel(opt);
            });
        </script>
        <div id="supercrsl<?php echo $rand; ?>" class="supercrsl">
            <div class="supercarousel supertwitter" id="supercarousel<?php echo $rand; ?>">
                <?php
                foreach ($tweets as $row) {
                    ?>
                    <div>
                        <?php
                        if (isset($row->user->profile_image_url) and $row->user->profile_image_url != '') {
                            ?>
                            <img src="<?php echo $row->user->profile_image_url; ?>" />
                            <?php
                        }
                        ?><br />
                        <a href="<?php echo $row->user->url; ?>">
                            @<?php echo $row->user->screen_name; ?>
                        </a>
                        <br />
                        <span><?php echo $row->text; ?></span>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="clear"></div>
        </div>
        <?php
        echo $args['after_widget'];
    }

    function getTweets($instance = array()) {
        foreach ($this->widgetFields as $lab => $v) {
            if (isset($instance[$v])) {
                $$v = $instance[$v];
            } else {
                $$v = '';
            }
        }

        if ($total_tweets == '') {
            $total_tweets = 5;
        }

        $connection = new TwitterOAuth($consumer_key, $secret_key, $access_token, $access_token_secret);

        return $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $screen_name . "&count=" . $total_tweets);
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        echo '<br /> <b>You need to enter authentication details.</b>';
        foreach ($this->widgetFields as $lab => $v) {
            if (isset($instance[$v])) {
                $$v = $instance[$v];
            } else {
                $$v = '';
            }
            ?>
            <p>
                <label for="<?php echo $this->get_field_id($v); ?>"><?php echo $lab; ?>:</label> 
                <input class="widefat" id="<?php echo $this->get_field_id($v); ?>" name="<?php echo $this->get_field_name($v); ?>" type="text" value="<?php echo isset($instance[$v]) ? esc_attr($instance[$v]) : ''; ?>">
            </p>
            <?php
        }
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = array();

        foreach ($this->widgetFields as $lab => $v) {
            $instance[$v] = (!empty($new_instance[$v]) ) ? strip_tags($new_instance[$v]) : '';
        }

        return $instance;
    }

}

// class Foo_Widget
// register Supertweet_Widget widget
function register_supeer_tweet_widget() {
    register_widget('Supertweet_Widget');
}

add_action('widgets_init', 'register_supeer_tweet_widget');
?>