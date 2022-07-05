<?php get_header(); ?>

    <!-- start section content -->
    <main class="content">
        <section class="breadcrumb-header text-center">
            <div class="container">
                <div class="title-header">
                    <h1>Error Page</h1>
                </div>
                <ul class="list-unstyled">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo('name') ?></a></li>
                    <li><?php echo esc_html__('404', 'mirya'); ?></li>
                </ul>
            </div>
        </section>
        <div class="wrapper blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
					    <main id="main" class="site-main" role="main">
			                <section class="error-404 not-found">
					            <h1><?php echo esc_html__('404! Not Found...', 'mirya'); ?></h1>
				                <div class="page-content">
                                    <p><?php echo esc_html__('We are sorry. But the page you are looking for cannot be found.', 'mirya'); ?></p>
                                    <span class="back"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__('Back To Home', 'mirya'); ?></a></span>
				                </div>
			                </section>
                        </main>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="sidebar">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php get_footer(2); ?>