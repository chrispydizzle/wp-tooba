<?php

class UPCP_Widget_Product_List extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'upcp_product_list_widget', // Base ID
			__( 'UPCP Product(s) List', 'ultimate-product-catalogue' ), // Name
			array( 'description' => __( 'Insert a list of product(s)', 'UPCP' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		/*if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		echo __( 'Hello, World!', 'UPCP' );*/
		echo do_shortcode( "[insert-products product_ids='" . $instance['product_list'] . "' catalogue_url='" . $instance['catalogue_url'] . "' products_wide='" . $instance['products_per_row'] . "']" );
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$product_list     = ! empty( $instance['product_list'] ) ? $instance['product_list'] : __( 'Product IDs', 'UPCP' );
		$catalogue_url    = ! empty( $instance['catalogue_url'] ) ? $instance['catalogue_url'] : __( 'Catalogue URL', 'UPCP' );
		$products_per_row = ! empty( $instance['products_per_row'] ) ? $instance['products_per_row'] : __( 'Products per Row', 'UPCP' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'product_list' ); ?>"><?php _e( 'Comma-separated product IDs:', 'UPCP' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'product_list' ); ?>"
                   name="<?php echo $this->get_field_name( 'product_list' ); ?>" type="text"
                   value="<?php echo esc_attr( $product_list ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'catalogue_url' ); ?>"><?php _e( 'The URL of your catalogue:', 'UPCP' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'catalogue_url' ); ?>"
                   name="<?php echo $this->get_field_name( 'catalogue_url' ); ?>" type="text"
                   value="<?php echo esc_attr( $catalogue_url ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'products_per_row' ); ?>"><?php _e( 'The number of products per row:', 'UPCP' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'products_per_row' ); ?>"
                   name="<?php echo $this->get_field_name( 'products_per_row' ); ?>" type="text"
                   value="<?php echo esc_attr( $products_per_row ); ?>">
        </p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                     = array();
		$instance['product_list']     = ( ! empty( $new_instance['product_list'] ) ) ? strip_tags( $new_instance['product_list'] ) : '';
		$instance['catalogue_url']    = ( ! empty( $new_instance['catalogue_url'] ) ) ? strip_tags( $new_instance['catalogue_url'] ) : '';
		$instance['products_per_row'] = ( ! empty( $new_instance['products_per_row'] ) ) ? strip_tags( $new_instance['products_per_row'] ) : '';

		return $instance;
	}
}

add_action( 'widgets_init', function () {
	register_widget( "UPCP_Widget_Product_List" );
} );

class UPCP_Widget_Random_Products extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'upcp_random_products_widget', // Base ID
			__( 'UPCP Random Products', 'ultimate-product-catalogue' ), // Name
			array( 'description' => __( 'Inserts a number of random products', 'UPCP' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		/*if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		echo __( 'Hello, World!', 'UPCP' );*/
		echo do_shortcode( "[insert-products catalogue_id='" . $instance['catalogue_id'] . "' product_count='" . $instance['product_count'] . "' catalogue_url='" . $instance['catalogue_url'] . "']" );
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$catalogue_id  = ! empty( $instance['catalogue_id'] ) ? $instance['catalogue_id'] : __( 'Catalogue ID', 'UPCP' );
		$product_count = ! empty( $instance['product_count'] ) ? $instance['product_count'] : __( 'Product Count', 'UPCP' );
		$catalogue_url = ! empty( $instance['catalogue_url'] ) ? $instance['catalogue_url'] : __( 'Catalogue URL', 'UPCP' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'catalogue_id' ); ?>"><?php _e( 'Catalogue ID:', 'UPCP' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'catalogue_id' ); ?>"
                   name="<?php echo $this->get_field_name( 'catalogue_id' ); ?>" type="text"
                   value="<?php echo esc_attr( $catalogue_id ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'product_count' ); ?>"><?php _e( 'Number of products to display:', 'UPCP' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'product_count' ); ?>"
                   name="<?php echo $this->get_field_name( 'product_count' ); ?>" type="text"
                   value="<?php echo esc_attr( $product_count ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'catalogue_url' ); ?>"><?php _e( 'The URL of your catalogue:', 'UPCP' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'catalogue_url' ); ?>"
                   name="<?php echo $this->get_field_name( 'catalogue_url' ); ?>" type="text"
                   value="<?php echo esc_attr( $catalogue_url ); ?>">
        </p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                  = array();
		$instance['catalogue_id']  = ( ! empty( $new_instance['catalogue_id'] ) ) ? strip_tags( $new_instance['catalogue_id'] ) : '';
		$instance['product_count'] = ( ! empty( $new_instance['product_count'] ) ) ? strip_tags( $new_instance['product_count'] ) : '';
		$instance['catalogue_url'] = ( ! empty( $new_instance['catalogue_url'] ) ) ? strip_tags( $new_instance['catalogue_url'] ) : '';

		return $instance;
	}
}

