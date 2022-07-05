<?php get_header(); ?>

        <!-- start section content -->
        <main class="content">
            <section class="breadcrumb-header text-center">
                <div class="container">
                    <div class="title-header">
                        <h1>Blog</h1>
                    </div>
                    <ul class="list-unstyled">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo('name') ?></a></li>
						<li>Blog</li>
					</ul>
                </div>
            </section>
            <div class="blog">
                <div class="container">
			        <div class="row">
				        <div class="col-md-8 col-sm-12">
                            <?php if (have_posts()) { ?>
                            <div class="row">
                                <?php while(have_posts()) {
                                the_post(); ?>
                                <div class="col-sm-12">
                                    <?php get_template_part('template-parts/content') ?>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <div class="clearfix"></div>
                            <div class="pagination-numbers">
                                <?php echo numbering_pagination(); ?>
                            </div>
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