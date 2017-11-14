                        <?php if(($show_settings['section_2']) || ($show_settings['section_3']) || ($show_settings['section_4'])){ ?>
                        <div class="mmdb-header">
                            <h3 class="mmdb-header-title"><?php _e("Summary", 'my-movie-db');?></h3>
                        </div>
                        <?php } ?>
                        <div class="col-md-12 mmdb-body overview">
                            <h1 class="entry-title">
                            	<?php echo $mmdb->getName() . ' (' . substr($mmdb->get('first_air_date'), 0, 4) . ')';?>
                            </h1>
                            <div class="<?php echo $this->get_two_column_css();?>">
                                <img class="mmdb-poster" src="<?php echo $tmdb->getSecureImageURL('w300');
                                echo $mmdb->getPoster(); ?>"/>
                            </div>
                            <div class="outer-meta <?php echo $this->get_two_column_css();?>">

                                <div class="mmdb-meta">
                                    <div><strong><?php echo __("Genres", 'my-movie-db') . ': ';?></strong>
                                       <?php echo mmdb_get_object_csv_list($mmdb->getGenres(), 'getName', '5');?>
                                    </div>
                                    <div><strong><?php echo __("Created by", 'my-movie-db') . ': ';?></strong>
                                       <?php echo mmdb_get_csv_list($mmdb->getCreators(), 'name', '5');?>									
                                    </div>
                                    <?php if($mmdb->getCast()) {?>
                                    <div><strong><?php echo __("Starring", 'my-movie-db') . ': ';?></strong> 
                                       <?php echo mmdb_get_csv_list($mmdb->getCast(), 'name', '4');?>
                                    </div>
                                    <?php } ?>
                                    <div><strong><?php echo __("Episodes / Seasons", 'my-movie-db') . ': ';?></strong> 
                                       <?php echo $mmdb->getNumEpisodes() . ' / ' . $mmdb->getNumSeasons();?>
                                    </div>
                                    <?php if($mmdb->getFirstAirDate()) {?>
                                    <div><strong><?php echo __("First aired", 'my-movie-db') . ': ';?></strong>
                                       <?php echo $mmdb->getFirstAirDate();?>
                                    </div>
                                    <?php } ?>
                                    <?php if((!($mmdb->getInProduction())) && $mmdb->getLastAirDate()) {?>
                                    <div><strong><?php echo __("Last air date", 'my-movie-db') . ': ';?></strong>
                                       <?php echo $mmdb->getLastAirDate();?>
                                    </div>
                                    <?php } ?>
                                    <?php if($mmdb->getHomePage()) {?>
                                    <div>
                                    	<a target="_blank" href="<?php echo $mmdb->getHomePage();?>">
                                            <strong><?php echo __("Website", 'my-movie-db');?></strong>
                                    	</a>
                                    </div>
                                    <?php } ?>
                                    <div><strong><?php echo __("Runtime", 'my-movie-db') . ': ';?></strong>
                                    	<?php echo $mmdb->getRuntime(); ?> min
                                    </div>
                                </div><!-- .mmdb-meta -->

                            </div><!-- .col -->
                            <?php if($show_settings['overview_text']){ ?>
                            <div class="col-md-12"  id="overview-text"> 
                                <?php echo $mmdb->getOverview() ?>
                            </div>
                            <?php } ?>
                            <div class="col-md-12"> 
                                <div><strong><?php echo __("Networks", 'my-movie-db') . ': ';?></strong>
                                    <?php echo mmdb_get_csv_list($mmdb->getNetworks(), 'name', '5');?>	
                                </div>
                                <div><strong><?php echo __("Production Companies", 'my-movie-db') . ': ';?></strong>
                                    <?php echo mmdb_get_name_list($mmdb, 'networks');?>
                                </div>
                            </div>

                        </div><!-- .md12 mmdb-body-->  
