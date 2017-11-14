<?php

/**
 * The template for the tvshow post type selected (admin side)
 *
 * @link       https://e-leven.net/
 * @since      1.0.0
 *
 * @package    My_movie_database
 * @subpackage My_movie_database/admin/partials
 */
?>


<!-- the post type template wrapper -->
<div class="selection-wrapper">

    <?php echo _e( "You have selected : ", 'my-movie-db') . '<br />';?>

    <div id="selected" style="text-align: center;">

        <div id="<?php echo $mmdb->getID() ?>" class="movie-container" style="margin-bottom:40px"><img src=<?php echo $this->public_files->mmdb_get_poster($mmdb); ?> />
            <div class="info">
                <h2><?php echo $mmdb->getName() ?> </h2>
                <p><strong><?php _e("First Aired: ", 'my-movie-db');  echo substr($mmdb->get('first_air_date') , 0, 4) ?></strong>
                    <?php echo '(' . $mmdb->getVoteAverage() ?>/10) </p>
            </div>
            <div class="description">
                <?php echo $mmdb->getOverview() ?></div>
        </div>
    </div>
</div>
