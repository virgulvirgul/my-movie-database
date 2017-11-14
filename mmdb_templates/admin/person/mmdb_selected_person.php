<?php

/**
 * The template for the person post type selected (admin side)
 *
 * @link       https://e-leven.net/
 * @since      1.0.0
 *
 * @package    My_movie_database
 * @subpackage My_movie_database/mmdb_templates/admin/movie
 */
?>

<!-- the post type template wrapper -->
<div class="selection-wrapper">

    <?php echo _e( "You have selected : ", 'my-movie-db') . '<br />';?>

    <div id="selected" style="text-align: center;">

        <div id="<?php echo $mmdb->getID() ?>" class="movie-container" style="margin-bottom:40px"><img src=<?php echo $this->public_files->mmdb_get_profile($mmdb); ?> />
            <div class="info">
                <h2><?php echo $mmdb->getName(); ?> </h2>
				 <p></p>
				<?php if($mmdb->getBirthday()) { ?>
				 <p><?php echo __("Birthday", 'my-movie-db') . ':&nbsp;' . $mmdb->getBirthday(); ?></p>
				<?php } ?>
				<?php if($mmdb->getPlaceOfBirth()) { ?>
				 <p><?php echo __("Birthplace", 'my-movie-db') . ':&nbsp;' . $mmdb->getPlaceOfBirth(); ?></p>
				<?php } ?>
				<?php if($mmdb->getDeathday()) { ?>
				 <p><?php echo __("Death date", 'my-movie-db') . ':&nbsp;' . $mmdb->getDeathday(); ?></p>
				<?php } ?>
            </div>
            <div class="description">
                <?php echo $mmdb->getΒiography() ?></div>
        </div>

    </div>
</div>
