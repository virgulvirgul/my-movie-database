<?php

/**
 * Defines the properties of the TMDB show view data types made available to the plugin.
 *
 * @link       https://e-leven.net/
 * @since      1.0.0
 *
 * @package    My_movie_database
 * @subpackage My_movie_database/admin
 * @author     Kostas Stathakos <info@e-leven.net>
 */

class MMDB_Data_Type_tvshow extends MMDB_Data_Type{



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
                        'section_2'   	=> __( 'Cast', 'my-movie-db' ),
                        'section_3'   	=> __( 'Crew', 'my-movie-db' ),
                        'section_4' 	=> __( 'Seasons', 'my-movie-db' ),
                    );

		return $hidden_sections;

	}


	/**
	 * Check the section prerequisites
	 *
	 * @since     1.0.3
	 * @return    array
	 */

	public function show_section_2_if($mmdb) {

		$show = false;

		if($mmdb->getCast()) { 
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

		if($mmdb->getCrew()) { 
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

		if($mmdb->getSeasons()) { 
			$show = true;
		}

		return $show;

	}





}   

