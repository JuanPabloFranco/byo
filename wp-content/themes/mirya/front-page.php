    <?php
    if ( 'posts' == get_option( 'show_on_front' ) ) {

    get_header(); ?>

    <!-- start section content -->
    <main class="content">
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

    <?php get_footer(2);
    
} else {

    get_header();

    if (class_exists('Mirya_Core')) { ?>
        <!-- start section content -->
        <main class="content">
        <?php if (have_posts()) { // Check If There's Posts ?>
            <?php while(have_posts()) { // Loop Throught Posts
            the_post();
            the_content(); ?>
            <div class="single-navigation">
                <?php wp_link_pages(array(
                    'link_before' => '<div class="link">',
                    'link_after' => '</div>',
                )); ?>
            </div>
            <?php } // End While Loop
        }

    get_footer();

    } else { ?>
        <!-- start section content -->
        <main class="content pt-90">
        <div class="container">
        <?php if (have_posts()) { // Check If There's Posts ?>
            <?php while(have_posts()) { // Loop Throught Posts
            the_post();
            the_content(); ?>
            <div class="single-navigation">
                <?php wp_link_pages(array(
                    'link_before' => '<div class="link">',
                    'link_after' => '</div>',
                )); ?>
            </div>
            <?php } // End While Loop
        } ?>
        </div>

        <?php get_footer(2);

     }
} ?>