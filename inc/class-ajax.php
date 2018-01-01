<?php
/**
 * Ajax Handler
 *
 * @package Baltic
 */

class Baltic_Ajax {

    /**
     * @var Baltic_Ajax
     */
    private static $instance;

    private $endpoint = 'ajax-request';

    /**
     * @return FrontendAjax
     */
    public static function getInstance() {

        if (null === static::$instance)
        {
            static::$instance = new static();
        }
        return static::$instance;

    }

    /**
     * FrontendAjax constructor.
     */
    private function __construct() {

        add_filter( 'query_vars',           array( $this, 'ajax_query_vars' ) );

        add_action( 'parse_request',        array( $this, 'ajax_parse_request' ) );

        add_action( 'wp_head',              array( $this, 'frontend_ajax_script' ), 1 );

    }

    public function ajax_query_vars( $vars ) {
        $vars[] = $this->endpoint;
        $vars[] = 'action';
        return $vars;
    }

    public function is_doing_ajax() {
        return true;
    }

    public function ajax_parse_request( $wp ) {

        if ( array_key_exists( $this->endpoint, $wp->query_vars ) ) {
            // need to flag this request is ajax request
            add_filter( 'wp_doing_ajax', array( $this, 'is_doing_ajax' ) );

            $action = $wp->query_vars['action'];

            switch( $action ) {
                case 'quick_view_product' :

					if ( ! isset( $_REQUEST['product_id'] ) ) {
						die();
					}

					$product_id = intval( $_REQUEST['product_id'] );
					query_posts( 'p=' . $product_id . '&post_type=product' );
					ob_start();
					get_template_part( 'components/quick', 'view' );
					echo ob_get_clean();

					die();

				break;
				default :
					esc_html_e( 'No Request', 'baltic' );
					die();
				break;
            }

            do_action( 'baltic_ajax_' . $action );

            exit;

        }
    }

    public function ajax_url() {
        return add_query_arg( array( $this->endpoint => 'baltic' ), home_url('/') );
    }

    public function frontend_ajax_script() {

        if( ! is_admin() ) {
            ?>
            <script type="text/javascript"> var baltic_ajax_url = '<?php echo esc_url( $this->ajax_url() ); ?>'; </script>
            <?php
        }

    }

}

return Baltic_Ajax::getInstance();
