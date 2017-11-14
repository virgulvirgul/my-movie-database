<?php
/**
 * Defines the option page settings functionality for the plugin.
 *
 * @link       https://e-leven.net/
 * @since      0.7.0
 *
 * @package    My_movie_database
 * @subpackage My_movie_database/admin
 * @author     Kostas Stathakos <info@e-leven.net>
 */

class MMDB_Αdmin_Settings {

    private $settings_api;
    private $plugin_admin_types;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.7.0
	 * @param      object    $settings_api       	The name of this plugin.
	 * @param      object    $plugin_admin_types    The version of this plugin.
	 */

    public function __construct($plugin_admin_types) {
        $this->settings_api = new WeDevs_Settings_API;
		$this->plugin_admin_types = $plugin_admin_types;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }


	/**
     * Initialize and register all the settings sections and fields with Wordpress
	 *
	 * @since    0.7.0
	 * @return    array    		all settings sections and fields
	 */

    public function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    public function admin_menu() {
        add_options_page( 'The Movie Database for WP Options', 'Movie Database', 'manage_options', 'mmdb_settings', array($this, 'plugin_page') );
    }


	/**
     * Dynamically get/set the settings sections associated with TMDB data type views available to the plugin 
	 *
	 * @since    1.0.0 
	 * @return   array   		data type settings sections
	 */

    private function get_types_settings_sections() {

		$plugin_admin_types = $this->plugin_admin_types;

		foreach($plugin_admin_types as $plugin_admin_type) {

       		$sections[] =
            	array(
               	 'id'    => $plugin_admin_type->type_setting_id,
                	'title' => __( "$plugin_admin_type->type_name Settings", 'my-movie-db' )
            	);

			}

        return $sections;
    }

	/**
     * Get/set the settings sections that go before the TMDB data type views (ex: Basic settings) 
	 *
	 * @since    1.0.0 
	 * @return   array   'before' settings sections
	 */

	/**
    private function get_before_settings_sections() {

        $sections[] = 
            array(
                'id'    => 'mmdb_opt_basic',
                'title' => __( 'Basic Settings', 'my-movie-db' )
            );
        return $sections;
    }
	 */

	/**
     * Get/set the settings sections that go after the TMDB data type views (ex: Advanced settings) 
	 *
	 * @since    1.0.0 
	 * @return   array   'after' settings sections
	 */

    private function get_after_settings_sections() {


        $sections[] = 
            array(
                'id'    => 'mmdb_opt_advanced',
                'title' => __( 'Advanced Settings', 'my-movie-db' )
            );
        return $sections;
    }



	/**
     * Get/set all the settings sections to be then initialized and registered via `admin_init` hook
	 *
	 * @since    0.7.0
	 * 
	 * @since    1.0.0 			split into other seperate section functions which are merged here 
	 * @return    array    		all settings sections
	 */
    private function get_settings_sections() {

        //$sections1 = $this->get_before_settings_sections();
        $sections2 = $this->get_types_settings_sections();
        $sections3 = $this->get_after_settings_sections();

        //$sections = array_merge($sections1, $sections2, $sections3);
        $sections = array_merge($sections2, $sections3);

        return $sections;
    }




	/**
     * Dynamically get/set the settings fields associated with TMDB data type views available to the plugin 
	 *
	 * @since    1.0.0 
	 * @return   array   		data type settings fields
	 */

