<?php

/**
 * The file that defines the mmdb shortcode class
 *
 * The MMDB_Shortcode_Type class is a subclass of the abstract MMDB_type class.
 *
 * @link       https://e-leven.net/
 * @since      1.0.0
 *
 * @package    My_movie_database
 * @subpackage My_movie_database/includes/mmdb_type_class
 */


class MMDB_Shortcode_Type extends MMDB_Type {


	public $type_slug;
	public $template;
	public $size;
	public $tmdb_id;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $type_slug   The mmdb content type ('slug') for the object
	 * @param      string    $tmdb_id     The tmdb id for the type object
	 * @param      string    $template    The template for the type object
	 */

	public function __construct($type_slug = 'movie', $tmdb_id = '655', $template = 'tabs', $size = 'medium') {

		$this->type_slug = $type_slug;
		$this->tmdb_id = $tmdb_id;
		$this->template = $template;
		$this->size = $size;
		$this->view_type = $this->viewType();
		$data_type = $this->data_type_class() . $type_slug;
		$this->tmdb_type = new $data_type($type_slug);
		$this->public_files = new MMDB_Public_Files;

	}


	/**
	 * The wordpress view type 
	 *
	 * @since     1.0.0
	 * @return    string
	 */

	protected function viewType() {

		return 'shortcode';
	}


	/**
	 * Handle the shortcode user input
	 *
	 * @since    1.0.0
	 * @param     $atts  	 	an associative array of attributes, or an empty string if no attributes are given
	 * @param     $content   	the enclosed content (if the shortcode is used in its enclosing form)
	 * @param     $tag 			the shortcode tag, useful for shared callback functions
	 * @return    function     	Run with the givens(!)
	 */

	public function mmdb_shortcode($atts, $content = null, $tag = '') {
    	// normalize attributes - lowercase
    	$atts = array_change_key_case((array)$atts, CASE_LOWER);
 
    	// override default attributes with user input
    	$mmdb_show_atts = shortcode_atts([
                                     'id' => $this->tmdb_id,
                                     'type' => $this->type_slug,
                                     'template' => $this->template,
                                     'size' => $this->size,
                                 ], $atts, $tag); 

		return $this->mmdb_the_shortcode_view($mmdb_show_atts);

	}


	/**
	 * Create the MMDB_Shortcode_Type object
	 *
	 * @since    1.0.0
	 * @param     string    $mmdb_show_atts    The shortcode attributes
	 * @return    object    The MMDB_Shortcode_Type object
	 */

	protected function mmdb_set_shortcode_content($mmdb_show_atts) {

		$mmdb_type = new MMDB_Shortcode_Type($mmdb_show_atts['type'], $mmdb_show_atts['id'], $mmdb_show_atts['template'], $mmdb_show_atts['size']);

		return $mmdb_type;
	}	


	/**
	 * Setup and render the mmdb shortcode view
	 *
	 * @since    1.0.0
	 * @param     string     $mmdb_show_atts    The shortcode attributes
	 * @return    string     		The MMDB_Shortcode_Type view
	 */

	protected function mmdb_the_shortcode_view($mmdb_show_atts) {

		$mmdb_type = $this->mmdb_set_shortcode_content($mmdb_show_atts);

		$mmdb_content = $mmdb_type->mmdb_the_template_view($mmdb_type);

		return $mmdb_content['output'];

	}


	/**
	 * Get the width setting for type object
	 *
	 * @since     1.0.2
	 * @return    string    
	 */

	protected function get_width_setting() {

		return $this->size;
	}



	/**
	 * Register the shortcode with wordpress 
	 *
	 * @since    1.0.0
	 * @param     string     Shortcode tag to be searched in post content (shortcode name).
	 * @return    function   Hook to run when shortcode is found (callback function).
	 */

	public function mmdb_shortcodes_init() {

    	add_shortcode('my_movie_db', array( $this, $this->plugin_slug() . '_shortcode' ));

	}


}   

