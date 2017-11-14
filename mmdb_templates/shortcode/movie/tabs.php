
        <div id="mmdb-content_<?php echo $mmdb->getID(); ?>_mv">
            <div class="mmdbTabs">
                <?php if(($show_settings['section_2']) || ($show_settings['section_3']) || ($show_settings['section_4'])){ ?>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#<?php echo $mmdb->getID(); ?>_mv_1" id="overview_tab_<?php echo $mmdb->getID(); ?>_mv" data-toggle="tab"><?php _e("Overview", 'my-movie-db');?></a>
                    </li>
                    <?php if($show_settings['section_2']) { ?>
                    <li><a href="#<?php echo $mmdb->getID(); ?>_mv_2" id="cast_tab_<?php echo $mmdb->getID(); ?>_mv" data-toggle="tab"><?php _e("Cast", 'my-movie-db');?></a>
                    </li>
                    <?php } ?>
                    <?php if($show_settings['section_3']) { ?>
                    <li><a href="#<?php echo $mmdb->getID(); ?>_mv_3" id="crew_tab_<?php echo $mmdb->getID(); ?>_mv" data-toggle="tab"><?php _e("Crew", 'my-movie-db');?></a>
                    </li>
                    <?php } ?>
                    <?php if($show_settings['section_4']){ ?>
                    <li><a href="#<?php echo $mmdb->getID(); ?>_mv_4" id="trailer_tab_<?php echo $mmdb->getID(); ?>_mv" data-toggle="tab"><?php _e("Trailer", 'my-movie-db');?></a>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
                <div class="tab-content mmdb-header collapse in" id="tab-content_$mmdb->getID(); ?>_mv" aria-expanded="true">
                    <div class="tab-pane active" id="<?php echo $mmdb->getID(); ?>_mv_1">
                    	<?php include $this->mmdb_get_template_part('movie-main'); ?>
                    </div><!-- .tab-pane -->
                    <?php if($show_settings['section_2']) { ?>
                    <div class="tab-pane" id="<?php echo $mmdb->getID(); ?>_mv_2">
                    	<?php include $this->mmdb_get_template_part('movie-cast'); ?>
                    </div>
                    <?php } ?>
                    <?php if($show_settings['section_3']) { ?>
                    <div class="tab-pane" id="<?php echo $mmdb->getID(); ?>_mv_3">
                    	<?php include $this->mmdb_get_template_part('movie-crew'); ?>
                    </div>
                    <?php } ?>
                    <?php if($show_settings['section_4']) { ?>
                    <div class="tab-pane" id="<?php echo $mmdb->getID(); ?>_mv_4">
                    	<?php include $this->mmdb_get_template_part('movie-trailer'); ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div><!-- #main -->