    private function get_types_settings_fields() {

		$plugin_admin_types = $this->plugin_admin_types;
		$k = 1;
		$merge_settings = array();

		foreach($plugin_admin_types as $plugin_type) {

        $settings_fields[$k] = array(

            $plugin_type->type_setting_id => array(

                 array(
                    'name'    => $plugin_type->tmpl_setting_id,
                    'label'   => __( "$plugin_type->type_name template", 'my-movie-db' ),
                    'desc'    => __( 'Select the template to use. The custom template is empty by default', 'my-movie-db' ),
                    'type'    => 'select',
                    'default' => 'tab-full',
                    'options' => array(
                        'tabs' => __( 'With tabs', 'my-movie-db' ),
                        'accordion' => __( 'With accordion', 'my-movie-db' ),
                        'custom'  => __( 'Custom template', 'my-movie-db' ),
                    )
                ),    
                 array(
                    'name'    => $plugin_type->width_setting_id,
                    'label'   => __( "$plugin_type->type_name width", 'my-movie-db' ),
                    'desc'    => __( 'Select the responsive widths to use. Full-width if you have a no sidebar layout, one-sidebar if you have, well, one sidebar(!), etc', 'my-movie-db' ),
                    'type'    => 'select',
                    'default' => 'Full-width',
                    'options' => array(
                        'large' => __( 'Full-width', 'my-movie-db' ),
                        'medium' => __( 'One sidebar', 'my-movie-db' ),
                        'small' => __( 'Two sidebars', 'my-movie-db' ),
                    )
                ),    

                array(
                    'name'    => $plugin_type->pos_setting_id,
                    'label'   => __( 'Display position', 'my-movie-db' ),
                    'desc'    => __( 'Choose to display MMDB info before or after the content', 'my-movie-db' ),
                    'type'    => 'radio',
                    'default' => 'after',
                    'options' => array(
                        'after'  => __( 'After content', 'my-movie-db' ),
                        'before' => __( 'Before content', 'my-movie-db' )
                    )
                ),
                array(
                    'name'    => $plugin_type->sections_setting_id,
                    'label'   => __( 'Hide sections', 'my-movie-db' ),
                    'desc'    => __( 'Select the sections to be hidden', 'my-movie-db' ),
                    'type'    => 'multicheck',
                    'default' => '',
                    'options' => $plugin_type->set_hide_sections_setting()
                ),

                array(
                    'name'    => $plugin_type->header_color_setting_id,
                    'label'   => __( 'Header Background Color', 'my-movie-db' ),
                    'desc'    => __( "Background color for the $plugin_type->type_slug headers", 'my-movie-db' ),
                    'type'    => 'color',
                    'default' => '#265a88'
                ),
                array(
                    'name'    => $plugin_type->body_color_setting_id,
                    'label'   => __( 'Body Color', 'my-movie-db' ),
                    'desc'    => __( "Background color for the $plugin_type->type_slug content", 'my-movie-db' ),
                    'type'    => 'color',
                    'default' => '#DCDCDC'
                ),

            )
		);

    	$merge_settings  = array_merge( $merge_settings, $settings_fields[$k]); 		
		$k++;
		}

        return $merge_settings;
    }

	/**
     * Get/set the settings fields that go after the TMDB data type views (ex: Advanced settings fields) 
	 *
	 * @since    1.0.0 
	 * @return   array   'after' settings fields
	 */

	/**
    private function get_before_settings_fields() {

	}
	 */


	/**
     * Get/set the settings fields that go after the TMDB data type views (ex: Advanced settings fields) 
	 *
	 * @since    1.0.0 
	 * @return   array   'after' settings fields
	 */

