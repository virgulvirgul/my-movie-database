
        <div id="mmdb-content_<?php echo esc_attr($mmdbID); ?>_ps">
            <div class="mmdbTabs">
                <?php if(($show_settings['section_2']) || ($show_settings['section_3']) || ($show_settings['section_4'])){ ?>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#<?php echo esc_attr($mmdbID); ?>_ps_1" id="overview_tab_<?php echo esc_attr($mmdbID); ?>_ps" data-toggle="tab"><?php esc_html_e("Overview", 'my-movie-db');?></a>
                    </li>
                    <?php if($show_settings['section_2']) { ?>
                    <li><a href="#<?php echo esc_attr($mmdbID); ?>_ps_2" id="cast_tab_<?php echo esc_attr($mmdbID); ?>_ps" data-toggle="tab"><?php esc_html_e("Movie Roles", 'my-movie-db');?></a>
                    </li>
                    <?php } ?>
                    <?php if($show_settings['section_3']) { ?>
                    <li><a href="#<?php echo esc_attr($mmdbID); ?>_ps_3" id="crew_tab_<?php echo esc_attr($mmdbID); ?>_ps" data-toggle="tab"><?php esc_html_e("Tv Roles", 'my-movie-db');?></a>
                    </li>
                    <?php } ?>
                    <?php if($show_settings['section_4']){ ?>
                    <li><a href="#<?php echo esc_attr($mmdbID); ?>_ps_4" id="trailer_tab_<?php echo esc_attr($mmdbID); ?>_ps" data-toggle="tab"><?php esc_html_e("Crew Credits", 'my-movie-db');?></a>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
                <div class="tab-content mmdb-header collapse in" id="tab-content_esc_attr($mmdbID); ?>_ps" aria-expanded="true">
                    <div class="tab-pane active" id="<?php echo esc_attr($mmdbID); ?>_ps_1">
                    	<?php include $this->mmdb_get_template_part('person-main'); ?>
                    </div><!-- .tab-pane -->
                    <?php if($show_settings['section_2']) { ?>
                    <div class="tab-pane" id="<?php echo esc_attr($mmdbID); ?>_ps_2">
                    	<?php include $this->mmdb_get_template_part('person-movie'); ?>
                    </div>
                    <?php } ?>
                    <?php if($show_settings['section_3']) { ?>
                    <div class="tab-pane" id="<?php echo esc_attr($mmdbID); ?>_ps_3">
                    	<?php include $this->mmdb_get_template_part('person-tv'); ?>
                    </div>
                    <?php } ?>
                    <?php if($show_settings['section_4']) { ?>
                    <div class="tab-pane" id="<?php echo esc_attr($mmdbID); ?>_ps_4">
                    	<?php include $this->mmdb_get_template_part('person-jobs'); ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div><!-- #main -->

