<?php

class mirya_blog_widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'mirya-blog';
	}
	
	public function get_title() {
		return 'Mirya Blog';
	}
	
	public function get_icon() {
		return 'fa fa-comments';
	}
	
	public function get_categories() {
		return [ 'mirya-category' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->end_controls_section();

	}
	
	protected function render() {

		$settings = $this->get_settings_for_display();
		$the_query = new WP_Query( array(
			'posts_per_page'  => 3,
		) );
		?>
        
		<div class="container">
			<div class="row">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<!-- New Item -->
				<div class="col-md-4">
					<div class="post">
						<!-- Post Image -->
						<div class="post-img">
							<?php the_post_thumbnail('', ['class' => 'img-responsive']) ?>
						</div>
						<!-- Post Content -->
						<div class="post-content">
							<div class="post-title">
								<a href="<?php the_permalink() ?>">
									<?php the_title() ?>
								</a>
							</div>
							<ul class="post-info list-unstyled">
								<li>
									<i class="fa fa-calendar"></i>
									<?php 
										$archive_year  = get_the_time('Y'); 
										$archive_month = get_the_time('m'); 
										$archive_day   = get_the_time('d'); 
									?>
									<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php the_time('F j, Y'); ?></a>
								</li>
								<li>
									<i class="fa fa-commenting-o"></i>
									<?php comments_popup_link('0 Comment', '1 Comment', '% Comment', 'comment-url', 'Comments Disabled') ?>
								</li>
							</ul>
							<div class="post-text">
								<?php the_excerpt() ?>
							</div>
						</div>
						<div class="post-footer">
							<a href="<?php the_permalink() ?>" class="post-more">Read more <i class="fa fa-angle-double-right"></i></a>
							<div class="post-category">
								<?php the_category() ?>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>

        <?php
	}
	
	
}