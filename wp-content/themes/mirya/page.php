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
            <div class="page-single">
            <?php if (have_posts()) {
                while(have_posts()) {
                    the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="container">
                            <div class="entry-content">
                                <?php the_content() ?>
                            </div>
                        </div>
                    </article>
                <?php }
            }?>
            </div>

<?php get_footer(2); ?>