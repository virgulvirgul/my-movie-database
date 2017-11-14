                        <?php if(($show_settings['section_2']) || ($show_settings['section_3']) || ($show_settings['section_4'])){ ?>
                        <div class="mmdb-header">
                            <h3 class="mmdb-header-title"><?php _e("Summary", 'my-movie-db');?></h3>
                        </div>
                        <?php } ?>
                        <div class="col-md-12 mmdb-body overview">
                            <h1 class="mmdb-entry-title">
                                <?php echo $mmdb->getTitle() . ' (' . substr($mmdb->getRelDate(), 0, 4) . ')';?>
                            </h1>
                            <div class="<?php echo $this->get_two_column_css();?>">
                                <img class="mmdb-poster" src="<?php echo $tmdb->getSecureImageURL('w300');
                                echo $mmdb->getPoster(); ?>"/>
                            </div><!-- .wrap <h2 class="widget-title">Metadata</h2>	-->
                            <div class="outer-meta <?php echo $this->get_two_column_css();?>">
                                <div class="mmdb-meta"> 
                                    <div><strong><?php echo __("Release Date", 'my-movie-db') . ': ';?></strong>
                                    	<?php echo $mmdb->getRelDate(); ?>
                                    </div>
                                    <div><strong><?php echo __("Starring", 'my-movie-db') . ': ';?></strong>
                                    	<?php echo mmdb_get_cast_list($mmdb, '4'); ?>
                                    </div>
                                    <div><strong><?php echo __("Genres", 'my-movie-db') . ': ';?></strong>
                                    	<?php echo mmdb_get_name_list($mmdb, 'genre'); ?>
                                    </div>
                                    <div><strong><?php echo __("Runtime", 'my-movie-db') . ': ';?></strong>
                                    	<?php echo $mmdb->getRuntime(); ?> min
                                    </div>
                                    <div><strong><?php echo __("Original Title", 'my-movie-db') . ': ';?></strong>
                                    	<?php echo $mmdb->getOrigTitle(); ?>
                                    </div>
                                    <div><strong><?php echo __("Original Film Language", 'my-movie-db') . ': ';?></strong>
                                        <?php $results = $mmdb->getLanguages();
                                        foreach ($results as $result) {
                                            if ($mmdb->getOrigLang() == $result['iso_639_1']) {
                                                echo $result['name'];
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div><strong><?php echo __("Production Companies", 'my-movie-db') . ': ';?></strong>
                                    	<?php echo mmdb_get_name_list($mmdb, 'companies');?>
                                    </div>
                                </div><!-- .mmdbmeta -->
                            </div><!-- .col7 -->
                            <?php if($show_settings['overview_text']){ ?>
                            <div class="col-md-12" style="text-align:left;"> 
                                <?php echo $mmdb->getOverview(); ?>
                            </div>
                            <?php } ?>
                        </div><!-- .md12 -->