    private function get_after_settings_fields() {

        $settings_fields = array(

       		'mmdb_opt_advanced' => array(
                array(
                    'name'    => 'mmdb_movie_post_type',
                    'label'   => __( 'Enable "Movies" section?', 'my-movie-db' ),
                    'desc'    => __( 'Movies post type - what is to be done?', 'my-movie-db' ),
                    'type'    => 'radio',
                    'default' => 'movie',
                    'options' => array(
                        'movie'  => __( 'Yes, use a "Movies" post section (custom post type)', 'my-movie-db' ),
                        'posts_custom' => __( 'No, use Posts but change the "Posts" menu label to "Movies"', 'my-movie-db' ),
                        'posts'  => __( 'No, use Posts and leave them as they are', 'my-movie-db' ),
                        'no_post'  => __( 'None of the above, I only want to use Movies with shortcodes (or not at all)', 'my-movie-db' ),
                    )
                ),
                array(
                    'name'    => 'mmdb_tvshow_post_type',
                    'label'   => __( 'Enable "Tvshows" section?', 'my-movie-db' ),
                    'desc'    => __( 'Tvshows post type - what is to be done?', 'my-movie-db' ),
                    'type'    => 'radio',
                    'default' => 'tvshow',
                    'options' => array(
                        'tvshow'  => __( 'Yes, use a "TvShows" post section (custom post type)', 'my-movie-db' ),
                        'no_post'  => __( 'No no, I only want to use TvShows with shortcodes (or not at all)', 'my-movie-db' ),
                    )
                ),
                array(
                    'name'    => 'mmdb_person_post_type',
                    'label'   => __( 'Enable "Persons" section?', 'my-movie-db' ),
                    'desc'    => __( 'Persons post type - what is to be done?', 'my-movie-db' ),
                    'type'    => 'radio',
                    'default' => 'person',
                    'options' => array(
                        'person'  => __( 'Yes, use a "Persons" post section (custom post type)', 'my-movie-db' ),
                        'no_post'  => __( 'No no, I only want to use Persons with shortcodes (or not at all)', 'my-movie-db' ),
                    )
                ),
                array(
                    'name'    => 'mmdb_css_file',
                    'label'   => __( 'Include mmdb css file', 'my-movie-db' ),
                    'desc'    => __( 'Default templates require bootstrap libraries, select No if you dont want this plugin to include them', 'my-movie-db' ),
                    'type'    => 'select',
                    'default' => 'yes',
                    'options' => array(
                        'yes'  => __( 'Yes, load it for posts that use my-movie-database only', 'my-movie-db' ),
                        'all'  => __( 'Yes, but load it for all wp pages (for use with archive, etc)', 'my-movie-db' ),
                        'no' => __( 'No',  'my-movie-db' )
                    )
                ),
                array(
                    'name'    => 'mmdb_bootstrap',
                    'label'   => __( 'Include bootstrap', 'my-movie-db' ),
                    'desc'    => __( 'Default templates require bootstrap libraries, select No if you dont want this plugin to include them', 'my-movie-db' ),
                    'type'    => 'select',
                    'default' => 'yes',
                    'options' => array(
                        'yes'  => __( 'Yes, load it for my-movie-database pages only', 'my-movie-db' ),
                        'all'  => __( 'Yes, but load it for all wp pages', 'my-movie-db' ),
                        'no' => __( 'No',  'my-movie-db' )
                    )
                ),
                array(
                    'name'    => 'mmdb_debug',
                    'label'   => __( 'Debug Mode', 'my-movie-db' ),
                    'desc'    => __( 'This will simply output the call to TMDB', 'my-movie-db' ),
                    'type'    => 'radio',
                    'default' => false,
                    'options' => array(
                        false => 'OFF',
                        true  => 'ON'
                    )
                ),

	/**
                array(
                    'name'              => 'mmdb_api_key',
                    'label'             => __( 'TMDb API key', 'my-movie-db' ),
                    'desc'              => __( 'If you want to use your own TMDb API key. If not, leave this blank.', 'my-movie-db' ),
                    'placeholder'       => __( 'Your own TMDb API key', 'my-movie-db' ),
					'type'              => 'text',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
	 */
            )
		);


        return $settings_fields;
    }


	/**
     * Get/set all the settings fields to be then initialized and registered via `admin_init` hook
	 *
	 * @since    0.7.0
	 * 
	 * @since    1.0.0 			split into other seperate section functions which are merged here 
	 * @return    array    		all settings fields
	 */
    private function get_settings_fields() {

        //$settings_fields1 = $this->get_before_settings_fields();
        $settings_fields2 = $this->get_types_settings_fields();
        $settings_fields3 = $this->get_after_settings_fields();

        //$settings_fields = array_merge($settings_fields1, $settings_fields2, $settings_fields3);
        $settings_fields = array_merge($settings_fields2, $settings_fields3);
        return $settings_fields;
    }


    /**
     * Make plugin option page
     *
	 * @since    0.7.0
     * @return string			
     */

    public function plugin_page() {
        echo '<h1>My Movie Database (MMDB) for Wordpress Options</h1>';
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }


    /**
     * Get all the pages
     *
	 * @since   0.7.0
     * @return array page names with key value pairs
     */

    private function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }


}