add_action( 'widgets_init', function () {
	register_widget( "UPCP_Widget_Random_Products" );
} );

class UPCP_Widget_Recent_Products extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'upcp_recent_products_widget', // Base ID
			__( 'UPCP Recent Products', 'ultimate-product-catalogue' ), // Name
			array( 'description' => __( 'Insert a number of recent products', 'UPCP' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		/*if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		echo __( 'Hello, World!', 'UPCP' );*/
		echo do_shortcode( "[insert-products product_count='" . $instance['product_count'] . "' catalogue_url='" . $instance['catalogue_url'] . "']" );
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$product_count = ! empty( $instance['product_count'] ) ? $instance['product_count'] : __( 'Product Count', 'UPCP' );
		$catalogue_url = ! empty( $instance['catalogue_url'] ) ? $instance['catalogue_url'] : __( 'Catalogue URL', 'UPCP' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'product_count' ); ?>"><?php _e( 'Number of products to display:', 'UPCP' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'product_count' ); ?>"
                   name="<?php echo $this->get_field_name( 'product_count' ); ?>" type="text"
                   value="<?php echo esc_attr( $product_count ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'catalogue_url' ); ?>"><?php _e( 'The URL of your catalogue:', 'UPCP' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'catalogue_url' ); ?>"
                   name="<?php echo $this->get_field_name( 'catalogue_url' ); ?>" type="text"
                   value="<?php echo esc_attr( $catalogue_url ); ?>">
        </p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                  = array();
		$instance['product_count'] = ( ! empty( $new_instance['product_count'] ) ) ? strip_tags( $new_instance['product_count'] ) : '';
		$instance['catalogue_url'] = ( ! empty( $new_instance['catalogue_url'] ) ) ? strip_tags( $new_instance['catalogue_url'] ) : '';

		return $instance;
	}
}

add_action( 'widgets_init', function () {
	register_widget( "UPCP_Widget_Recent_Products" );
} );

class UPCP_Widget_Popular_Products extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'upcp_popular_products_widget', // Base ID
			__( 'UPCP Popular Products', 'ultimate-product-catalogue' ), // Name
			array( 'description' => __( 'Insert a number of popular products', 'UPCP' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo do_shortcode( "[insert-products catalogue_id='" . $instance['catalogue_id'] . "' catalogue_search='popular' product_count='" . $instance['product_count'] . "' catalogue_url='" . $instance['catalogue_url'] . "']" );
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$catalogue_id  = ! empty( $instance['catalogue_id'] ) ? $instance['catalogue_id'] : __( 'Catalogue ID', 'UPCP' );
		$product_count = ! empty( $instance['product_count'] ) ? $instance['product_count'] : __( 'Product Count', 'UPCP' );
		$catalogue_url = ! empty( $instance['catalogue_url'] ) ? $instance['catalogue_url'] : __( 'Catalogue URL', 'UPCP' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'catalogue_id' ); ?>"><?php _e( 'Catalogue ID:', 'UPCP' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'catalogue_id' ); ?>"
                   name="<?php echo $this->get_field_name( 'catalogue_id' ); ?>" type="text"
                   value="<?php echo esc_attr( $catalogue_id ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'product_count' ); ?>"><?php _e( 'Number of products to display:', 'UPCP' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'product_count' ); ?>"
                   name="<?php echo $this->get_field_name( 'product_count' ); ?>" type="text"
                   value="<?php echo esc_attr( $product_count ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'catalogue_url' ); ?>"><?php _e( 'The URL of your catalogue:', 'UPCP' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'catalogue_url' ); ?>"
                   name="<?php echo $this->get_field_name( 'catalogue_url' ); ?>" type="text"
                   value="<?php echo esc_attr( $catalogue_url ); ?>">
        </p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                  = array();
		$instance['catalogue_id']  = ( ! empty( $new_instance['catalogue_id'] ) ) ? strip_tags( $new_instance['catalogue_id'] ) : '';
		$instance['product_count'] = ( ! empty( $new_instance['product_count'] ) ) ? strip_tags( $new_instance['product_count'] ) : '';
		$instance['catalogue_url'] = ( ! empty( $new_instance['catalogue_url'] ) ) ? strip_tags( $new_instance['catalogue_url'] ) : '';

		return $instance;
	}
}

