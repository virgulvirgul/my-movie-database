                        <div class="mmdb-header">
                            <h3 class="mmdb-header-title">
                            	<?php _e("Seasons", 'my-movie-db');?>
                            	<span class="pull-right"><?php echo $mmdb->getName(); ?></span>
                            </h3>
                        </div>
                        <div class="col-md-12 mmdb-body seasons">
                            <?php
                            $results = $mmdb->getSeasons();
                            foreach ($results as $result):
                            	if($result->getSeasonNumber() > 0) :?>
                            	<div class="col-lg-6 col-md-6 col-sm-6 credits">                         
                                    <ul class="seasons">
                                        <li><?php echo __("Season", 'my-movie-db') . '&nbsp;' . $result->getSeasonNumber() ?></li>

                                        <li><?php echo __("Air date", 'my-movie-db') . ':&nbsp;' . $result->getAirDate() ?></li>

                                        <li><?php echo __("Episodes", 'my-movie-db') . ':&nbsp;' . $result->get('episode_count') ?></li>
                                    </ul>
                                    <img class="mmdb-poster" src="<?php echo $this->public_files->mmdb_get_poster($result); ?>"/>
                                </div>
                            <?php endif; endforeach; ?>
                        </div><!-- .mmdb-body -->
