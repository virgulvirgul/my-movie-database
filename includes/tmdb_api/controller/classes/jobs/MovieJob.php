<?php
/**
 * 	This class handles all the data you can get from a MovieJob
 *
 *	@package TMDB-V3-PHP-API
 * 	@author Alvaro Octal | <a href="https://twitter.com/Alvaro_Octal">Twitter</a>
 * 	@version 0.1
 * 	@date 11/01/2015
 * 	@link https://github.com/Alvaroctal/TMDB-PHP-API
 * 	@copyright Licensed under BSD (http://www.opensource.org/licenses/bsd-license.php)
 */

class MovieJob {

    //------------------------------------------------------------------------------
    // Class Variables
    //------------------------------------------------------------------------------

    private $_data;

    /**
     * 	Construct Class
     *
     * 	@param array $data An array with the data of a Movie job
     */
    public function __construct($data, $ipPerson) {
        $this->_data = $data;
        $this->_data['person_id'] = $ipPerson;
    }

    //------------------------------------------------------------------------------
    // Get Variables
    //------------------------------------------------------------------------------

    /** 
     *  Get the Movie's title of the job
     *
     *  @return string
     */
    public function getMovieTitle() {
        return $this->_data['title'];
    }

    /** 
     *  Get the Movie's id
     *
     *  @return int
     */
    public function getMovieID() {
        return $this->_data['id'];
    }

    /** 
     *  Get the Movie's original title of the job
     *
     *  @return string
     */
    public function getMovieOriginalTitle() {
        return $this->_data['original_title'];
    }

    /** 
     *  Get the Movie's release date of the job
     *
     *  @return string
     */
    public function getMovieReleaseDate() {
        return $this->_data['release_date'];
    }


    /** 
     *  Get the Movie's poster
     *
     *  @return string
     */
    public function getPoster() {
        return $this->_data['poster_path'];
    }

    /** 
     *  Get the character name of the job
     *
     *  @return string
     */
    public function getMovieJob() {
        return $this->_data['job'];
    }


    /** 
     *  Get the department of job
     *
     *  @return string
     */
    public function getMovieDepartment() {
        return $this->_data['department'];
    }

    /** 
     *  Get the Movie's overview
     *
     *  @return string
     */
    public function getMovieOverview() {
        return $this->_data['overview'];
    }


    //------------------------------------------------------------------------------
    // Export
    //------------------------------------------------------------------------------

    /**
     *  Get the JSON representation of the Episode
     *
     *  @return string
     */
    public function getJSON() {
        return json_encode($this->_data, JSON_PRETTY_PRINT);
    }
}
?>
