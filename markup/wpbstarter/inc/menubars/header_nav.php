        <div class="nav-container">
        <?php if ( get_theme_mod( 'fixed_nav_setting' ) === 'yes' ) { ?>
            <nav class="sina-nav mobile-sidebar navbar-fixed" data-top="0">
        <?php } else { ?>
            <nav class="sina-nav mobile-sidebar" data-top="0">
        <?php } ?>
                <div class="container">
                    
                    <?php if ( get_theme_mod( 'right_search_setting' ) === 'yes' ) {
                    ?>
                        <div class="sina-nav-header search-on">
                    <?php  
                        } else {
                    ?>
                        <div class="sina-nav-header">
                    <?php  }  ?>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                            <?php if ( has_custom_logo() ): 
                                $custom_logo_id = get_theme_mod( 'custom_logo' );
                                $logourl = wp_get_attachment_image_src( $custom_logo_id , 'wpbstarter-logo' ); 
                            ?>
                                <a class="sina-brand" href="<?php echo esc_url( home_url( '/' )); ?>" rel="home" itemprop="url">
                                    <img src="<?php echo esc_url($logourl[0]); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                </a>
                            <?php else : ?>
                                <a class="sina-brand" href="<?php echo esc_url( home_url( '/' )); ?>"><h2><?php esc_url(bloginfo('name')); ?></h2><p><?php esc_url(bloginfo('description')); ?></p></a>
                            <?php endif; ?>
                    </div><!-- .sina-nav-header -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <?php
                        wp_nav_menu(array(
                        'theme_location'  => 'primary_menu',
                        'container'       => 'div',
                        'container_id'    => 'navbar-menu', //changes
                        'container_class' => 'collapse navbar-collapse', //changes
                        'menu_id'         => false,
                        'menu_class'      => 'sina-menu '.get_theme_mod('main_menu_setting').'', //changes
                        'depth'           => 4,
                        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                        'walker'          => new wp_bootstrap_navwalker()
                        ));
                        ?>
                        <div class="extension-nav">
                        <ul>
                        <?php if ( get_theme_mod( 'right_search_setting' ) === 'yes' ) : ?>
                            <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <?php endif; ?>

                <?php if ( get_theme_mod( 'right_search_setting' ) === 'yes' ) : ?>
                    <div class="search-box searchmod">
                        <?php get_search_form(); ?>
                    </div><!-- .search-box -->
                <?php endif; ?>

                        <?php if ( get_theme_mod( 'right_menu_setting' ) === 'yes' ) : ?>
                            <li class="widget-bar-btn"><a href="#"><i class="fa fa-bars"></i></a></li>
                        <?php endif; ?>

                        </ul>
                    </div><!-- .extension-nav Right Side button-->
                </div> <!-- .container -->

            
            <?php if ( get_theme_mod( 'right_menu_setting' ) === 'yes' ) : ?>
                <!-- Start widget-bar -->
                <div class="widget-bar">
                    <a href="#" class="close-widget-bar"><i class="fa fa-times"></i></a>
                    <div class="widget">
                        <?php
                            wp_nav_menu(array(
                            'theme_location'    => 'right_side_menu',
                            'container'       => 'div',
                            'menu_id'         => false,
                            'menu_class'      => 'link', //changes
                            'depth'           => 2,
                            ));
                        ?>
                    </div>
                </div>
                <!-- End widget-bar -->
            <?php endif; ?>

            </nav> <!-- .navend -->
        </div> <!-- .nav-container -->