<?php

class TimberRoutes {

	protected $router;

    public static function init( $timber ) {
        // Install ourselves in Timber
        $timber->routes = new TimberRoutes();
    }

	protected function __construct(){
		add_action( 'init', array( $this, 'match_current_request' ) );
    }

    public static function match_current_request() {
    	Routes::match_current_request();
    }

    /**
     * @param string $route
     * @param callable $callback
     */
    public static function add_route($route, $callback, $args = array()) {
        Routes::map($route, $callback, $args);
    }

    /**
     * @param array $template
     * @param mixed $query
     * @param int $status_code
     * @param bool $tparams
     * @return bool
     */
    public static function load_view($template, $query = false, $status_code = 200, $tparams = false) {
        Routes::load($template, $tparams, $query, $status_code);
    }
}
