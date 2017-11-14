                        <div class="mmdb-header">
                            <h3 class="mmdb-header-title">
                            	<?php _e("Crew Credits", 'my-movie-db');?>
                            	<span class="pull-right"><?php echo $mmdb->getName(); ?></span>
                            </h3>
                        </div>
                        <div class="col-md-12 mmdb-body crew_credits">
                            <?php
                            $mvresults = $mmdb->getMovieJobs();
                            $tvresults = $mmdb->getTVShowJobs();

                            if($mvresults) { ?>
                            <div>
                                <h4><?php _e("Movie Credits", 'my-movie-db');?></h4>
                            </div>

                            <div>
                                <?php foreach ($mvresults as $result): ?>

                                <div class="<?php echo $this->get_two_column_css();?> movie credits">
                                    <img src="<?php echo $this->public_files->mmdb_get_poster($result); ?>"/>
                                    <ul class="people">
                                        <li><?php echo $result->getMovieTitle(); ?></li>
                                        <li><?php echo $result->getMovieJob(); ?></li>
                                        <li><?php echo $result->getMovieReleaseDate(); ?></li>
                                    </ul>
                                </div>

                                <?php endforeach; ?>
                            </div>
                            <?php } ?>

                            <?php if($tvresults) { ?>
                            <div>
                                <h4><?php _e("TvShow Credits", 'my-movie-db');?></h4>
                            </div>
                            <div>
                                <?php foreach ($tvresults as $result): ?>

                                <div class="<?php echo $this->get_two_column_css();?> tv credits">
                                    <img src="<?php echo $this->public_files->mmdb_get_backdrop_poster($result); ?>"/>
                                    <ul class="people">
                                        <li><?php echo $result->getTVShowName(); ?></li>
                                        <li><?php echo $result->getTVShowJob(); ?></li>
                                    </ul>
                                </div>

                                <?php endforeach; ?>
                            </div>
                            <?php } ?>
                        </div><!-- .mmdb-body -->
