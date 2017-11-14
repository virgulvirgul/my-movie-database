                        <?php if(($show_settings['section_2']) || ($show_settings['section_3']) || ($show_settings['section_4'])){ ?>
                        <div class="mmdb-header">
                            <h3 class="mmdb-header-title"><?php _e("Summary", 'my-movie-db');?></h3>
                        </div>
                        <?php } ?>
                        <div class="col-md-12 mmdb-body" id="overview">
                            <h1 class="mmdb-entry-title">
                                <?php echo $mmdb->getName();?>
                            </h1>
                            <div class="<?php echo $this->get_two_column_css();?>">
                                <img class="mmdb-poster" src="<?php echo $tmdb->getSecureImageURL('w300');
                                echo $mmdb->getProfile(); ?>"/>
                            </div><!-- .wrap <h2 class="widget-title">Metadata</h2>	-->
                            <div class="outer-meta <?php echo $this->get_two_column_css();?>">
                                <div class="mmdb-meta">
                                    <?php if($mmdb->getBirthday()) {?>
                                    <div><strong><?php echo __("Birthday", 'my-movie-db') . ': ';?></strong>
                                       <?php echo $mmdb->getBirthday();?>
                                    </div>
                                    <?php } ?>

                                    <?php if($mmdb->getPlaceOfBirth()) {?>
                                    <div><strong><?php echo __("Birthplace", 'my-movie-db') . ': ';?></strong> 
                                       <?php echo $mmdb->getPlaceOfBirth();?>
                                    </div>
                                    <?php } ?>

                                    <?php if($mmdb->getDeathday()) {?>
                                    <div><strong><?php echo __("Death date", 'my-movie-db') . ': ';?></strong> 
                                       <?php echo $mmdb->getDeathday();?>
                                    </div>
                                    <?php } ?>

                                    <?php if($mmdb->getMovieRoleCount()) {?>
                                    <div><strong><?php echo __("Movie Acting Roles", 'my-movie-db') . ': ';?></strong> 
                                       <?php echo $mmdb->getMovieRoleCount();?>
                                    </div>
                                    <?php } ?>

                                    <?php if($mmdb->getTvRoleCount()) {?>
                                    <div><strong><?php echo __("Tv Roles/Appearances", 'my-movie-db') . ': ';?></strong> 
                                       <?php echo $mmdb->getTvRoleCount();?>
                                    </div>
                                    <?php } ?>

                                    <?php if($mmdb->getMovieCrewCount()) {?>
                                    <div><strong><?php echo __("Movie Crew Credits", 'my-movie-db') . ': ';?></strong> 
                                       <?php echo $mmdb->getMovieCrewCount();?>
                                    </div>
                                    <?php } ?>

                                    <?php if($mmdb->getTvCrewCount()) {?>
                                    <div><strong><?php echo __("Tv Crew Credits", 'my-movie-db') . ': ';?></strong> 
                                       <?php echo $mmdb->getTvCrewCount();?>
                                    </div>
                                    <?php } ?>
                                    <?php if($mmdb->getImdbID()) {?>
                                    <div>
                                       <a target="_blank" href="http://www.imdb.com/name/<?php echo $mmdb->getImdbID();?>"><strong><?php echo __("Imdb Profile", 'my-movie-db');?></strong></a>
									
                                    </div>
                                    <?php } ?>
                                    <?php if($mmdb->getHomePage()) {?>
                                    <div>
                                       <a target="_blank" href="<?php echo $mmdb->getHomePage();?>"><strong><?php echo __("Website", 'my-movie-db');?></strong></a>
									
                                    </div>
                                    <?php } ?>

                                </div><!-- .mmdb-meta -->
                            </div><!-- .col -->
                            <?php if($show_settings['overview_text']){ ?>
                            <div class="col-md-12" style="text-align:left;"> 
                                <?php echo $mmdb->getΒiography() ?>
                            </div>
                            <?php } ?>
                        </div><!-- .md12 -->
