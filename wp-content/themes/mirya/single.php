<?php get_header(); ?>

        <!-- start section content -->
        <main class="content">
            <section class="breadcrumb-header text-center">
                <div class="container">
                    <div class="title-header">
                        <h1><?php the_title() ?></h1>
                    </div>
                    <ul class="list-unstyled">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo('name') ?></a></li>
						<li><?php the_title() ?></li>
					</ul>
                </div>
            </section>
            <div class="blog single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <?php if (have_posts()) { ?>
                            <div class="row">
                                <?php while(have_posts()) {
                                the_post(); ?>
                                <div class="col-sm-12 post-item">
                                    <?php get_template_part( 'template-parts/content', 'single' ); ?>
                                    <div class="post-navigation">
                                        <div class="post-navigation-prev pull-left">
                                            <?php
                                                if (get_previous_post_link()) { // Check If Previous Post Is Exists
                                                    previous_post_link('%link','<span>&#171; Prev Post</span>');
                                            } ?>
                                        </div>
                                        <div class="post-navigation-next pull-right">
                                            <?php
                                                if (get_next_post_link()) { // Check If Next Post Is Exists
                                                    next_post_link('%link','<span>Next Post &#187;</span>');
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="comments">
                                        <?php comments_template(); ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
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