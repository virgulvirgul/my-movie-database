                        <div class="mmdb-header">
                            <h3 class="mmdb-header-title">
                            	<?php _e("Tv Roles and Appearances", 'my-movie-db');?>
                            	<span class="pull-right"><?php echo $mmdb->getName(); ?></span>
                            </h3>
                        </div>
                        <div class="col-md-12 mmdb-body" id="tv_appearances">
                            <div>
                            <?php $guest = false;
                            $results = $mmdb->getTVShowRoles();
                            foreach ($results as $result):
                                if($result->getTVShowEpisodeCount() < 3) { $guest = true;}
                                if($result->getTVShowEpisodeCount() > 2) { ?>

                                <div class="<?php echo $this->get_two_column_css();?> credits">
                                    <img src="<?php echo $this->public_files->mmdb_get_backdrop_poster($result); ?>"/>
                                    <ul class="people">
                                        <li><?php echo $result->getTVShowName(); ?></li>
                                        <li><?php echo $result->getCharacter(); ?></li>
                                    </ul>
                                </div>

                                <?php } ?>

                            <?php endforeach; ?>
                            </div>
                            <?php if($guest) { ?>
                            <div>
                                <h4><?php _e("Guest Appearances", 'my-movie-db');?></h4>
                            </div>
                            <?php }?>
                            <div>
                            <?php foreach ($results as $result):
                                if($result->getTVShowEpisodeCount() < 3) { ?>

                                <div class="<?php echo $this->get_two_column_css();?> credits">
                                    <img src="<?php echo $this->public_files->mmdb_get_backdrop_poster($result); ?>"/>
                                    <ul class="people">
                                        <li><?php echo $result->getTVShowName(); ?></li>
                                        <li><?php echo $result->getCharacter(); ?></li>
                                    </ul>
                                </div>

                                <?php } ?>

                            <?php endforeach; ?>
                            </div>
                        </div><!-- .mmdb-body -->
