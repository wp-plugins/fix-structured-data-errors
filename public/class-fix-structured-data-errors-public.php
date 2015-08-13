<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.acceleratormarketing.com
 * @since      1.0.0
 *
 * @package    Fix_Structured_Data_Errors
 * @subpackage Fix_Structured_Data_Errors/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Fix_Structured_Data_Errors
 * @subpackage Fix_Structured_Data_Errors/public
 * @author     Accelerator Marketing <plugins@acceleratormarketing.com>
 */
class Fix_Structured_Data_Errors_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
    
    add_filter('the_content', array( $this, 'preptomodify_content'), 10);
    add_filter('the_content', array( $this, 'add_structured_data'), 10);
        
		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
  
  public function preptomodify_content ($content) {
    if ( in_the_loop() && !is_page() ) {
      $content = ''.$content.'';
    }
    return $content;
  }

  public function add_structured_data($content) {
    $t = get_the_modified_time('F jS, Y');
    $author = get_the_author();
    $title = get_the_title();
    if ( is_single() || is_page()) {
      $content .= '<div class="hatom-extra"><small><span class="entry-title">'.$title.'</span> was last modified: <span class="post-date updated">'.$t.'</span> by <span class="vcard author post-author"><span class="fn">'.$author.'</span></span></small></div>';
    }
    return $content;
  }

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fix_Structured_Data_Errors_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fix_Structured_Data_Errors_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fix-structured-data-errors-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fix_Structured_Data_Errors_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fix_Structured_Data_Errors_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fix-structured-data-errors-public.js', array( 'jquery' ), $this->version, false );

	}

}
