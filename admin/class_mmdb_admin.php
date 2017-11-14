<?php
/**
 * Defines and orchestrates the admin-specific functionality of the plugin.
 *
 * Also the hooks to enqueue the admin-specific stylesheet and JavaScript.
 *
 * @link       https://e-leven.net/
 * @since      1.0.0
 *
 * @package    My_movie_database
 * @subpackage My_movie_database/admin
 * @author     Kostas Stathakos <info@e-leven.net>
 */

class MMDB_Admin

{

	private $plugin_name;
	private $version;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    		The version of this plugin.
	 */

	public function __construct($plugin_name, $version)

	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->set_admin_data_types = $this->set_admin_data_types();
		$this->set_admin_settings();
	}


	/**
	 * Instantiate and return all the tmdb data types that will be (potentially) available to use ex: tvhows and movies.
	 *
	 * @since     1.0.0
	 * @return    array
	 */

	private function set_admin_data_types()
	{
		$plugin_admin_types = array();
		$plugin_admin_types[] = new MMDB_Data_Type_movie('movie', 'Movie', 'dashicons-video-alt');
		$plugin_admin_types[] = new MMDB_Data_Type_tvshow('tvshow', 'TvShow', 'dashicons-welcome-view-site');
		$plugin_admin_types[] = new MMDB_Data_Type_person('person', 'Person', 'dashicons-businessman');
		return $plugin_admin_types;
	}


	/**
	 * Instantiate the class that defines the option page settings functionality for the plugin
	 *
	 * @since     1.0.0
	 */

	private function set_admin_settings()
	{
		$plugin_admin_types = $this->set_admin_data_types;
		new MMDB_Αdmin_Settings($plugin_admin_types);
	}


	/**
	 * Static method to get plugin options set by admin user.
	 * 
	 * @since     0.7.0
	 * @return    string 
	 */

	public static function mmdb_get_option($option, $section, $default = '')

	{
		$options = get_option($section);

		if (isset($options[$option])) {
			return $options[$option];
		}
		return $default;
	}


	/**
	 * Register / create custom post types and related taxonomy
	 *
	 * @since     1.0.0 
	 */

	public function make_custom_post_types() {

		$plugin_admin_types = $this->set_admin_data_types;
		$custom_post_types = array();
		$i = 0;

		foreach($plugin_admin_types as $plugin_admin_type) {
			if ($plugin_admin_type->get_post_type_setting() == $plugin_admin_type->type_slug) {

				$custom_post_types[$i] = new CustomPostType($plugin_admin_type->type_slug, array(
					"supports" => array(
						"title",
						"editor",
						"author",
						"thumbnail",
						"excerpt",
						"trackbacks",
						"custom-fields",
						"comments",
						"revisions",
						"page-attributes"
					)
				));
				$custom_post_types[$i]->menu_icon($plugin_admin_type->type_menu_icon);
				$custom_post_types[$i]->register_taxonomy(array(
					'taxonomy_name' => "$plugin_admin_type->type_name category",
					'singular' => "$plugin_admin_type->type_name Category",
					'plural' => "$plugin_admin_type->type_name Categories",
					'slug' => "$plugin_admin_type->type_name category"
				));
				$i++;

			}
		}
		return;
	}


	/**
	 * Check settings whether default wp post type should be edited / modified or not	
	 *
	 * @since     1.0.0
	 * @return    boolean
	 */

	public function edit_wp_posts_setting() {

		$edit_wp_posts = false;

		if($this->mmdb_get_option('mmdb_movie_post_type', 'mmdb_opt_advanced', 'movie') == 'posts_custom') {

			$edit_wp_posts = true;

		}

		return $edit_wp_posts;
	}


	/**
	 * Instantiate class that edits / modifies wp post type if settings permit	
	 *
	 * @since     1.0.0
	 */

	public function edit_wp_posts() {

		if($this->edit_wp_posts_setting()){
	
			new MMDB_Admin_Posts('Movie', 'movie', 'Movies');
		}

		return;
	}


	/**
	 * Get the slugs of the active admin screens as set in admin settings (ex: tvshow and post).
	 *
	 * @since     1.0.0
	 * @return    array    
	 */

	public function get_active_post_types() {

		$plugin_admin_types = $this->set_admin_data_types;

		foreach($plugin_admin_types as $plugin_admin_type) {

			if ($plugin_admin_type->get_post_type_setting() != 'no_post') {

				if (substr($plugin_admin_type->get_post_type_setting() , 0, 5) === 'posts') {
					$active_post_types[] = 'post';
				}
				else {
					$active_post_types[] = $plugin_admin_type->get_post_type_setting();
				}

			}
		}
		return $active_post_types;
	}


	/**
	 * Determine if we are on a mmdb active post type (edit or new post) screen
	 *
	 * @since     1.0.0
	 * @return    boolean    
	 */

	public function is_active_mmdb_screen(){
		$result = false;
    	$screen = get_current_screen();
		$active_post_types = $this->get_active_post_types();
		$post_base = $screen->base;
		$post_idtype = $screen->id;
		foreach ($active_post_types as $active_post_type) {
    		// Check screen hook and current post type
			if ($post_idtype == $active_post_type && $post_base == 'post') {
				$result = true;
			}
		}
    	
	return $result;
	}


	/**
	 * Make / register MMDB metaboxes for the active post types
	 *
	 * @since     1.0.0
	 */

	public function make_post_meta_boxes() {

		$get_active_post_types = $this->get_active_post_types();
		new MMDB_Meta_Box($get_active_post_types);
		return;
	}


	/**
	 * Hides the meta boxes in the post screens as default behavior (if the user has not yet set his screen options)
	 *
	 * @since     1.0.0
	 * @return    array
	 */

	public function mmdb_hide_meta_box($hidden)

	{
		// do this only for our active mmdb post types
		if ($this->is_active_mmdb_screen()) {
			$hidden = array(
				'postexcerpt',
				'slugdiv',
				'postcustom',
				'trackbacksdiv',
				'commentstatusdiv',
				'commentsdiv',
				'authordiv',
				'revisionsdiv'
			);
			//$hidden[] = 'my_custom_meta_box'; //for hiding a custom meta box, enter the id used in the add_meta_box() function.
		
		}
		return $hidden;
	}


	/**
	 * Register the JavaScript and the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */

	public function enqueue_scripts() {


	 	// Check to load only on mmdb active post types edit or new post screens.
		if($this->is_active_mmdb_screen()){

			wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/my_movie_database-admin.css', array(), $this->version, 'all');

			wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/my_movie_database-admin.js', array('jquery'), $this->version, false);

		}

	 	// Load for all admin screens below.


	}
}



