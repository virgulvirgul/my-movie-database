                        <div class="mmdb-header">
                            <h3 class="mmdb-header-title">
                            	<?php _e("Cast", 'my-movie-db');?>
                            	<span class="pull-right"><?php echo $mmdb->getName(); ?></span>
                            </h3>
                        </div>
                        <div class="col-md-12 mmdb-body actors">
                            <?php
                            $results = $mmdb->getCast();

                            foreach ($results as $result):?>
                            	<div class="<?php echo $this->get_multiple_column_css();?> credits">
                                    <img class="img-circle" src="<?php echo $this->public_files->mmdb_get_profile_image($result, $tmdb); ?>"/>
                                    <ul class="people">
                                        <li><?php echo $result['name']; ?></li>
                                        <li><?php echo __("Role", 'my-movie-db') . ':&nbsp;' . $result['character']; ?></li>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        </div><!-- .mmdb-body -->
