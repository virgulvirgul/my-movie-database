                        <div class="mmdb-header">
                            <h3 class="mmdb-header-title">
                            	<?php _e("Movie Roles", 'my-movie-db');?>
                            	<span class="pull-right"><?php echo $mmdb->getName(); ?></span>
                            </h3>
                        </div>
                        <div class="col-md-12 mmdb-body">
                            <?php
                            $results = $mmdb->getMovieRoles();

                            foreach ($results as $result):?>
                        	<div class="movie-role-wrapper">
                            	<div class="col-sm-4 poster-img">
                                <img src="<?php echo $this->public_files->mmdb_get_poster($result); ?>"/>
                                </div>
                            	<div class="col-sm-8 outer-180">
                                    <ul class="movie-role">
                                        <li><?php echo $result->getMovieTitle(); ?></li>
                                        <li><?php echo $result->getMovieReleaseDate(); ?></li>
                                        <li><strong><?php echo $result->getCharacter(); ?></strong></li>
                                        <li class="mmdb-desc"><?php echo mmdb_get_desc($result->getMovieOverview(), '380') ;?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <?php endforeach; ?>
                        </div><!-- .mmdb-body -->