add_action( 'widgets_init', function () {
	register_widget( "UPCP_Widget_Popular_Products" );
} );

class UPCP_Widget_Product_Search extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'upcp_search_bar_widget', // Base ID
			__( 'UPCP Search Bar', 'ultimate-product-catalogue' ), // Name
			array( 'description' => __( 'Insert a product search box', 'UPCP' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo "<div class='upcp-product-search-widget-div'>";
		echo "<form method='post' action='" . add_query_arg( 'overview_mode', "None", $instance['catalogue_url'] ) . "'>";
		echo "<div class='upcp-widget-search-label'>" . $instance['search_label'] . "</div>";
		echo "<div class='upcp-widget-search-input'><input type='text' name='prod_name' placeholder='" . $instance['search_placeholder'] . "'/></div>";
		echo "<input type='submit' class='upcp-widget-submit' name='UPCP_Widget_Search_Submit' value='" . $instance['search_label'] . "' />";
		echo "</form>";
		echo "</div>";
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$search_label       = ! empty( $instance['search_label'] ) ? $instance['search_label'] : __( 'Search Label', 'UPCP' );
		$search_placeholder = ! empty( $instance['search_placeholder'] ) ? $instance['search_placeholder'] : __( 'Search Placeholder', 'UPCP' );
		$catalogue_url      = ! empty( $instance['catalogue_url'] ) ? $instance['catalogue_url'] : __( 'Catalogue URL', 'UPCP' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'search_label' ); ?>"><?php _e( 'The label for the search input:', 'UPCP' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'search_label' ); ?>"
                   name="<?php echo $this->get_field_name( 'search_label' ); ?>" type="text"
                   value="<?php echo esc_attr( $search_label ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'search_placeholder' ); ?>"><?php _e( 'The label for the input placeholder:', 'UPCP' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'search_placeholder' ); ?>"
                   name="<?php echo $this->get_field_name( 'search_placeholder' ); ?>" type="text"
                   value="<?php echo esc_attr( $search_placeholder ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'catalogue_url' ); ?>"><?php _e( 'The URL of your catalogue:', 'UPCP' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'catalogue_url' ); ?>"
                   name="<?php echo $this->get_field_name( 'catalogue_url' ); ?>" type="text"
                   value="<?php echo esc_attr( $catalogue_url ); ?>">
        </p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                       = array();
		$instance['search_label']       = ( ! empty( $new_instance['search_label'] ) ) ? strip_tags( $new_instance['search_label'] ) : '';
		$instance['search_placeholder'] = ( ! empty( $new_instance['search_placeholder'] ) ) ? strip_tags( $new_instance['search_placeholder'] ) : '';
		$instance['catalogue_url']      = ( ! empty( $new_instance['catalogue_url'] ) ) ? strip_tags( $new_instance['catalogue_url'] ) : '';

		return $instance;
	}
}

add_action( 'widgets_init', function () {
	register_widget( "UPCP_Widget_Product_Search" );
} );

?>