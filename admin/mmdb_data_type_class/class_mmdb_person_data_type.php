<?php

/**
 * Defines the properties of the TMDB person view data types made available to the plugin.
 *
 * @link       https://e-leven.net/
 * @since      1.0.0
 *
 * @package    My_movie_database
 * @subpackage My_movie_database/admin
 * @author     Kostas Stathakos <info@e-leven.net>
 */

class MMDB_Data_Type_person extends MMDB_Data_Type{



	/**
	 * Set the hidden sections labels
	 *
	 * @since     1.0.2
	 * @return    array
	 */

	public function set_hide_sections_setting() {

		$hidden_sections = 
					array(
                        'overview_text'  => __( 'Overview Text', 'my-movie-db' ),
                        'section_2'   	=> __( 'Movie Roles', 'my-movie-db' ),
                        'section_3'   	=> __( 'Tv Roles / Appearances', 'my-movie-db' ),
                        'section_4' 	=> __( 'Crew Credits', 'my-movie-db' ),
                    );

		return $hidden_sections;

	}

	/**
	 * Get the plural name for the post type setting
	 *
	 * @since     1.0.2
	 * @return    string
	 */

	public function get_name_type_plural() {

		$plural_type_name	= 'People';
		return $plural_type_name;
	}




	/**
	 * Check the section prerequisites
	 *
	 * @since     1.0.3
	 * @return    array
	 */

	public function show_section_2_if($mmdb) {

		$show = false;

		if($mmdb->getMovieRoles()) { 
			$show = true;
		}

		return $show;

	}

	/**
	 * Check the section prerequisites
	 *
	 * @since     1.0.3
	 * @return    array
	 */

	public function show_section_3_if($mmdb) {

		$show = false;

		if($mmdb->getTVShowRoles()) { 
			$show = true;
		}

		return $show;

	}

	/**
	 * Check the section prerequisites
	 *
	 * @since     1.0.3
	 * @return    array
	 */

	public function show_section_4_if($mmdb) {

		$show = false;

		if($mmdb->getMovieJobs() || $mmdb->getTVShowJobs()) { 
			$show = true;
		}

		return $show;

	}



}   

