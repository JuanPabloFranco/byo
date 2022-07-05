<?php get_header(); ?>

        <main class="content">
            <section class="breadcrumb-header text-center">
                <div class="container">
                <?php 
                    if (is_author()) { ?>
                        <div class="title-header">
                            <h1>Author: <?php the_author_meta('nickname'); ?></h1>
                        </div>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo('name') ?></a></li>
                            <li>Articles By: <?php the_author_meta('nickname'); ?></li>
                        </ul>
                    <?php } elseif (is_category()) { ?>
                        <div class="title-header">
                            <h1>Category: <?php single_cat_title(); ?></h1>
                        </div>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo('name') ?></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'blog' ?>">Blog</a></li>
                            <li><?php single_cat_title(); ?></li>
                        </ul>
                    <?php } elseif (is_tag()) { ?>
                        <div class="title-header">
                            <h1>Tag: <?php single_tag_title(); ?></h1>
                        </div>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo('name') ?></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'blog' ?>">Blog</a></li>
                            <li><?php single_tag_title(); ?></li>
                        </ul>
                    <?php } elseif (is_day()) { ?>
                        <div class="title-header">
                            <h1>Day: <?php the_time('F j, Y') ?></h1>
                        </div>
                        <?php 
                            $archive_year  = get_the_time('Y'); 
                            $archive_month = get_the_time('m'); 
                        ?>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo('name') ?></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'blog' ?>">Blog</a></li>
                            <li><a href="<?php echo get_year_link( $archive_year ); ?>"><?php the_time('Y') ?></a></li>
                            <li><a href="<?php echo get_month_link( $archive_year, $archive_month ); ?>"><?php the_time('F') ?></a></li>
                            <li><?php the_time('j') ?></li>
                        </ul>
                    <?php } elseif (is_month()) { ?>
                        <div class="title-header">
                            <h1>Month: <?php the_time('F, Y') ?></h1>
                        </div>
                        <?php 
                            $archive_year  = get_the_time('Y'); 
                        ?>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo('name') ?></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'blog' ?>">Blog</a></li>
                            <li><a href="<?php echo get_year_link( $archive_year ); ?>"><?php the_time('Y') ?></a></li>
                            <li><?php the_time('F') ?></li>
                        </ul>
                    <?php } elseif (is_year()) { ?>
                        <div class="title-header">
                            <h1>Year: <?php the_time('Y') ?></h1>
                        </div>
                        <?php 
                            $archive_year  = get_the_time('Y'); 
                        ?>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo('name') ?></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'blog' ?>">Blog</a></li>
                            <li><?php the_time('Y') ?></li>
                        </ul>
                    <?php } else { ?>
                        <div class="title-header">
                            <h1>Archives</h1>
                        </div>
                    <?php }
                ?>
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